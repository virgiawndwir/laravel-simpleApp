<div class="row">
  <div class="col-md-6 mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama barang" value="{{ @$data->name ? $data->name : old('name')}}">
    @error('name')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
</div>