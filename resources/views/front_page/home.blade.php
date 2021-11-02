@extends('layout/template')
@section('title')
Home
@endsection
@section('content')
<!-- Hero section -->
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="img/gambar1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span>New Arrivals</span>
                        <h2>denim jackets</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus
                            commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        <a href="#" class="site-btn sb-line">DISCOVER</a>
                        <a href="#" class="site-btn sb-white">ADD TO CART</a>
                    </div>
                </div>
                <div class="offer-card text-white">
                    <span>from</span>
                    <h2>$29</h2>
                    <p>SHOP NOW</p>
                </div>
            </div>
        </div>
        <div class="hs-item set-bg" data-setbg="img/gambar2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span>New Arrivals</span>
                        <h2>denim jackets</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus
                            commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        <a href="#" class="site-btn sb-line">DISCOVER</a>
                        <a href="#" class="site-btn sb-white">ADD TO CART</a>
                    </div>
                </div>
                <div class="offer-card text-white">
                    <span>from</span>
                    <h2>$29</h2>
                    <p>SHOP NOW</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="slide-num-holder" id="snh-1"></div>
    </div>
</section>
<!-- Hero section end -->

<!-- Features section -->
<section class="features-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="img/icons/1.png" alt="#">
                    </div>
                    <h2>Fast Secure Payments</h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="img/icons/2.png" alt="#">
                    </div>
                    <h2>Premium Products</h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="img/icons/3.png" alt="#">
                    </div>
                    <h2>Free & fast Delivery</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features section end -->

<!-- letest product section -->
<section class="top-letest-product-section">
    <div class="container">
        <div class="section-title">
            <h2>LATEST PRODUCTS</h2>
        </div>
        <div class="product-slider owl-carousel">
            @foreach ($latest as $late)
            <div class="product-item" id="product_data">
                <div class="pi-pic">
                    <a href="{{ url('category/'.$late->category->slug.'/'.$late->product_slug) }}">
                        <img src="{{ url('storage/images/'.$late->image) }}" height="190px" alt="">
                    </a>
                    <div class="pi-links">
                        <input type="hidden" name="" id="id_product" value="{{ $late->id }}">
                        <input type="hidden" name="" id="qty" value="1">
                        <a href="#" id="addToCart" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                    </div>
                </div>
                <div class="pi-text">
                    <h6>Rp. {{ number_format($late->price) }}</h6>
                    <p>{{ $late->name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- letest product section end -->

<!-- Product filter section -->
<section class="product-filter-section pt-5">
    <div class="container">
        <div class="section-title">
            <h2>BROWSE TOP SELLING PRODUCTS</h2>
        </div>
        <ul class="product-filter-menu">
            <li><a href="#">TOPS</a></li>
            <li><a href="#">JUMPSUITS</a></li>
            <li><a href="#">LINGERIE</a></li>
            <li><a href="#">JEANS</a></li>
            <li><a href="#">DRESSES</a></li>
            <li><a href="#">COATS</a></li>
            <li><a href="#">JUMPERS</a></li>
            <li><a href="#">LEGGINGS</a></li>
        </ul>
        <div class="row">
            @foreach ($populer as $pop)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item" id="product_data">
                    <div class="pi-pic">
                        <a href="{{ url('category/'.$pop->category->slug.'/'.$pop->product_slug) }}">
                            <img src="{{ url('storage/images/'.$pop->image) }}" height="200px" alt="">
                        </a>
                        <div class="pi-links">
                            <input type="hidden" name="" id="id_product" value="{{ $pop->id }}">
                            <input type="hidden" name="" id="qty" value="1">
                            <a href="#" id="addToCart" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>Rp. {{ number_format($pop->price) }}</h6>
                        <p>{{ $pop->name }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Product filter section end -->
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