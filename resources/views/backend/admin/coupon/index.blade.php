@extends('layouts.admin')
@section('title','coupons')
@push('css')

@endpush
@section('contents')

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h4>All Coupon</h4>
                    <a href="{{url('admin/coupons/create')}}" class="btn btn-primary"><i
                            class="icon-plus menu-icon pr-2"></i> New Coupon</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th># ID</th>
                                <th>Name</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Created Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coupons as $key => $data)
                            <tr>
                                <th>{{$key + 1}}</th>
                                <td>{{$data->name}} </td>
                                <td>{{$data->discount}} %</td>
                                <td>
                                    @if($data->status == 1)
                                    <span class="badge badge-primary px-2">Publish</span>
                                    @else
                                    <span class="badge badge-warning px-2">UnPublish</span>
                                    @endif
                                </td>
                                <td>{{$data->created_at->format('g:i  A  ||  D - M - Y')}}</td>
                                <td class="action-icon">
                                    <a href="{{url('admin/coupons/' . $data->id . '/edit')}}"><i
                                            class="icon-pencil menu-icon pr-2"></i></a>
                                    <button type="submit" class="dlt-button" onclick="deleteCoupon({{$data->id}})">
                                        <i class="icon-trash menu-icon pr-2"></i>
                                    </button>
                                    <form id="delete-form-{{$data->id}}"
                                        action="{{url('admin/coupons/' .$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $coupons->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    function deleteCoupon(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }

</script>
@endpush
@endsection
