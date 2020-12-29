@extends('adminlte::page')

@section('title', 'Create Product')

@section('content_header')
  <h1>Create Product</h1>
  @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
  @endif
@stop

@section('content')
  <div class="card col-md-6">
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
      @method('POST')
      @csrf
        <div class="card-body">
          @include('product.field')
        </div>
      
      <div class="text-right mb-3 mr-2">
        <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
      </div>
    </form>
  </div>
@stop

@section('js')
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
@stop