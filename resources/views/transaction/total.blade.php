@extends('adminlte::page')

@section('title', 'Transaction')

@section('content_header')
  <h1>Struk Belanja</h1>
@stop

@section('content')
<div class="row">

  <div class="col-md-4">

    <div class="card shadow" style="width: 20rem;">
      <div class="card-header">
        <h5 class="card-title text-bold text-uppercase mt-3">Total</h5>
        <p class="text-right mt-3">{{ date('d-m-Y') }}</p>
      </div>
      <div class="card-body border border-top-0 border-left-0 border-right-0">
        
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <b>Harga Barang </b>: {{ $price }} <br>
            <b>Jumlah Total </b>: {{ $userQty }}<br>
            <b>Total Harga </b>: Rp. {{ number_format($total) }}<br>
            <b>Uang Anda </b>: Rp. {{ number_format($userMoney) }}<br>
            <b>Kembalian </b>: Rp. {{ number_format($change) }}<br>
          </li>
          <li class="list-group-item">
            Terima kasih telah belanja! :)
          </li>
        </ul>
      </div>

    </div>

</div>
</div>
@stop