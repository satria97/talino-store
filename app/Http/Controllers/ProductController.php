<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Product as GlobalProduct;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::paginate(12);
        $latest = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $populer = Product::inRandomOrder()->limit(4)->get();
        return view('front_page/home', compact('products', 'populer', 'latest'));
    }
    public function product()
    {
        $products = Product::with('category')->paginate(12);
        return view('front_page/product', compact('products'));
    }

    public function category()
    {
        $categories = DB::table('categories')->get();
        $products = Product::with('category')->paginate(6);
        return view('front_page/category', compact('products', 'categories'));
    }
    public function productCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category_id = $category->id;
        $categories = DB::table('categories')->get();
        $products = Product::with('category')->where('category_id', $category_id)->paginate(6);
        return view('front_page/category_product', compact('products', 'categories'));
    }

    public function detailProduct($slug, $product_slug)
    {
        $category = Category::where('slug', $slug)->first();
        $product = Product::with('category')->where('product_slug', $product_slug)->first();
        return view('front_page/detail-product', compact('product'));
    }
}
