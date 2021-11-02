@extends('layout/template')
@section('title')
Cart
@endsection
@section('content')
<!-- cart section end -->
<section class="cart-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table">
                    @if (empty($cart) || count($cart)==0)
                    <h3 class="text-center" style="font-size: 25px">Your Cart is empty</h3>
                    @else
                    <h3>Your Cart</h3>
                    <div class="cart-table-warp">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-th">Product</th>
                                    <th class="quy-th">Quantity</th>
                                    <th class="total-th">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($cart as $item)
                                <tr>
                                    <td class="product-col">
                                        <img src="{{url('storage/images/'.$item->product->image)}}" alt="">
                                        <div class="pc-title">
                                            <h4>{{$item->product->name}}</h4>
                                            <p>Rp. {{number_format($item->product->price)}}</p>
                                        </div>
                                    </td>
                                    <td class="quy-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$item->qty}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-col">
                                        <h4>Rp. {{number_format($item->subtotal)}}</h4>
                                    </td>
                                    <td class="delete">
                                        <a href="{{url('/cart/delete/'.$item->id)}}" class="btn btn-delete">
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @php
                                $total += $item->product->price * $item->qty;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="total-cost">        
                        <h6>Total <span>Rp. {{number_format($total)}}</span></h6>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 card-right">
                <form class="promo-code-form">
                    <input type="text" placeholder="Enter promo code">
                    <button>Submit</button>
                </form>
                <a href="{{url('/checkout')}}" class="site-btn">Proceed to checkout</a>
                <a href="{{url('/product')}}" class="site-btn sb-dark">Continue shopping</a>
            </div>
        </div>
    </div>
</section>
<!-- cart section end -->
@endsection