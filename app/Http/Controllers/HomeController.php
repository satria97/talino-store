<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $products = Product::paginate(12);
        $latest = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $populer = Product::inRandomOrder()->limit(4)->get();
        return view('welcome', compact('products', 'populer', 'latest'));
    }
}
