<div class="row">
  <div class="col-md-6 mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama barang" value="{{ @$data->name ? $data->name : old('name')}}">
    @error('name')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  <div class="col-md-6 mb-3">
    <label for="qty" class="form-label">Jumlah</label>
    <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="Jumlah barang" id="qty" value="{{ @$data->qty ? $data->qty : old('qty') }}">
    @error('qty')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label for="price" class="form-label">Harga</label>
    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Harga barang" id="price" value="{{ @$data->price ? $data->price : old('price') }}">
    @error('price')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  <div class="col-md-6 mb-3">
    <label for="quantity" class="form-label">Kondisi</label>
    <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Kondisi barang" id="quantity" value="{{ @$data->quantity ? $data->quantity : old('quantity') }}">
    @error('quantity')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label for="type" class="form-label">Jenis</label><br>
    <select class="select2 form-control" name="product_category_id">
      <option value="" disabled selected>-- Pilih Jenis Barang --</option>
      @foreach ($prods as $data)
        <option value="{{ $data->id }}">{{ $data->name }}</option>
      @endforeach
    </select>
    @error('product_category_id')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  <div class="col-md-6 mb-3">
    <label for="image" class="form-label">Gambar</label>
    <input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/*" name="image" id="image">
    @error('image')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
</div>