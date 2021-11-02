<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = DB::table('categories')->orderBy('id', 'DESC')->paginate(10);
        return view('admin/category/list', compact('categories'));
    }

    public function insert()
    {
        return view('admin/category/insert');
    }

    public function check(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }

    public function insertAction(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'slug' => 'required'
        ]);
        $data = [
            'nama' => $request->nama,
            'slug' => $request->slug
        ];
        DB::table('categories')->insert($data);
        return redirect('admin/category')->with('message', 'Data saved successfully');
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin/category/edit', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'slug' => 'required'
        ]);
        $data = [
            'nama' => $request->nama,
            'slug' => $request->slug
        ];
        DB::table('categories')->where('id', $id)->update($data);
        return redirect('admin/category')->with('message', 'Data changed successfully');
    }
    public function delete($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect('admin/category')->with('message', 'Delete data successfully');
    }
}
