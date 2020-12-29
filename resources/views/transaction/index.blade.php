@extends('adminlte::page')

@section('title', 'Transaction')

@section('content_header')
    <h1>Transaksi</h1>
@stop

@section('content')
<div class="card" style="width: 18rem;">
  <div class="card-body border border-top-0 border-left-0 border-right-0">
    <h5 class="card-title">Pilih Barang</h5>
  </div>

  @foreach ($products as $product)
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <a href="{{ route('cart', $product->id) }}" class="card-link">{{ $product->name }}</a>
    </li>
  </ul>
  @endforeach
</div>
@stop