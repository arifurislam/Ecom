@extends('layouts.admin')
@section('title','orders')
@push('css')
<link href="{{asset('admin')}}/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('contents')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Invoice</th>
                                    <th>Type</th>
                                    <th>SubTotal</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $data)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$data->invoice_no}}</td>
                                    <td>
                                        @if($data->payment_type == 'cash')
                                            <span class="badge badge-primary">cash</span>
                                        @else 
                                            <span class="badge badge-info">No</span>
                                        @endif
                                    </td>
                                    <td>{{$data->total}}</td>
                                    <td>{{$data->sub_total}}</td>
                                    <td>
                                        @if($data->coupon_discount == null)
                                            <span class="badge badge-warning">No</span>
                                        @else 
                                            <span class="badge badge-info">{{$data->coupon_discount}} %</span>
                                        @endif
                                    </td>
                                    <td>{{$data->created_at->format('d - M - y')}}</td>
                                    <td>
                                        <a href="{{url('admin/orders/show/'.$data->id)}}"><i
                                            class="icon-eye menu-icon pr-2"></i></a>
                                    </td>
                                </tr> 
                                @endforeach                         
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Invoice</th>
                                    <th>Type</th>
                                    <th>SubTotal</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="{{asset('admin')}}/plugins/tables/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin')}}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('admin')}}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
@endpush
@endsection
