@extends('layouts.website')
@section('title','wish-list')
@push('css')

@endpush
@section('contents')

<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Your Wish List</span>
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
                    <h2>Your Wish List</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>Wish List</span>
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
                                <th>Add to cart</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wishlists as $wishlist)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img height="100px" src="{{asset('storage/product/'.$wishlist->product->media1)}}"
                                        alt="">
                                    <h5>{{$wishlist->product->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ৳ {{$wishlist->product->price}}
                                </td>
                                <td class="shoping__cart__price">
                                    @php
                                    $Is_added_ToCart =
                                    App\Models\Admin\Cart::where('product_id',$wishlist->product_id)->first();
                                    @endphp
                                    @if($Is_added_ToCart)
                                    <button type="submit" class="btn btn-warning" disabled>Disabled</button>
                                    @else
                                    <form action="{{url('/add/to-cart/'.$wishlist->product->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="price" value="{{$wishlist->product->price}}">
                                        <button type="submit" class="btn btn-info">Add Now<i
                                                class="fa fa-shopping-bag"></i></button>
                                    </form>
                                    @endif
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{url('/wishlist/delete/'.$wishlist->id)}}"><span
                                            class="icon_close"></span></a>
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
            {{-- <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        @if(Session::has('coupon'))
                        <li>Subtotal <span>৳ {{$subTotal}}</span></li>
            <li>Discount <span>{{Session::get('coupon')['discount']}} %
                    ( {{$discount = $subTotal * Session::get('coupon')['discount'] / 100}} )
                </span></li>
            <li>Total <span>৳ {{$subTotal - $discount}}</span></li>
            @else
            <li>Subtotal <span>৳ {{$subTotal}}</span></li>
            @endif
            </ul>
        </div>
    </div> --}}
    </div>
    </div>
</section>

@push('js')

@endpush
@endsection
