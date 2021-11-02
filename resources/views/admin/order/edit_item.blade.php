@extends('admin/template')
@section('title')
Edit Item
@endsection('title')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Item</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/order/insert_item/'.$order_id.'/'.$id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="product_id" class="col-sm-2 col-form-label">Product</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('product_id') is-invalid @enderror" name="product_id" value="{{$order_item->name}}" readonly>
                            </div>
                            @error('product_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="qty" class="col-sm-2 col-form-label">Qty</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{old('qty',$order_item->qty)}}">
                            </div>
                            @error('qty')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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