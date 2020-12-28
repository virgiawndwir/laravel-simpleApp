@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
  <h1>Products</h1>
  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
  @endif
@stop

@section('content')
<div class="float-right">
  <a href="{{ route('products.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></a>
</div>
  <table id="example" class="table bg-white mt-5">
    <thead class="bg-light">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Jenis</th>
        <th scope="col">Harga</th>
        <th scope="col">Kondisi Barang</th>
        <th scope="col">Jumlah Barang</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    @php
        $i = 1;
    @endphp
    @foreach ($datas as $data)
    <tbody>
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->productCategory->name }}</td>
        <td>{{ $data->price }}</td>
        <td>{{ $data->quantity }}</td>
        <td>{{ $data->qty }}</td>
        <td>
          <div class="row">
            <div class="col-sm-2">
              <a class="btn btn-sm btn-link" href="{{ route('products.edit', $data->id) }}"><i class="fas fa-fw fa-edit"></i></a>
            </div>
            <div class="col-sm-2">
              <form action="{{ route('products.destroy', $data->id) }}" method="post" class="form-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-link btn-sm delete-from-table"><i class="fas fa-fw fa-trash"></i></button>
              </form>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
@stop

@section('js')
<script>
  $(document).ready(function() {
      $('#example').DataTable();
  } );

  $('body').on('click', '.delete-from-table', function(e) {
      e.preventDefault();
      Swal.fire({
      title: 'Are you sure?',
      text: "Anda tidak dapat mengembalikkan data!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.value) {
        $(this).parent().submit();
      }
    })
  });
</script>
@stop