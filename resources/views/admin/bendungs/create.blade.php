@extends('layouts.formcreate')

@section('form')

          <form action="/admin/bendungs" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>Daerah Irigasi</label>
              <select id="dirigasi_id" name="dirigasi_id" class="form-control">
                <option value="">-- Pilih Daerah Irigasi --</option>
                @foreach ($dirigasi as $data)
                <option value="{{ $data->id }}" {{ old('dirigasi_id') == $data->id ? 'selected' : null }}>{{ $data->nama_dirigasi }}</option>
                @endforeach
              </select>
              @error('dirigasi_id') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="form-group">
              <label>Nama Bendung</label>
              <input id="nama_bendung" name="nama_bendung" type="text" class="form-control" placeholder="Nama Bendung ..." required>
              @error('nama_bendung') <small class="text-danger">{{ $message }}</small>@enderror
            </div>
            
            <div class="form-group">
              <label>Koordinat</label>
              <input id="koordinat" name="koordinat" type="text" class="form-control" placeholder="Longitude, Latitude ..." required>
              @error('koordinat') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="form-group">
              <label>Deskripsi</label>
              <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" placeholder="Enter ..." required></textarea>
              @error('deskripsi') <small class="text-danger">{{ $message }}</small>@enderror
              </div>

            <div class="form-group">
              <label for="foto">Foto</label>
              <input name="foto" type="file" id="foto" class="form-control" onchange="previewImage()" accept="image/jpeg,image/png" value="{{ old('foto') }}">
              <img class="img-preview img-fluid mb-3 col-sm-5">
              @error('foto') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

<script>

    function previewImage(){
          const foto = document.querySelector('#foto');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.dispaly = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(foto.files[0]);
          
          oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
          }
        }
  </script>

@endsection

