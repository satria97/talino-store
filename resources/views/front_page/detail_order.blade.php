@extends('layout/template')
@section('title')
Detail Order
@endsection
@section('content')
<div class="view-order-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead style="background: rgb(2, 172, 172)">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        if(empty($_GET['page']))
                        $i=1;
                        else
                        $i= ($_GET['page'] * $detail->count()) - ($detail->count() - 1);
                        @endphp
                        @foreach ($detail as $row)
                        <tr>    
                            <td>{{ $i++ }}</td>
                            <td><img width="70px" src="{{url('storage/images/'.$row->product->image)}}"></td>
                            <td>{{ $row->product->name }}</td>
                            <td>{{ $row->qty }}</td>
                            <td>Rp. {{ number_format($row->subtotal) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection