<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Cart;
use App\Category;
use App\Favorite;
use App\Product;
use Illuminate\Http\Request;
use Uccello\Core\Models\Domain;

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

        return view('pages.home', compact('selectionProducts'));
    }

    /**
     * Affiche les catégories de niveau 0
     *
     * @return \Illuminite\Http\Response
     */
    public function search()
    {
        $categories = Category::getRoots()->get();
        $productsCount = Product::count();

        return view('pages.search', compact('categories', 'productsCount'));
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

        $productsCount = 0;
        foreach ($brands as $brand) {
            $productsCount += $brand->productsCountForCategory($category);
        }

        return view('pages.search_brands', compact('category', 'brands', 'productsCount'));
    }

    /**
     * Affiche la fiche d'un produit ainsi que les sous-catégories de la catégorie à laquelle il est lié.
     *
     * @return \Illuminite\Http\Response
     */
    public function product($id)
    {
        $product = Product::findOrFail($id);
        $categories = $product->category->children()->get();

        $selectionProducts = Product::all();
        if ($selectionProducts->count() > 10) {
            $selectionProducts = $selectionProducts->random(10);
        }

        return view('pages.product', compact('product', 'categories', 'selectionProducts'));
    }

    /**
     * Affiche les produits liés à une catégorie ou ses sous-catégories.
     *
     * @return \Illuminite\Http\Response
     */
    public function category($id)
    {
        $category = Category::findOrFail($id);
        $categories = $category->children()->get();

        $descendantsCategoriesIds = $category->findDescendants()->pluck('id');
        $products = Product::whereIn('category_id', $descendantsCategoriesIds)->get();

        return view('pages.category', compact('category', 'categories', 'products'));
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

        return view('pages.category', compact('category', 'brand', 'categories', 'products'));
    }

    /**
     * Affiche les produits favoris de l'utilisateur.
     *
     * @return \Illuminite\Http\Response
     */
    public function favorites()
    {
        $favorites = auth()->user()->favorites;

        $products = [];
        if ($favorites) {
            foreach ($favorites as $favorite) {
                $products[] = $favorite->product;
            }
        }

        return view('pages.favorites', compact('products'));
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

    /**
     * Affiche le panier de l'utilisateur et calcule le prix total.
     *
     * @return \Illuminite\Http\Response
     */
    public function cart()
    {
        $cartLines = auth()->user()->carts;

        $totalPrice = 0;
        $totalQuantity = 0;

        if ($cartLines) {
            foreach ($cartLines as $line) {
                $totalPrice += $line->product->priceAfterDiscount * $line->quantity;
                $totalQuantity += $line->quantity;
            }
        }

        return view('pages.cart', compact('cartLines', 'totalPrice', 'totalQuantity'));
    }

    /**
     * Ajoute un produit dans le panier.
     *
     * @return \Illuminite\Http\Response
     */
    public function addToCart()
    {
        $product = Product::findOrFail(request('product'));
        $quantity = (int) request('quantity');

        $cart = Cart::firstOrNew([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
        ]);

        // Le code suivant ermet de mettre à jour la quantité si le produit existe déjà dans le panier
        $cart->quantity = (int) $cart->quantity + $quantity;
        $cart->save();

        return redirect(route('cart'));
    }

    /**
     * Met à jour la quantité d'un produit dans le panier.
     *
     * @return \Illuminite\Http\Response
     */
    public function updateCart()
    {
        $quantity = (int) request('quantity');

        $cart = Cart::where('product_id', request('product'))
            ->where('user_id', auth()->id())
            ->first();

        if ($cart) {
            $cart->quantity = $quantity;
            $cart->save();
        }

        return $cart;
    }

    /**
     * Supprime un produit du panier.
     *
     * @return \Illuminite\Http\Response
     */
    public function deleteFromCart()
    {
        Cart::where('product_id', request('product'))
            ->where('user_id', auth()->id())
            ->delete();

        return redirect(route('cart'));
    }
}
