@extends('admin/template')
@section('title')
Category
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{url('admin/category/insert')}}" class="btn btn-success">Insert</a>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            if(empty($_GET['page']))
                            $i=1;
                            else
                            $i= ($_GET['page'] * $categories->count()) - ($categories->count() - 1);
                            @endphp
                            @foreach ($categories as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->slug}}</td>
                                <td>
                                    <a href="{{url('admin/category/edit/'.$row->id)}}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url('admin/category/delete/'.$row->id)}}" onclick="return confirm('Are you sure?')" ;><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection