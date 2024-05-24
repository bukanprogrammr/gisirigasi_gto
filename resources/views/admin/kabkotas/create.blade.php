@extends('layouts.formcreate')

@section('form')

          <form action="/admin/kabkotas" method="POST" enctype="multipart/form-data">
            @csrf

                <div class="form-group">
                  <label>Kab./Kota</label>
                  <input id="nama_kabkota" name="nama_kabkota" type="text" class="form-control" placeholder="Nama Kab./Kota ..." required>
                  @error('nama_kabkota') <small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="form-group">
                  <label>Warna</label>
                  <div class="input-group my-colorpicker2">
                    <input name="warna" type="text" class="form-control" required>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                  @error('warna') <small class="text-danger">{{ $message }}</small>@enderror
                </div>   
                   

            <div class="form-group">
              <label for="geojson" class="form-label">Geojson</label>
              <input class="form-control @error('geojson') is-invalid @enderror" type="file" id="geojson" name="geojson">
              @error('geojson')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>          
          
<script>
  //color picker with addon
  $('.my-colorpicker2').colorpicker();
  $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
  </script>

@endsection

