@extends('layouts.admin')
@section('title','orders-details')
@push('css')

@endpush
@section('contents')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Shipping Informations</h4>
                    <div class="basic-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First Name :</label>
                                    <input type="text" value="{{$shipping->first_name}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Last Name :</label>
                                    <input type="text" value="{{$shipping->last_name}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Shipping Email :</label>
                                    <input type="text" value="{{$shipping->email}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Shipping Address :</label>
                                    <input type="text" value="{{$shipping->phone}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>State :</label>
                                    <input type="text" value="{{$shipping->state}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Zipcode :</label>
                                    <input type="text" value="{{$shipping->zipcode}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Order Informations</h4>
                    <div class="basic-form">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>User Name :</label>
                                    <input type="text" value="{{Auth::user()->name}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Invoice Number :</label>
                                    <input type="text" value="{{$order->invoice_no}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Payment Type :</label>
                                    <input type="text" value="{{$order->payment_type}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Subtotal :</label>
                                    <input type="text" value="{{$order->sub_total}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Total :</label>
                                    <input type="text" value="{{$order->total}}" class="form-control input-default" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Discount :</label>
                                    <input type="text" value="@if($order->coupon_discount == null)
                                        {{"N/A"}}
                                     @else 
                                        {{$order->coupon_discount}} %
                                     @endif" class="form-control input-default" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product Informations</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped verticle-middle">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails as $orderDetail)
                                <tr>
                                    <td>{{$orderDetail->product->name}}</td>
                                    <td>{{$orderDetail->product_qty}}</td>
                                    <td>
                                        <img style="height: 60px;" src="{{asset('storage/product/'.$orderDetail->product->media1)}}" alt="">
                                    </td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('js')

@endpush
@endsection
