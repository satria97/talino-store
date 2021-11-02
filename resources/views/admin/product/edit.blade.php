@extends('admin/template')
@section('title')
Edit Product
@endsection('title')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-4">
                                <select name="category_id">
                                    @foreach($categories as $row)
                                    <option value="{{ $row->id}}" {{(old('category_id',$products->category_id) == $row->id) ? 'selected' : '' }}>{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">Code</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{old('code',$products->code)}}" readonly>
                            </div>
                            @error('code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{old('name',$products->name)}}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="product_slug" class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('product_slug') is-invalid @enderror" name="product_slug" value="{{old('product_slug',$products->product_slug)}}">
                            </div>
                            @error('product_slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('stock') is-invalid @enderror" name="stock" value="{{old('stock',$products->stock)}}">
                            </div>
                            @error('stock')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('price') is-invalid @enderror" name="price" value="{{old('price',$products->price)}}">
                            </div>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="varian" class="col-sm-2 col-form-label">Varian</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('varian') is-invalid @enderror" name="varian" value="{{old('varian',$products->varian)}}">
                            </div>
                            @error('varian')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('description') is-invalid @enderror" name="description" value="{{old('description',$products->description)}}">
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="{{asset('storage/images/' . $products->image) }}" height="100" width="100">
                                </div>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" value="{{old('image',$products->image)}}">
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection('content')