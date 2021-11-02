<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('front_page/profile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $validateData = $request->validate([
            'lastname' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'phone' => 'required'
        ]);
        $user->lastname = $request->lastname;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->country = $request->country;
        $user->zipcode = $request->zipcode;
        $user->phone = $request->phone;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->update();
        return redirect('/profile')->with('message','Update profile successfully');
    }

    public function history()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('front_page/order', compact('orders'));
    }

    public function detailOrder($id)
    {
        $detail = OrderItem::with('product')->where('order_id', $id)->get();
        return view('front_page/detail_order', compact('detail'));
    }
}
