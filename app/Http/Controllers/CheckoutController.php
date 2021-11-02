<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        return view('front_page/checkout', compact('cart'));
    }
    public function placeOrder(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'phone' => 'required'
        ]);
        $orders = new Order();
        $orders->user_id = Auth::user()->id;
        $orders->name = $request->input('name');
        $orders->lastname = $request->input('lastname');
        $orders->email = $request->input('email');
        $orders->address1 = $request->input('address1');
        $orders->address2 = $request->input('address2');
        $orders->city = $request->input('city');
        $orders->province = $request->input('province');
        $orders->country = $request->input('country');
        $orders->zipcode = $request->input('zipcode');
        $orders->phone = $request->input('phone');
        $tanggal = Carbon::now();

        $total = 0;
        $cartItems_total = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        foreach ($cartItems_total as $price_total) {
            $total = $total + $price_total->product->price * $price_total->qty;
        }
        $orders->total_price = $total;
        $orders->tanggal_order = $tanggal;
        $orders->save();

        //save to order_item
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $orders->id,
                'product_id' => $item->product_id,
                'qty' => $item->qty,
                'subtotal' => $item->subtotal
            ]);

            $product = Product::where('id', $item->product_id)->first();
            $product->stock = $product->stock - $item->qty;
        }

        if (Auth::user()->address1 == NULL) {
            $user = User::where('id', Auth::user()->id)->first();
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->province = $request->input('province');
            $user->country = $request->input('country');
            $user->zipcode = $request->input('zipcode');
            $user->phone = $request->input('phone');
            $user->update();
        }

        $cart = Cart::where('user_id', Auth::user()->id)->get();
        Cart::destroy($cart);
        return redirect('/checkout')->with('message', 'Order placed successfully');
    }
}
