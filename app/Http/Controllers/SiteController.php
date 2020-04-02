<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

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
        $selectionProducts = Product::all()->random(10);

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
        $selectionProducts = Product::all()->random(10);

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
        return view('pages.favorites');
    }

    public function cart()
    {
        return view('pages.cart');
    }
}
