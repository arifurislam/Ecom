@extends('layouts.admin')
@section('title','new-product')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('contents')

<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title">Insert Product Informations</h4>
                    <a href="{{url('admin/brands')}}" class="btn btn-danger"><i
                            class="icon-arrow-left menu-icon pr-2"></i> Products</a>
                </div>
                <div class="basic-form">
                    <form class="row" method="post" action="{{url('admin/products')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-4">
                            <div class="form-group {{$errors->has('cat_id')? 'has-error':''}}">
                                <label for="exampleInputEmail1"> Select Category<span class="text-danger">
                                        *</span></label>
                                <select class="form-control" name="cat_id" id="exampleFormControlSelect1">
                                    <option>Select Category</option>
                                    @foreach($categories as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('cat_id'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('cat_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group {{$errors->has('brand_id')? 'has-error':''}}">
                                <label for="exampleInputEmail1"> Select Brand<span class="text-danger"> *</span></label>
                                <select class="form-control" name="brand_id" id="exampleFormControlSelect2">
                                    <option>Select Brand</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('brand_id'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('brand_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group {{$errors->has('code')? 'has-error':''}}">
                                <label for="exampleInputEmail1">Product Code <span class="text-danger"> *</span></label>
                                <input type="text" name="code" value="{{old('code')}}" class="form-control input-default"
                                    placeholder="Product code here ...">

                                @if ($errors->has('code'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                                <label for="exampleInputEmail1">Product Name <span class="text-danger"> *</span></label>
                                <input type="text" name="name" value="{{old('name')}}"
                                    class="form-control input-default" placeholder="Product name here ...">

                                @if ($errors->has('name'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group {{$errors->has('price')? 'has-error':''}}">
                                <label for="exampleInputEmail1">Product Price <span class="text-danger">
                                        *</span></label>
                                <input type="text" name="price" value="{{old('price')}}" class="form-control input-default"
                                    placeholder="Enter Product Price">

                                    @if ($errors->has('price'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-4 {{$errors->has('qty')? 'has-error':''}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Quantity <span class="text-danger">
                                        *</span></label>
                                <input type="text" name="qty" value="{{old('qty')}}" class="form-control input-default"
                                    placeholder="Enter Product Quantity">

                                    @if ($errors->has('qty'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('qty') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-12 {{$errors->has('short_des')? 'has-error':''}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Short Description <span class="text-danger">
                                        *</span></label>
                                <textarea name="short_des" class="my_summerNote"></textarea>

                                @if ($errors->has('short_des'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('short_des') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group {{$errors->has('long_des')? 'has-error':''}}">
                                <label for="exampleInputEmail1">Long Description <span class="text-danger">
                                        *</span></label>
                                <textarea name="long_des" class="my_summerNote form-control"></textarea>
                                @if ($errors->has('long_des'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('long_des') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group {{$errors->has('media1')? 'has-error':''}}">
                                <label for="exampleInputEmail1">Feature Image <span class="text-danger">
                                        *</span></label>
                                <div class="custom-file">
                                    <input type="file" name="media1" class="custom-file-input" accept="image/*"
                                        onchange="loadFile(event)">
                                    <label class="custom-file-label">Choose file</label>

                                    @if ($errors->has('media1'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('media1') }}</strong>
                                    </span>
                                    @endif

                                    <img id="output" src="#" height="50px" style="margin-top:20px">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="form-group {{$errors->has('media2')? 'has-error':''}}">
                                <label for="exampleInputEmail1">Second Image <span class="text-danger">
                                        *</span></label>
                                <div class="custom-file">
                                    <input type="file" name="media2" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>

                                    @if ($errors->has('media2'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('media2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="form-group {{$errors->has('media3')? 'has-error':''}}">
                                <label for="exampleInputEmail1">Second Image <span class="text-danger">
                                        *</span></label>
                                <div class="custom-file">
                                    <input type="file" name="media3" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>

                                    @if ($errors->has('media3'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('media3') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-check mb-4">
                            <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1"
                                checked="true">
                            <label class="form-check-label" for="exampleCheck1">Want ot Published Your product
                                ???</label>
                        </div>
                        <div class="col-lg-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-lg btn-primary">Submit now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        $(".my_summerNote").summernote();
        $('.dropdown-toggle').dropdown();
    });

</script>
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

</script>

@endpush
@endsection
