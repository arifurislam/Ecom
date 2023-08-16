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
                    <h2>Check Out Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="{{url('/checkout/store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input {{$errors->has('first_name')? 'has-error':''}}">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="first_name" placeholder="Enter Your First Name ...">

                                    @if ($errors->has('first_name'))
                                    <span class="invalid-feedback mb-0 mt-2" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input {{$errors->has('last_name')? 'has-error':''}}">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="last_name" placeholder="Enter Your Last Name ...">
                                    @if ($errors->has('last_name'))
                                    <span class="invalid-feedback mb-0 mt-2" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input {{$errors->has('contact')? 'has-error':''}}">
                                    <p>Contact Number<span>*</span></p>
                                    <input type="text" name="contact" placeholder="+008">
                                    @if ($errors->has('contact'))
                                    <span class="invalid-feedback mb-0 mt-2" role="alert">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input {{$errors->has('email')? 'has-error':''}}">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email" placeholder="Enter Your Email Address...">
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback mb-0 mt-2" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input {{$errors->has('state')? 'has-error':''}}">
                            <p>State<span>*</span></p>
                            <input type="text" name="state" placeholder="Enter Your State ...">
                            @if ($errors->has('state'))
                            <span class="invalid-feedback mb-0 mt-2" role="alert">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="checkout__input {{$errors->has('address')? 'has-error':''}}">
                            <p>Address<span>*</span></p>
                            <input type="text" name="address" placeholder="Enter Your State ...">
                            @if ($errors->has('address'))
                            <span class="invalid-feedback mb-0 mt-2" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="checkout__input {{$errors->has('zipcode')? 'has-error':''}}">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="zipcode" placeholder="Enter Your Zipcode ...">
                            @if ($errors->has('zipcode'))
                            <span class="invalid-feedback mb-0 mt-2" role="alert">
                                <strong>{{ $errors->first('zipcode') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @foreach($carts as $cart)
                                <li>{{$cart->product->name}} ({{$cart->qty}})<span>৳ {{$cart->product->price}}</span>
                                </li>
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>৳ {{$subTotal}}</span></div>
                            <div class="checkout__order__total">Total
                                <span>
                                    @if(Session::has('coupon'))

                                    <div>{{$subTotal - Session::get('coupon')['discount_amount']}}</div>

                                    <input type="hidden" name="coupon_discount"
                                        value="{{Session::get('coupon')['discount']}}">
                                    <input type="hidden" name="subtotal" value="{{$subTotal}}">
                                    <input type="hidden" name="total"
                                        value="{{$subTotal - Session::get('coupon')['discount_amount']}}">
                                    @else
                                    <div>{{$subTotal}}</div>
                                    <input type="hidden" name="subtotal" value="{{$subTotal}}">
                                    <input type="hidden" name="total" value="{{$subTotal}}">
                                    @endif
                                </span>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Hand Cash
                                    <input type="checkbox" id="payment" name="payment" value="cash">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->


@push('js')

@endpush
@endsection
