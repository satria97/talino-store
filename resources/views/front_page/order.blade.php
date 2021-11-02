@extends('layout/template')
@section('title')
My Order
@endsection
@section('content')
<div class="view-order-section spad">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-4">
                <h5>Order History</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead style="background: rgb(2, 172, 172)">
                        <tr>
                            <th>No</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Detail Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        if(empty($_GET['page']))
                        $i=1;
                        else
                        $i= ($_GET['page'] * $orders->count()) - ($orders->count() - 1);
                        @endphp
                        @foreach ($orders as $row)
                        <tr>    
                            <td>{{ $i++ }}</td>
                            <td>{{date('j F Y', strtotime($row->tanggal_order))}}</td>
                            <td>Rp. {{number_format($row->total_price) }}</td>
                            <td>
                                <a href="{{url('/history/detail-order/'.$row->id)}}" class="btn btn-sm btn-primary">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection