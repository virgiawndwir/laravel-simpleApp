@extends('adminlte::page')

@section('title', 'Transaction')

@section('content_header')
    <h1>Transaksi</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-4">

    <div class="card shadow" style="width: 20rem;">
      <div class="card-body border border-top-0 border-left-0 border-right-0">
        <h5 class="card-title text-bold text-uppercase">Barang Pilihan Anda</h5>
      </div>
      
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <b>Nama Barang</b> : {{ $product->name }}
        </li>
        <li class="list-group-item">
          <b>Harga</b> : Rp. {{ number_format($product->price) }}
        </li>
        <li class="list-group-item">
          <b>Kondisi</b> : {{ $product->quantity }}
        </li>
        <li class="list-group-item">
          <b>Stok</b> : {{ $product->qty }}
        </li>
      </ul>
    </div>

  </div>

  <div class="col-md-4">

    <div class="card shadow" style="width: 20rem;">
      <div class="card-body border border-top-0 border-left-0 border-right-0">
        <h5 class="card-title text-bold text-uppercase">Keranjang</h5>
      </div>

      <ul class="list-group list-group-flush">
        
        <form action="{{ route('count-price', $product->id) }}" method="POST">
          @method('PUT')
          @csrf
          <li class="list-group-item">
            <span for="">Uang Anda</span>
            <input type="number" class="form-control mt-1 mb-2" name="userMoney" placeholder="Masukkan jumlah uang Anda" required value="{{ old('userMoney') }}">
  
            <span for="">Jumlah Barang</span>
            <input type="number" class="form-control mt-1" name="userQty" placeholder="Masukkan jumlah barang" required value="{{ old('userQty') }}">
            
            <button type="submit" class="btn btn-block btn-sm btn-success mt-2 text-uppercase">Bayar</button>
          </li>
        </form>
      </ul>
    </div>

</div>
</div>
@stop