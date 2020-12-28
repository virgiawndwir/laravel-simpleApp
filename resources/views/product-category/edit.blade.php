@extends('adminlte::page')

@section('title', 'Edit Product Categories')

@section('content_header')
  <h1>Edit Product Categories</h1>
  @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
  @endif
@stop

@section('content')
  <div class="card col-md-6">
    <form action="{{ route('product-categories.update', $id) }}" method="post">
      @method('PUT')
      @csrf
        <div class="card-body">
          @include('product-category.field')
        </div>
      
      <div class="text-right mb-3 mr-2">
        <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
      </div>
    </form>
  </div>
@stop