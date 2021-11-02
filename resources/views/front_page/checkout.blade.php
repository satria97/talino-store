@extends('layout/template')
@section('title')
Checkout
@endsection
@section('content')
<!-- checkout section  -->
<section class="checkout-section spad">
    <div class="container">
        <form class="checkout-form" action="{{ url('/place-order') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8 order-2 order-lg-1">
                    <div class="cf-title">Billing Address</div>
                    <div class="row">
                        <div class="col-md-7">
                            <p>*Billing Information</p>
                        </div>
                        {{-- <div class="col-md-5">
                            <div class="cf-radio-btns address-rb">
                                <div class="cfr-item">
                                    <input type="radio" name="pm" id="one">
                                    <label for="one">Use my regular address</label>
                                </div>
                                <div class="cfr-item">
                                    <input type="radio" name="pm" id="two">
                                    <label for="two">Use a different address</label>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row address-inputs">
                        <div class="col-md-6">
                            <input type="text" class="@error('name') is-invalid @enderror" name="name" id="" placeholder="First name" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="@error('lastname') is-invalid @enderror" name="lastname" id="" placeholder="Last name" value="{{ old('lastname') }}">
                            @error('lastname')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="@error('email') is-invalid @enderror" name="email" id="" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="@error('address1') is-invalid @enderror" name="address1" id="" placeholder="Address" value="{{ old('address1') }}">
                            @error('address1')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="@error('address2') is-invalid @enderror" name="address2" id="" placeholder="Address line 2" value="{{ old('address2') }}">
                            @error('address2')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="@error('city') is-invalid @enderror" name="city" id="" placeholder="City" value="{{ old('city') }}">
                            @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="@error('province') is-invalid @enderror" name="province" id="" placeholder="Province" value="{{ old('province') }}">
                            @error('province')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="@error('country') is-invalid @enderror" name="country" id="" placeholder="Country" value="{{ old('country') }}">
                            @error('country')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="@error('zipcode') is-invalid @enderror" name="zipcode" id="" placeholder="Zip code" value="{{ old('zipcode') }}">
                            @error('zipcode')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="@error('phone') is-invalid @enderror" name="phone" id="" placeholder="Phone no." value="{{ old('phone') }}">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="cf-title">Delievery Info</div>
                    <div class="row shipping-btns">
                        <div class="col-6">
                            <h4>Standard</h4>
                        </div>
                        <div class="col-6">
                            <div class="cf-radio-btns">
                                <div class="cfr-item">
                                    <input type="radio" name="shipping" id="ship-1">
                                    <label for="ship-1">Free</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <h4>Next day delievery</h4>
                        </div>
                        <div class="col-6">
                            <div class="cf-radio-btns">
                                <div class="cfr-item">
                                    <input type="radio" name="shipping" id="ship-2">
                                    <label for="ship-2">$3.45</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cf-title">Payment</div>
                    <ul class="payment-list">
                        <li>Paypal<a href="#"><img src="img/paypal.png" alt=""></a></li>
                        <li>Credit / Debit card<a href="#"><img src="img/mastercart.png" alt=""></a></li>
                        <li>Pay when you get the package</li>
                    </ul>
                    <button class="site-btn submit-order-btn">Place Order</button>
                </div>
                <div class="col-lg-4 order-1 order-lg-2">
                    <div class="checkout-cart">
                        @if (empty($cart) || count($cart)==0)
                        <h3 class="text-center" style="font-size: 20px">No item in your Cart</h3>
                        @else
                        <h3>Your Cart</h3>
                        <ul class="product-list">
                            @php
                                $total = 0;
                                @endphp
                            @foreach($cart as $item)
                            <li>
                                <div class="pl-thumb"><img src="{{url('storage/images/'.$item->product->image)}}" alt=""></div>
                                <h6>{{$item->product->name}}</h6>
                                <p>Rp.{{number_format($item->product->price)}}</p>
                                <small>Qty : {{$item->qty}}</small>
                            </li>
                            @php
                            $total += $item->product->price * $item->qty;
                            @endphp
                            @endforeach
                        </ul>
                        <ul class="price-list">
                            <li>Total<span style="width: 130px;">Rp. {{number_format($total)}}</span></li>
                            <li>Shipping<span style="width: 130px;">free</span></li>
                            <li class="total">Total<span style="width: 130px;">Rp. {{ number_format($total) }}</span></li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- checkout section end -->
@endsection