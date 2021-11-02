<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $coupon = DB::table('coupons')->paginate(10);
        return view('admin/coupon/list', compact('coupon'));
    }
    public function insert()
    {
        return view('admin/coupon/insert');
    }
    public function insertAction(Request $request)
    {
        $validateData = $request->validate([
            'kode' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required',
            'cart_value' => 'required'
        ]);
        $data = [
            'kode' => $request->kode,
            'type' => $request->type,
            'value' => $request->value,
            'cart_value' => $request->cart_value
        ];
        DB::table('coupon')->insert($data);
        return redirect('admin/coupon')->with('message', 'data added successfully');;
    }
    public function edit($id)
    {
        $coupon = DB::table('coupons')->where('id', $id)->first();
        return view('admin/coupon/edit', compact('coupon'));
    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'kode' => 'required',
            'type' => 'required',
            'value' => 'required',
            'cart_value' => 'required'
        ]);
        $data = [
            'kode' => $request->kode,
            'type' => $request->type,
            'value' => $request->value,
            'cart_value' => $request->cart_value
        ];
        DB::table('coupons')->where('id', $id)->update($data);
        return redirect('admin/coupon')->with('message', 'data changed successfully');;
    }
}
