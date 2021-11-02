@extends('admin/template')
@section('title')
Insert Order
@endsection('title')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Insert Order</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/order/insert-proses')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-4">
                                <select name="user_id">
                                    @foreach($users as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_order" class="col-sm-2 col-form-label">Tanggal Order</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control @error('tanggal_order') is-invalid @enderror" name="tanggal_order" value="{{old('tanggal_order')}}">
                            </div>
                            @error('tanggal_order')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <input class="btn btn-primary" type="submit" value="Simpan">
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