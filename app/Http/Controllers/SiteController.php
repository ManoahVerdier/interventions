<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Cart;
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
        $category = Category::findOrFail($id);
        $categories = $category->children()->get();

        $categories_footer = Category::getRoots()->get();
        $brands_footer = Brand::get();

        $descendantsCategoriesIds = $category->findDescendants()->pluck('id');
        $products = Product::whereIn('category_id', $descendantsCategoriesIds)->get();

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

    /**
     * Affiche le panier de l'utilisateur et calcule le prix total.
     *
     * @return \Illuminite\Http\Response
     */
    public function cart()
    {
        $cartLines = auth()->user()->carts;

        $categories_footer = Category::getRoots()->get();
        $brands_footer = Brand::get();

        $cartTotals = $this->getCartTotals();

        $totalPrice = $cartTotals['price'];
        $totalQuantity = $cartTotals['quantity'];

        return view('pages.cart', compact('cartLines', 'totalPrice', 'totalQuantity','brands_footer','categories_footer'));
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

        $cartTotals = $this->getCartTotals();

        return $cartTotals;
    }

    public function discountCart(){
        $code = request('code');
        $discount = CodePromo::where('code',$code)->where('expiration_date','>=',date('Y-m-d'))->first();
        
        $cartTotals = $this->getCartTotals($discount);

        return $cartTotals;
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

    /**
     * Valide le panier : Crée la commande dans la base de données,
     * envoie un email aux responsables et un email à l'utilisateur,
     * supprime le panier actuel.
     *
     * @return \Illuminite\Http\Response
     */
    public function validateCart()
    {
        // Create order
        $order = $this->createOrder();

        // Send email to order managers
        $usersToNotify = explode(';', env('USERS_TO_NOTIFY_AFTER_ORDER'));
        if ($usersToNotify) {
            foreach ($usersToNotify as $userName) {
                $user = User::where('username', trim($userName))->first();

                if ($user) {
                    $user->notify(new NewOrder(auth()->user(), $order));
                }
            }
        }

        // Send confirmation email to user
        auth()->user()->notify(new OrderConfirmation($order));

        // Delete user cart
        Cart::where('user_id', auth()->id())
            ->delete();

        return [
            'success' => true
        ];
    }

    protected function createOrder()
    {
        $cartLines = auth()->user()->carts;

        $totalHT = $totalTTC = 0;
        foreach ($cartLines as $line) {
            $totalHT += $line->product->amountHTAfterDiscount;
            $totalTTC += $line->product->amountTTCAfterDiscount;
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_ht' => $totalHT,
            'total_ttc' => $totalTTC,
            'status' => 'status.pending',
            'domain_id' => Domain::first()->id
        ]);

        foreach ($cartLines as $line) {
            OrderLine::create([
                'order_id' => $order->getKey(),
                'product_id' => $line->product_id,
                'quantity' => $line->quantity,
                'amount_ht' => $line->product->amountHTAfterDiscount,
                'amount_ttc' => $line->product->amountTTCAfterDiscount,
            ]);
        }

        return $order;
    }

    protected function getCartTotals($discount=null)
    {
        $cartLines = auth()->user()->carts;

        $totalPrice = 0;
        $totalQuantity = 0;

        if ($cartLines) {
            foreach ($cartLines as $line) {
                $totalPrice += $line->product->amountHTAfterDiscount * $line->quantity;
                $totalQuantity += $line->quantity;
            }
        }

        if($discount){
            $savings=0;
            if($discount->minAmount<$totalPrice){
                if($discount->type=="type.percent"){
                    $savings = ($totalPrice*$discount->value/100);
                }
                else{
                    $savings = $discount->value;
                }
            
                return [
                    'price' => $totalPrice,
                    'quantity' => $totalQuantity,
                    'savings' => $savings
                ];
            }    
        }

        return [
            'price' => $totalPrice,
            'quantity' => $totalQuantity,'discount'=>$discount
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
