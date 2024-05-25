@extends('layouts.formedit')

@section('form')


        <form action="/admin/jaringans/{{ $jaringan->id }}" method="POST" enctype="multipart/form-data">
          @method('put')
          @csrf

          <div class="form-group">
            <label for="geojson">Geojson</label>
            <input name="geojson" type="file" id="geojson" class="form-control" onchange="previewImage()" accept="geojson" value="{{ asset('storage/' .$jaringan->geojson) }}">
            @error('geojson') <small class="text-danger">{{ $message }}</small>@enderror
          </div>

          <div class="form-group">
            <label for="foto">Foto</label>
            <input name="foto" type="file" id="foto" class="form-control" onchange="previewImage()" accept="image/jpeg,image/png" value="{{ asset('storage/' .$jaringan->foto) }}">
            <img src="{{ asset('storage/foto-jaringan/' .$jaringan->foto) }}" class="img-preview img-fluid mb-3 col-sm-4">
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

