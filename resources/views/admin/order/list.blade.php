@extends('admin/template')
@section('title')
Order
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Order</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{url('admin/order/insert')}}" class="btn btn-success">Insert</a>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal Order</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                <td>{{$i++}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{date('j F Y', strtotime($row->tanggal_order))}}</td>
                                <td>{{ $row->status }}</td>
                                <td>
                                    <a href="{{url('admin/order/edit/'.$row->id)}}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url('admin/order/delete/'.$row->id)}}" onclick="return confirm('Are you sure?')" ;><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
                                    <a href="{{url('admin/order/insert_item/'.$row->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$orders->links()}}
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
@endsection