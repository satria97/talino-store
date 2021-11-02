@extends('admin/template')
@section('title')
Insert Category
@endsection('title')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Insert Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/category/insert-proses')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama')}}">
                            </div>
                            @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{old('slug')}}">
                            </div>
                            @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scrips')
<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('admin/category/checkSlug?nama=' + nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endpush