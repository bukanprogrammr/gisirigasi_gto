@extends('layouts.inner')

@section('content')

<div class="row">
<div class="col-lg-2 col-6">
    <div class="small-box bg-purple">
        <div class="inner">
            <h3>{{ $kabkota->count() }}</h3>
            <p>Kab./Kota</p>
        </div>
        <div class="icon">
            <i class="fas fa-map"></i>
        </div>
        <a href="/admin/kabkotas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">
    <div class="small-box bg-lightblue">
        <div class="inner">
            <h3>{{ $dirigasi->count() }}</h3>
            <p>Daerah Irigasi</p>
        </div>
        <div class="icon">
            <i class="fas fa-draw-polygon"></i>
        </div>
        <a href="/admin/dirigasis" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">
    <div class="small-box bg-navy">
        <div class="inner">
            <h3>{{ $bendung->count() }}</h3>
            <p>Bendung</p>
        </div>
        <div class="icon">
            <i class="fab fa-simplybuilt"></i>
        </div>
        <a href="/admin/bendungs" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">
    <div class="small-box bg-olive">
        <div class="inner">
            <h3>{{ $jaringan->count() }}</h3>
            <p>Jaringan Irigasi</p>
        </div>
        <div class="icon">
            <i class="fas fa-water"></i>
        </div>
        <a href="/admin/jaringans" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">
    <div class="small-box bg-teal">
        <div class="inner">
            <h3>{{ $sawah->count() }}</h3>
            <p>Sawah</p>
        </div>
        <div class="icon">
            <i class="fab fa-pagelines"></i>
        </div>
        <a href="/admin/sawahs" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">
    <div class="small-box bg-orange">
        <div class="inner">
            <h3>{{ $masyarakat->count() }}</h3>
            <p>Partisipasi Masyarakat</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="/admin/masyarakats" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
</div>
    

    @include('layouts.map')
@endsection
