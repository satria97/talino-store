@extends('admin/template')
@section('title')
Coupons
@endsection('title')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Coupon</h3>
                </div>
                <div class="card-body">
                    <a href="{{url('admin/coupon/insert')}}" class="btn btn-success">Insert</a>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Coupon Code</th>
                                <th>Coupon Type</th>
                                <th>Coupon Value</th>
                                <th>Cart Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            if(empty($_GET['page']))
                            $i=1;
                            else
                            $i= ($_GET['page'] * $coupon->count()) - ($coupon->count() - 1);
                            @endphp
                            @foreach ($coupon as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->kode}}</td>
                                <td>{{$row->type}}</td>
                                <td>{{$row->value}}</td>
                                <td>{{$row->cart_value}}</td>
                                <td>
                                    <a href="{{url('admin/coupon/edit/'.$row->id)}}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url('admin/coupon/delete/'.$row->id)}}" onclick="return confirm('Are you sure?')" ;><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$coupon->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')