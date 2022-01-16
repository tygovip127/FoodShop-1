<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $banners = Banner::all();
        $products = Product::latest()->paginate(8);
        $sale_products =Product::where('discount' ,'>', 0)->paginate(8);
        $new_products = Product::latest()->paginate(8);
        $logo = Setting::where('name', 'logo')->first()->content;
        $introduction = Setting::where('name', 'introduction')->first()->content;

        return view('index', compact('banners', 'products','sale_products', 'new_products', 'logo', 'introduction'));
    }
}
