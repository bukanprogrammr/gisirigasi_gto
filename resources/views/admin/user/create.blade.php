@extends('layouts.backend')

@section('content')

<!-- right column -->
<div class="col-md-12">
  <!-- general form elements disabled -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form {{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="/level/input" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama level</label>
              <input name="level" type="text" class="form-control" placeholder="Nama level ..." required>
              @error('level') <small class="text-danger">{{ $message }}</small>@enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
            <label>Warna</label>
            <div class="input-group my-colorpicker2">
                <input name="warna" type="text" class="form-control" required>
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-square"></i></span>
                </div>
              </div>
              @error('warna') <small class="text-danger">{{ $message }}</small>@enderror
              <!-- /.input group -->
             </div>      
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
            <label for="icon">icon</label>
            <input name="icon" type="file" id="icon" class="form-control" onchange="previewImage()" required>
            <img class="img-preview img-fluid mb-3 col-sm-5">
              @error('icon') <small class="text-danger">{{ $message }}</small>@enderror
              <!-- /.input group -->
             </div>      
            </div>


        <div class="row">
            <div class="col-sm-12">
              <!-- textarea -->

              <button type="submit" class="btn btn-primary float-right mr-4"><i class="fa fa-save"></i> Simpan</button>
              {{-- <button href="/level" class="btn btn-danger float-right">Batal</button> --}}

        </div>
        </form>
      </div>
    </div>
</div>
</div>

<!-- /.card -->

{{-- custom warna --}}
<script>
  //color picker with addon
  $('.my-colorpicker2').colorpicker();
  $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    // preview icon
    function previewImage(){
          const icon = document.querySelector('#icon');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.dispaly = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(icon.files[0]);
          
          oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
          }
        }
  </script>


@endsection

