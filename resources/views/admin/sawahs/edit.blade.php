@extends('layouts.formedit')

@section('form')

        <form action="/admin/sawahs/{{ $sawah->id }}" method="POST" enctype="multipart/form-data">
          @method('put')
          @csrf

          <div class="form-group">
            <label for="geojson">geojson</label>
            <input name="geojson" type="file" id="geojson" class="form-control" onchange="previewImage()" accept="geojson" value="{{ asset('storage/' .$sawah->geojson) }}">
            @error('geojson') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
          
@endsection

