@extends('layouts.backend')

@section('content')

<div class="col-md-12">
  <div class="card p-3 mb-3">
    <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-user"></i> {{ $masyarakat->nama }}
          <small class="float-right">{{ $masyarakat->created_at }}</small>
        </h4>
      </div>
    </div>
    
    <div class="row">
      <div class="col-sm-5">
        NIK : {{ $masyarakat->nik }}
      </div>
    </div>
    
    <div class="row card-body">
      <div class="col-md-6 offset-md-3">
        <p class="lead">Kritik/Saran:</p>
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px; margin-right: 10px;"> {{ $masyarakat->kritik }} </p>
      </div>
      <div class="col-md-6 offset-md-3 text-center">
        <a href="{{ asset('storage/' . $masyarakat->foto) }}">
          <img src="{{ asset('storage/' . $masyarakat->foto) }}" class="rounded img-fluid" >
        </a>
      </div>
    </div>

    <div class="row text-center" style="margin-top: 80px;">
      <div class="col-8 offset-md-2">
        <form action="/admin/masyarakats/{{ $masyarakat->id }}" method="post">
          @method('delete')
          @csrf
          <button class="btn btn-md btn-danger" onclick="return confirm('Yakin ingin menghapus kritik/saran {{ $masyarakat->nama }}?')"><i class="fas fa-trash"></i></button>
        </form>
        <form class="form-horizontal" style="margin-top: 20px;" action="/admin/masyarakats/{{ $masyarakat->id }}" method="POST" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="input-group input-group-md mb-0">
            <input class="form-control form-control-md" name="tanggapan" placeholder="Tanggapan...." value="{{ old('koordinat', $masyarakat->tanggapan) }}">
            <div class="input-group-append">
              <button type="submit" class="btn btn-success">Tanggapi</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  //pilih warna
  //color picker with addon
  $('.my-colorpicker2').colorpicker();
  $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

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

