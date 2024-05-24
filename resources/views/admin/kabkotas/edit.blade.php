@extends('layouts.formedit')

@section('form')

          <form action="/admin/kabkotas/{{ $kabkota->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="form-group">
              <label>Kab./Kota</label>
              <input id="nama_kabkota" name="nama_kabkota" type="text" class="form-control" placeholder="Nama Kab./Kota ..." required value="{{ old('nama_kabkota', $kabkota->nama_kabkota) }}">
              @error('nama_kabkota') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="form-group">
              <label>Warna</label>
              <div class="input-group my-colorpicker2">
                <input id="warna" name="warna" type="text" class="form-control" required value="{{ old('warna', $kabkota->warna) }}">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-square"></i></span>
                </div>
              </div>
              @error('warna') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="form-group">
              <label for="geojson">Geojson</label>
              <input name="geojson" type="file" id="geojson" class="form-control" onchange="previewImage()" accept="geojson" value="{{ asset('storage/' .$kabkota->geojson) }}">
              @error('geojson') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

<script>
  //color picker with addon
  $('.my-colorpicker2').colorpicker();
  $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
  </script>

@endsection

