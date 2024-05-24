@extends('layouts.frontend')
@section('content')

<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <a href="/dirigasi" style="color: #000000;">
            <div class="info-box">
                <span class="info-box-icon"><i class="fas fa-draw-polygon" style="color: #e788ff;"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Daerah Irigasi</span>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-3 col-sm-6 col-12">
        <a href="/bendung" style="color: #000000;">
            <div class="info-box" style="bgcolor: #000000;">
                <span class="info-box-icon"><i class="fab fa-simplybuilt" style="color: #363636;"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Bendung</span>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-3 col-sm-6 col-12">
        <a href="/jaringan" style="color: #000000;">
            <div class="info-box">
                <span class="info-box-icon"><i class="fas fa-water" style="color: #00badb;"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jaringan</span>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-3 col-sm-6 col-12">
        <a href="/sawah" style="color: #000000;">
            <div class="info-box">
                <span class="info-box-icon"><i class="fab fa-pagelines" style="color: #87fd00;"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sawah</span>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="text-center mt-5">
    <hr>    
    <div class="col-sm-3 col-md-5 mx-auto">
        <h4 class="text-center bg-orange"><strong>Partisipasi Masyarakat</strong></h4>
    </div>
    <div class="col-9 col-sm-2 col-md-3 text-center mt-3">
        <button class="btn btn-warning btn-lg" data-toggle="modal" data-target=".modal_partisipasi_masyarakat"><i class="fas fa-bullhorn"></i>  Form Pengaduan</button>
    </div>
</div>

<div class="col-md-12">
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>{{ session('pesan') }}</h5>
    </div>
    @endif
</div>

<div class="multiple-items text-center">
    @foreach ($masyarakat as $data)
    @if ($data->tanggapan !== null)
    <div class="text-center">
        <div class="card text-center col-lg-10 mx-auto mt-4" role="button"> 
            <img src="{{ asset('storage/' . $data->foto) }}" class="rounded">
            <div class="card-body">
                <h5 class="card-text">Dari: <strong>{{ $data->nama }}</strong></h5>
                <button class="btn bg-lightblue detail-button" data-nama="{{ $data->nama }}" data-kritik="{{ $data->kritik }}" data-koordinat="{{ $data->koordinat }}" data-tanggapan="{{ $data->tanggapan }}" data-foto="{{ $data->foto }}">Detail</button>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>

{{-- modal partisipasi masyarakat --}}
@include('outer.masyarakat.index')

{{-- function detil(x){
        console.log(x)
        $('#nama').empty();
        $('#koordinat').empty();
        $('#kritik').empty();
        $('#tanggapan').empty();
        $('#foto').empty();
        // $('#tanggapan').empty();
        
    $('#nama').html(x.nama);
    $('#koordinat').html(x.koordinat);
    $('#kritik').html(x.kritik);
    $('#tanggapan').html(x.tanggapan);
    if(x.foto!=""){
        $('#foto').html('<img src="storage/'+x.foto+'" style="width:100%;">');
    }
    
    //$('#tanggapan').html(x.tanggapan);

$('.modal_detail_pengaduan').modal('show');

    }
     --}}
<script>
    $('.multiple-items').slick({
        dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
});

function detil(data) {
        document.getElementById("detail_nama").innerText = data.nama;
        document.getElementById("detail_kritik").innerText = data.kritik;
        document.getElementById("detail_koordinat").innerText = data.koordinat;
        document.getElementById("detail_tanggapan").innerText = data.tanggapan;
        document.getElementById("detail_foto").src = "{{ asset('storage/') }}" + "/" + data.foto;

        $('#modal_detail_pengaduan').modal('show');
    }

    $(document).ready(function() {
        $('.detail-button').click(function() {
            var nama = $(this).data('nama');
            var kritik = $(this).data('kritik');
            var koordinat = $(this).data('koordinat');
            var tanggapan = $(this).data('tanggapan');
            var foto = $(this).data('foto');

            detil({
                "nama": nama,
                "kritik": kritik,
                "koordinat": koordinat,
                "tanggapan": tanggapan,
                "foto": foto
            });
        });
    });

</script>

@endsection