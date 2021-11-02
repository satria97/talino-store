<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->orderBy('orders.id', 'DESC')
            ->paginate(10);
        return view('admin/order/list', compact('orders'));
    }
    public function insertOrder()
    {
        $users = User::get();
        return view('admin/order/insert', compact('users'));
    }
    public function insertOrderAction(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'tanggal_order' => 'required'
        ]);
        $user_id = $request->user_id;
        $tanggal_order = $request->tanggal_order;
        $order = new Order;
        $order->user_id = $user_id;
        $order->tanggal_order = $tanggal_order;
        $order->save();
        $id = $order->id;
        return redirect('admin/order/insert_item/' . $id)->with('message','Data added successfully');
    }
    public function insertOrderItem($id)
    {
        $data['id'] = $id;
        $data['products'] = DB::table('products')->get();
        $data['order_item'] = OrderItem::with('product')
            ->where('order_id', $id)
            ->orderBy('order_item.id', 'desc')
            ->paginate(5);
        return view('admin/order/insert_item')->with($data);
    }
    public function insertOrderItemAction(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'qty' => 'required'
        ]);
        $data = [
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty
        ];
        DB::table('order_item')
            ->insert($data);
        return back()->with('message', 'Data added successfully');
    }
    public function editOrder($id)
    {
        $data['users'] = DB::table('users')->get();
        $data['orders'] = DB::table('orders')
            ->where('id', $id)
            ->first();
        return view('admin/order/edit', $data);
    }
    public function updateOrder(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'tanggal_order' => 'required'
        ]);
        $data = [
            'user_id' => $request->user_id,
            'tanggal_order' => $request->tanggal_order
        ];
        DB::table('orders')
            ->where('id', $id)
            ->update($data);
        return redirect('admin/order')->with('message', 'Data changed successfully');
    }
    public function editOrderItem($order_id, $id)
    {
        $data['order_id'] = $order_id;
        $data['id'] = $id;
        $data['order_item'] = DB::table('order_item')
            ->select('order_item.id', 'order_item.order_id', 'order_item.product_id', 'order_item.qty', 'products.id', 'products.name', 'orders.id')
            ->join('orders', 'orders.id', '=', 'order_item.order_id')
            ->join('products', 'products.id', '=', 'order_item.product_id')
            ->where('order_item.id', $id)
            ->first();
        return view('admin/order/edit_item', $data);
    }
    public function updateOrderItem(Request $request, $order_id, $id)
    {
        $validatedData = $request->validate([
            'qty' => 'required'
        ]);
        $data = [
            'qty' => $request->qty
        ];
        DB::table('order_item')
            ->where('id', $id)
            ->update($data);
        return redirect('admin/order/insert_item/' . $order_id)->with('message', 'Data changed successfully');
    }
    public function deleteOrder($id)
    {
        DB::table('order_item')
            ->where('order_id', $id)
            ->delete();

        DB::table('orders')
            ->where('id', $id)
            ->delete();
        return redirect('admin/order')->with('message', 'Delete data successfully');
    }
    public function deleteOrderItem($order_id, $id)
    {
        DB::table('order_item')
            ->where('id', $id)
            ->delete();
        return redirect('admin/order/insert_item/' . $order_id)->with('message', 'Delete data successfully');
    }
}
