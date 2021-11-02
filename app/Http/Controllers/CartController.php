<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        return view('front_page/cart', compact('cart'));
    }

    public function insert(Request $request)
    {
        $product_id = $request->input('product_id');
        $qty = $request->input('qty');
        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::user()->id)->first()) {
                    return response()->json(['message' => $prod_check->name . ' Already added to Cart']);
                }
                $cartItem = new Cart();
                $cartItem->user_id = Auth::user()->id;
                $cartItem->product_id = $product_id;
                $cartItem->qty = $qty;
                $cartItem->subtotal = $prod_check->price * $request->qty;
                $cartItem->save();
                return response()->json(['message' => $prod_check->name . ' Added to Cart']);
            }
        } else {
            return response()->json(['message', 'Login to Continue']);
        }
    }

    public function delete($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect('/cart')->with('message', 'Delete item successfully');
    }
}
