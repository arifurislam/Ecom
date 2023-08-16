@extends('layouts.website')
@section('title','cart')
@push('css')

@endpush
@section('contents')

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Category</span>
                    </div>
                    @php
                    $categories = App\Models\Admin\Category::where('status', 1)->latest()->get();
                    @endphp
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="#">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('website')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/cart')}}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img height="100px" src="{{asset('storage/product/'.$cart->product->media1)}}"
                                        alt="">
                                    <h5>{{$cart->product->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ৳ {{$cart->product->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <form action="{{url('card/update/'.$cart->id)}}" method="post">
                                            @csrf
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="{{$cart->qty}}" min="1">
                                            </div>
                                            <button type="submit" class="btn btn-primary">update</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    ৳ {{$cart->qty * $cart->price}}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{url('cart/destroy/'.$cart->id)}}"><span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{url('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    @if(Session::has('coupon'))
                    @else
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="{{url('cart/coupon')}}" method="post">
                            @csrf
                            <input type="text" name="coupon" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        @if(Session::has('coupon'))
                        <li>Subtotal <span>৳ {{$subTotal}}</span></li>
                        <li>Coupon Name 
                            <span class="pl-3"><a href="{{url('cart/coupon/destroy')}}"class="btn btn-sm btn-danger">remove</a></span>
                            <span>{{Session::get('coupon')['name']}}</span> 
                        </li>
                        <li>Discount <span class="pl-3"> ({{Session::get('coupon')['discount']}}%) </span>
                            <span>{{Session::get('coupon')['discount_amount']}}</span>
                        </li>
                        <li>Total <span>৳ {{$subTotal - Session::get('coupon')['discount_amount']}}</span></li>
                        @else
                        <li>Subtotal <span>৳ {{$subTotal}}</span></li>
                        @endif

                        {{-- <li>Subtotal <span>৳ {{$subTotal}}</span></li> --}}
                        {{-- <li>Total <span>$454.98</span></li> --}}
                    </ul>
                    <a href="{{url('/checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@push('js')

@endpush
@endsection
