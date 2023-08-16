@extends('layouts.admin')
@section('title','edit-category')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('contents')


<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <form action="">
                <textarea name="" id="mySummerNote" cols="30" rows="10"></textarea>
            </form>
        </div>
    </div>
</div>



@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        $("#mySummerNote").summernote();
        $('.dropdown-toggle').dropdown();
    });

</script>
@endpush
@endsection
