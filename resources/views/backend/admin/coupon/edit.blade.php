@extends('layouts.admin')
@section('title','edit-coupon')
@push('css')

@endpush
@section('contents')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title text-primary">Update Coupon Info</h4>
                    <a href="{{url('admin/coupons')}}" class="btn btn-danger"><i
                            class="icon-arrow-left menu-icon pr-2"></i> Coupons</a>
                </div>
                <div class="basic-form">
                    <form method="post" action="{{url('admin/coupons/'.$coupon->id)}}">
                        @method('put')
                        @csrf
                        <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                            <input type="text" name="name" class="form-control input-flat" value="{{$coupon->name}}">

                            @if ($errors->has('name'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif

                        </div>
                        <div class="form-group {{$errors->has('discount')? 'has-error':''}}">
                            <input type="text" name="discount" value={{$coupon->discount}} class="form-control input-flat"
                                placeholder="Enter Your Coupon discount here ...">

                            @if ($errors->has('discount'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('discount') }}</strong>
                            </span>
                            @endif

                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" name="status" class="form-check-input" {{$coupon->status == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="exampleCheck1">Published</label>
                        </div>
                        <button class="btn btn-primary" type="submit"> Update Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')

@endpush
@endsection
