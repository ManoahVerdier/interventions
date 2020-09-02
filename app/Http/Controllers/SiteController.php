<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\CodePromo;
use App\Favorite;
use App\Notifications\NewOrder;
use App\Notifications\OrderConfirmation;
use App\Order;
use App\OrderLine;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Uccello\Core\Models\Domain;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Affiche la page d'accueil
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $selectionProducts = Product::all();
        if ($selectionProducts->count() > 10) {
            $selectionProducts = $selectionProducts->random(10);
        }

        $categories_footer = Category::getRoots()->get();
        $brands_footer = Brand::get();
        $productsCount = Product::count();
        $categories = Category::getRoots()->get();
        return view('pages.home', compact('categories','selectionProducts','productsCount','brands_footer','categories_footer'));
    }

    /**
     * Affiche la page d'activation de compte.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function activation()
    {
        $categories_footer = Category::getRoots()->get();
        return view('pages.activation',compact('categories_footer'));
    }

    /**
     * Affiche les catégories de niveau 0
     *
     * @return \Illuminite\Http\Response
     */
    public function search($fromMenu=true)
    {
        $fromMenu = request()->get('fromMenu') ?? true;
        $categories = Category::getRoots()->get();
        
        $categories_footer = Category::getRoots()->get();
        $brands_footer = Brand::get();

        $productsCount = Product::count();

        return view('pages.search', compact('categories', 'productsCount','fromMenu','brands_footer','categories_footer'));
    }

    /**
     * Affiche les marques liées à la catégorie sélectionnée ou ses sous-catégories.
     *
     * @return \Illuminite\Http\Response
     */
    public function searchBrands($id)
    {
        $category = Category::findOrFail($id);
        $brands = $category->brands; // Brands with products linked to category or descendants

        $categories_footer = Category::getRoots()->get();
        $brands_footer = Brand::get();

        $productsCount = 0;
        foreach ($brands as $brand) {
            $productsCount += $brand->productsCountForCategory($category);
        }

        return view('pages.search_brands', compact('category', 'brands', 'productsCount','brands_footer','categories_footer'));
    }

    public function searchResults()
    {
        $q = request('q');

        $brandTable = (new Brand)->getTable();
        $productTable = (new Product)->getTable();

        $categories_footer = Category::getRoots()->get();
        $brands_footer = Brand::get();

        $products = Product::selectRaw("$productTable.*")
                ->join($brandTable, "$productTable.brand_id", '=', "$brandTable.id")
                ->where("$productTable.name", 'like', "%$q%")
                ->orWhere("$brandTable.name", 'like', "%$q%")
                ->groupBy("$productTable.id")
                ->get();

        return view('pages.search_results', compact('products', 'q','brands_footer','categories_footer'));
    }

    /**
     * Affiche la fiche d'un produit ainsi que les sous-catégories de la catégorie à laquelle il est lié.
     *
     * @return \Illuminite\Http\Response
     */
    public function product($id)
    {
        $product = Product::findOrFail($id);
        $category = $product->category;
        $categories = $category->children()->get();

        $categories_footer = Category::getRoots()->get();
        $brands_footer = Brand::get();

        $selectionProducts = Product::all();
        if ($selectionProducts->count() > 10) {
            $selectionProducts = $selectionProducts->random(10);
        }

        return view('pages.product', compact('product', 'category', 'categories', 'selectionProducts','brands_footer','categories_footer'));
    }

    /**
     * Affiche les produits liés à une catégorie ou ses sous-catégories.
     *
     * @return \Illuminite\Http\Response
     */
    public function category($id)
    {
        DB::enableQueryLog();
        $category = Category::findOrFail($id);
        $categories = $category->children()->get();

        $categories_footer = Category::getRoots()->get();
        $brands_footer = Brand::get();

        $descendantsCategoriesIds = $category->findDescendants()->pluck('id');
        $products = Product::whereIn('category_id', [$id])->get();
        
        return view('pages.category', compact('category', 'categories', 'products','brands_footer','categories_footer'));
    }

    /**
     * Affiche les produits liées une marque ansi qu'à la catégorie sélectionnée ou ses sous-catégories.
     *
     * @return \Illuminite\Http\Response
     */
    public function categoryBrand(int $categoryId, int $brandId)
    {
        $category = Category::findOrFail($categoryId);
        $brand = Brand::findOrFail($brandId);

        $categories_footer = Category::getRoots()->get();
        $brands_footer = Brand::get();

        $descendantsCategoriesIds = $category->findDescendants()->pluck('id');
        $products = Product::where('brand_id', $brandId)
            ->whereIn('category_id', $descendantsCategoriesIds)
            ->get();

        $categories = collect();
        foreach ($products as $product) {
            $productCategory = $product->category;
            if ($productCategory->getKey() !== $categoryId && !$categories->contains($productCategory)) {
                $categories[] = $product->category;
            }
        }

        return view('pages.category', compact('category', 'brand', 'categories', 'products','brands_footer','categories_footer'));
    }

    /**
     * Affiche les produits favoris de l'utilisateur.
     *
     * @return \Illuminite\Http\Response
     */
    public function favorites()
    {

        $favorites = auth()->user()->favorites;

        $categories_footer = Category::getRoots()->get();
        $brands_footer = Brand::get();

        $products = [];
        if ($favorites) {
            foreach ($favorites as $favorite) {
                if (!empty($favorite->product)) {
                    $products[] = $favorite->product;
                }
            }
        }

        return view('pages.favorites', compact('products','brands_footer','categories_footer'));
    }

    /**
     * Ajoute ou supprime un produit des favoris.
     *
     * @return \Illuminite\Http\Response
     */
    public function toggleFavorite($productId)
    {
        $product = Product::findOrFail($productId);

        $favorite = Favorite::firstOrNew([
            'product_id' => $product->id,
            'user_id' => auth()->id()
        ]);

        if ($favorite->getKey()) {
            $favorite->delete();
            $action = 'delete';
        } else {
            $favorite->save();
            $action = 'add';
        }

        return [
            'action' => $action,
            'record' => $favorite
        ];
    }

    public function profile(){
        $user = auth()->user();


        if(!empty($_POST)){
            $this->validate(request(), [
                'company' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'phone' => ['required'],
            ]);

            $user->company = request('company');
            $user->username = request('email');
            $user->name = request('name');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->phone = request('phone');


            $user->save();
        }

        return view('pages.profile', compact('user'));

    }
}
