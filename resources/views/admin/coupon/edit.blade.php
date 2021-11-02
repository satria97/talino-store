@extends('admin/template')
@section('title')
Edit Coupon
@endsection('title')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Coupon</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/coupon/'.$coupon->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="kode" class="col-sm-2 col-form-label">Code</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{old('kode',$coupon->kode)}}" readonly>
                            </div>
                            @error('kode')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="value" class="col-sm-2 col-form-label">Coupon Value</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('value') is-invalid @enderror" name="value" value="{{old('value',$coupon->value)}}">
                            </div>
                            @error('value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="cart_value" class="col-sm-2 col-form-label">Cart Value</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('cart_value') is-invalid @enderror" name="cart_value" value="{{old('cart_value',$coupon->cart_value)}}">
                            </div>
                            @error('cart_value')
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