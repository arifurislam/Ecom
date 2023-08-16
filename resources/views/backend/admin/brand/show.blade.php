@extends('layouts.admin')
@section('title','category-details')
@push('css')

@endpush
@section('contents')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title">Category Details</h4>
                    <a href="{{url('admin/categories')}}" class="btn btn-danger"><i
                        class="icon-arrow-left menu-icon pr-2"></i> Categories</a>
                </div>
                <table class="table table-striped table-bordered view_table_custom">
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{$data->name}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>{{$data->status}}</td>
                    </tr>
                    <tr>
                        <td>Time & Date</td>
                        <td>:</td>
                        <td>{{$data->created_at->format('g:i  A  ||  D - M - Y')}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@push('js')

@endpush
@endsection
