<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['products'] = Product::with('category')->orderBy('id', 'desc')->simplePaginate(10);
        return view('admin/product/list', $data);
    }
    public function insert()
    {
        $categories = Category::get();
        return view('admin/product/insert', compact('categories'));
    }
    public function insertAction(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:products',
            'name' => 'required',
            'stock' => 'required|integer',
            'varian' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,bmp|max:2048',
            'category_id' => 'required',
            'price' => 'required',
            'product_slug' => 'required'
        ]);

        $code = $request->input('code');
        $name = $request->input('name');
        $stock = $request->input('stock');
        $varian = $request->input('varian');
        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $price = $request->input('price');
        $product_slug = $request->input('product_slug');

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images', $imageName);
        } else {
            $imageName = 'noimage.jpg';
        }

        $product = new Product;
        $product->code = $code;
        $product->name = $name;
        $product->stock = $stock;
        $product->varian = $varian;
        $product->description = $description;
        $product->image = $imageName;
        $product->category_id = $category_id;
        $product->price = $price;
        $product->product_slug = $product_slug;
        $product->save();

        return redirect('admin/product')->with('message', 'Data saved successfully');
    }

    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::findOrFail($id);
        return view('admin/product/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'stock' => 'required|integer',
            'varian' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png,bmp|max:2048',
            'category_id' => 'required',
            'price' => 'required',
            'product_slug' => 'required'
        ]);

        $product = Product::findOrFail($id);
        if (Request()->image <> "") {
            if ($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageName = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('image')->storeAs('public/images', $imageName);
            } else {
                $imageName = 'noimage.jpg';
            }

            $product->category_id = $request->category_id;
            $product->code = $request->code;
            $product->name = $request->name;
            $product->stock = $request->stock;
            $product->varian = $request->varian;
            $product->description = $request->description;
            $product->image = $imageName;
            $product->price = $request->price;
            $product->product_slug = $request->product_slug;
            $product->save();
        } else {
            $product->category_id = $request->category_id;
            $product->code = $request->code;
            $product->name = $request->name;
            $product->stock = $request->stock;
            $product->varian = $request->varian;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->product_slug = $request->product_slug;
            $product->save();
        }
        return redirect('admin/product')->with('message', 'Data changed successfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        //untuk menghapus foto di public
        if ($product->image <> "") {
            unlink(public_path('storage/images') . '/' . $product->image);
            $product->delete();
        }
        $product->delete();
        return redirect('admin/product')->with('message', 'Delete data successfully');
    }
}
