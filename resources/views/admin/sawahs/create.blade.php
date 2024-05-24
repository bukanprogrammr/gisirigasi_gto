@extends('layouts.formcreate')

@section('form')

      <form action="/admin/sawahs" method="POST" enctype="multipart/form-data">
        @csrf
        
            <div class="form-group">
              <label>Kab./Kota</label>
              <select id="kabkota_id" name="kabkota_id" class="form-control" required>
                <option value="">-- Pilih Kab.Kota --</option>
                @foreach ($kabkota as $data)
                <option value="{{ $data->id }}" {{ old('id') == $data->id ? 'selected' : null }}>{{ $data->nama_kabkota }}</option>
                @endforeach
              </select>
              @error('kabkota_id') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

          <div class="mb-3">
            <label for="geojson" class="form-label">Geojson</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('geojson') is-invalid @enderror" type="file" accept="geojson" id="geojson" name="geojson">
            @error('geojson')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

@endsection

