@extends('admin/template')
@section('title')
Insert Coupon
@endsection('title')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Insert Coupon</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/coupon/insert-proses')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="kode" class="col-sm-2 col-form-label">Code</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{old('kode')}}">
                            </div>
                            @error('kode')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Coupon Type</label>
                            <div class="col-sm-4">
                                <select class="form-select" name="type">
                                    <option value="">--Select Type--</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="percent">Percent</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="value" class="col-sm-2 col-form-label">Coupon Value</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('value') is-invalid @enderror" name="value" value="{{old('value')}}">
                            </div>
                            @error('value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="cart_value" class="col-sm-2 col-form-label">Cart Value</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('cart_value') is-invalid @enderror" name="cart_value" value="{{old('cart_value')}}">
                            </div>
                            @error('cart_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <input class="btn btn-primary" type="submit" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')