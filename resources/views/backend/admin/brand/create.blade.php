@extends('layouts.admin')
@section('title','create-brand')
@push('css')

@endpush
@section('contents')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title">Create New Brand</h4>
                    <a href="{{url('admin/brands')}}" class="btn btn-danger"><i
                            class="icon-arrow-left menu-icon pr-2"></i> Brands</a>
                </div>
                <div class="basic-form">
                    <form method="post" action="{{url('admin/brands')}}">
                        @csrf
                        <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                            <input type="text" name="name" class="form-control input-flat"
                                placeholder="Enter Your Brand Name here ...">

                            @if ($errors->has('name'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                            
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" name="status" class="form-check-input" checked="true">
                            <label class="form-check-label" for="exampleCheck1">Published</label>
                        </div>
                        <button class="btn btn-primary" type="submit"> Submit Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')

@endpush
@endsection
