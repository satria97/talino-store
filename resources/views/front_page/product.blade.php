@extends('layout/template')
@section('title')
Product
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        @foreach ($products as $product)
        <div class="col-lg-3 col-sm-6">
            <div class="product-item" id="product_data">
                <div class="pi-pic">
                    <a href="{{ url('category/'.$product->category->slug.'/'.$product->product_slug) }}">
                        <img src="{{url('storage/images/'.$product->image)}}" height="200px" alt="">
                    </a>
                    <div class="pi-links">
                        <input type="hidden" name="" id="id_product" value="{{ $product->id }}">
                        <input type="hidden" name="" id="qty" value="1">
                        <a href="#" id="addToCart" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <strong>{{$product->name}}</strong><br>
                    <span>Rp. {{number_format($product->price)}}</span>
                    <p>Stock : {{$product->stock}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="wrap-pagination-info mb-4">
        {{$products->links()}}
    </div>
</div>
@endsection
@push('scrips')
<script>
    $(document).ready(function(){
        $('#addToCart').click(function(e){
            e.preventDefault();
            const product_id = $(this).closest('#product_data').find('#id_product').val();
            const qty = $(this).closest('#product_data').find('#qty').val();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                method: 'POST',
                url: '/add-to-cart',
                data: {
                    'product_id' : product_id,
                    'qty' : qty
                },
                success: function(response) {
                    Swal.fire(response.message);
                }
            });
        });
    });
</script>    
@endpush