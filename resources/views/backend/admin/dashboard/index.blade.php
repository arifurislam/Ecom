@extends('layouts.admin')
@section('title','admin-dashboard')
@push('css')

@endpush
@section('contents')


<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Products Sold</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">4565</h2>
                    <p class="text-white mb-0">Jan - March 2019</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Net Profit</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">$ 8541</h2>
                    <p class="text-white mb-0">Jan - March 2019</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">New Customers</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">4565</h2>
                    <p class="text-white mb-0">Jan - March 2019</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-4">
            <div class="card-body">
                <h3 class="card-title text-white">Customer Satisfaction</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">99%</h2>
                    <p class="text-white mb-0">Jan - March 2019</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{asset('admin')}}/images/users/8.jpg" class="rounded-circle" alt="">
                    <h5 class="mt-3 mb-1">Ana Liem</h5>
                    <p class="m-0">Senior Manager</p>
                    <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{asset('admin')}}/images/users/5.jpg" class="rounded-circle" alt="">
                    <h5 class="mt-3 mb-1">John Abraham</h5>
                    <p class="m-0">Store Manager</p>
                    <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{asset('admin')}}/images/users/7.jpg" class="rounded-circle" alt="">
                    <h5 class="mt-3 mb-1">John Doe</h5>
                    <p class="m-0">Sales Man</p>
                    <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{asset('admin')}}/images/users/1.jpg" class="rounded-circle" alt="">
                    <h5 class="mt-3 mb-1">Mehedi Titas</h5>
                    <p class="m-0">Online Marketer</p>
                    <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                </div>
            </div>
        </div>
    </div>

</div>



<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="social-graph-wrapper widget-facebook">
                <span class="s-icon"><i class="fa fa-facebook"></i></span>
            </div>
            <div class="row">
                <div class="col-6 border-right">
                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                        <h4 class="m-1">89k</h4>
                        <p class="m-0">Friends</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                        <h4 class="m-1">119k</h4>
                        <p class="m-0">Followers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="social-graph-wrapper widget-linkedin">
                <span class="s-icon"><i class="fa fa-linkedin"></i></span>
            </div>
            <div class="row">
                <div class="col-6 border-right">
                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                        <h4 class="m-1">89k</h4>
                        <p class="m-0">Friends</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                        <h4 class="m-1">119k</h4>
                        <p class="m-0">Followers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="social-graph-wrapper widget-googleplus">
                <span class="s-icon"><i class="fa fa-google-plus"></i></span>
            </div>
            <div class="row">
                <div class="col-6 border-right">
                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                        <h4 class="m-1">89k</h4>
                        <p class="m-0">Friends</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                        <h4 class="m-1">119k</h4>
                        <p class="m-0">Followers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="social-graph-wrapper widget-twitter">
                <span class="s-icon"><i class="fa fa-twitter"></i></span>
            </div>
            <div class="row">
                <div class="col-6 border-right">
                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                        <h4 class="m-1">89k</h4>
                        <p class="m-0">Friends</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                        <h4 class="m-1">119k</h4>
                        <p class="m-0">Followers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')

@endpush
@endsection
