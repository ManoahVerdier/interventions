<?php

namespace App\Http\Controllers;

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
        return view('pages.home');
    }

    public function search()
    {
        return view('pages.search');
    }

    public function product()
    {
        return view('pages.product');
    }

    public function category()
    {
        return view('pages.category');
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
