@extends('admin/template')
@section('title')
Insert Order Item
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Insert Order Item</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/order/insert_item-proses/'.$id)}}" method="POST" enctype="multipart/form-data" id="form-order-item">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="hidden" class="form-control" name="order_id" id="order_id" value="{{$id}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_id" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-4">
                                <select name="product_id" id="product_id">
                                    @foreach($products as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="qty" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" id="qty" value="{{old('qty')}}">
                            </div>
                            @error('qty')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <input class="btn btn-primary" type="submit" value="Simpan">
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <!-- output -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="data-item">
                            @php
                            if(empty($_GET['page']))
                            $i=1;
                            else
                            $i= ($_GET['page'] * $order_item->count()) - ($order_item->count() - 1);
                            @endphp
                            @foreach ($order_item as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->product->name}}</td>
                                <td>{{$row->qty}}</td>
                                <td>
                                    <a href="{{url('admin/order/insert_item/'.$row->order_id.'/edit/'.$row->id)}}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url('admin/order/insert_item/'.$row->order_id.'/delete/'.$row->id)}}" onclick="return confirm('Are you sure?')" ;><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$order_item->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scrips')
<script>
    $(document).ready(function() {
        $('#form-order-item').on('submit', function(e) {
            e.preventDefault();
            const order_id = $('#order_id').val();
            const product_id = $('#product_id').val();
            const qty = $('#qty').val();

            $.ajax({
                type: 'POST',
                url: '/api/order/insert_item/' + order_id,
                data: {
                    'order_id': order_id,
                    'product_id': product_id,
                    'qty': qty
                },
                success: function(result) {
                    $('#data-item').html(updateTable(result.data));
                }
            })
        })
    })

    $(document).on('click', function(e) {
        if ($(e.target).hasClass('btn-delete')) {
            const order_id = $(e.target).data('order-id');
            const id = $(e.target).data('id');
            $.ajax({
                type: 'DELETE',
                url: `/api/order/${order_id}/insert_item/${id}`,
                success: function(result) {
                    $('#data-item').html(updateTable(result.data));
                }
            })
        }
    })

    function updateTable(data) {
        let table = '';
        data.forEach((d, i) => {
            table += `
                        <tr>
                            <td>${i+1}</td>
                            <td>${d.product.name}</td>
                            <td>${d.qty}</td>
                            <td>
                                <a href="/admin/order/insert_item/${d.order_id}/edit/${d.id}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                data-order-id="${d.order_id}"
                                data-id="${d.id}"
                                onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                `;
        })
        return table
    }
</script>
@endpush