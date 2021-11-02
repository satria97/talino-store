@extends('layout/template')
@section('title')
Detail Product
@endsection
@section('content')
<!-- product section -->
<section class="product-section">
    <div class="container">
        <div class="back-link">
            <a href="{{ url('category/'.$product->category->slug) }}"> &lt;&lt; Back to Category</a>
        </div>
        <div class="row" id="product_data">
            <div class="col-lg-6">
                <div class="product-pic-zoom">
                    <img class="product-big-img" src="{{ url('storage/images/'.$product->image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 product-details">
                <h2 class="p-title">{{ $product->name }}</h2>
                <h3 class="p-price">Rp. {{ number_format($product->price) }}</h3>
                @if ($product->stock > 0)
                <h4 class="p-stock">Available: <span>In Stock</span></h4>
                @else
                <h4 class="p-stock">Available: <span>Out of Stock</span></h4>
                @endif
                <div class="p-rating">
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o fa-fade"></i>
                </div>
                <div class="p-review">
                    <a href="">3 reviews</a>|<a href="">Add your review</a>
                </div>
                <div class="quantity">
                    <input type="hidden" name="" id="id_product" value="{{ $product->id }}">
                    <p>Quantity</p>
                    <div class="pro-qty">
                        <input type="text" name="qty" value="1" id="qty">
                    </div>
                </div>
                <button type="button" class="site-btn" id="addToCart"><i class="fa fa-shopping-cart mr-1"></i>ADD TO CART</button>
            </div>
            <div class="col-lg-12">
                <div id="accordion" class="accordion-area">
                    <div class="panel">
                        <div class="panel-header" id="headingOne">
                            <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                                <p>Approx length 66cm/26" (Based on a UK size 8 sample)</p>
                                <p>Mixed fibres</p>
                                <p>The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5'8"</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-header" id="headingTwo">
                            <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="panel-body">
                                <img src="./img/cards.png" alt="">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-header" id="headingThree">
                            <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="panel-body">
                                <h4>7 Days Returns</h4>
                                <p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->
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