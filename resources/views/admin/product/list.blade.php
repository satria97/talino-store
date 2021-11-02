@extends('admin/template')
@section('title')
Product
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Product</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{url('admin/product/insert')}}" class="btn btn-success">Insert</a>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Code</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            if(empty($_GET['page']))
                            $i=1;
                            else
                            $i= ($_GET['page'] * $products->count()) - ($products->count() - 1);
                            @endphp
                            @foreach ($products as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><img width="70px" src="{{url('storage/images/'.$row->image)}}"></td>
                                <td>{{$row->code}}</td>
                                <td>{{$row->category->nama}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{ $row->product_slug }}</td>
                                <td>{{$row->stock}}</td>
                                <td>Rp. {{number_format($row->price)}}</td>
                                <td>
                                    <a href="{{url('admin/product/edit/'.$row->id)}}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url('admin/product/delete/'.$row->id)}}" onclick="return confirm('Are you sure?')" ;><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
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