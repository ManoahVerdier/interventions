<?php

namespace App\Http\Controllers;

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
     * Show the application dashboard.
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

    public function search()
    {
        $categories = Category::getRoots()->get();
        $productsCount = Product::count();

        return view('pages.search', compact('categories', 'productsCount'));
    }

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

    public function category($id)
    {
        $category = Category::findOrFail($id);
        $categories = $category->children()->get();
        $products = $category->products()->get();

        return view('pages.category', compact('category', 'categories', 'products'));
    }

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

    public function deleteFromCart()
    {
        Cart::where('product_id', request('product'))
            ->where('user_id', auth()->id())
            ->delete();

        return redirect(route('cart'));
    }
}
