@extends('layouts.formcreate')

@section('form')

          <form action="/admin/dirigasis" method="POST">
            @csrf

            <div class="form-group">
              <label>Daerah Irigasi</label>
              <input id="nama_dirigasi" name="nama_dirigasi" type="text" class="form-control" placeholder="Nama Daerah Irigasi ..." required>
              @error('nama_dirigasi') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="form-group">
              <label>Luas</label>
              <input id="luas" name="luas" type="text" class="form-control" placeholder="Luas Wilayah ..." required>
              @error('luas') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="form-group">
              <label>Wilayah Cakupan</label>
              <select id="kabkota_id" name="kabkota_id[]" class="select2" multiple="multiple" data-placeholder="Pilih Wilayah Cakupan Daerah Irigasi.." style="width: 100%;">
                @foreach ($kabkota as $data)
                <option value="{{ $data->id }}" {{ old('id') == $data->id ? 'selected' : null }}>{{ $data->nama_kabkota }}</option>
                @endforeach
              </select>
            </div>

<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })})

  </script>

@endsection

