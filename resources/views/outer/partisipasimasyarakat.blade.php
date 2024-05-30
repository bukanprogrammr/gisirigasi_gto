
@extends('layouts.frontend')

@section('partisipasimasyarakat')
<section id="team" class="ud-team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-section-title mx-auto text-center">
            <h2>Partisipasi Masyarakat</h2>
            <p>
              There are many variations of passages of Lorem Ipsum available
              but the majority have suffered alteration in some form.
            </p>
          </div>
        </div>
      </div>

      <div class="row">
      <div class="multiple-items">
        @foreach ($masyarakat as $data)
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <div class="ud-single-team wow fadeInUp" data-wow-delay=".2s">
            <div class="ud-team-image-wrapper">
              <div class="ud-team-image">
                <img src="{{ asset('storage/foto-masalah/' . $data->foto) }}" alt="team" />
              </div>

              <img
                src="{{ asset('play-bootstrap-main') }}/assets/images/team/dotted-shape.svg"
                alt="shape"
                class="shape shape-1"
              />
              <img
                src="{{ asset('play-bootstrap-main') }}/assets/images/team/shape-2.svg"
                alt="shape"
                class="shape shape-2"
              />
            </div>
            <div class="ud-team-info">
              <h5>{{ $data->nama }}</h5>
              <button class="ud-main-btn ud-border-btn detail-button" data-nama="{{ $data->nama }}" data-kritik="{{ $data->kritik }}" data-koordinat="{{ $data->koordinat }}" data-tanggapan="{{ $data->tanggapan }}" data-foto="{{ $data->foto }}">Detail</button>
            </div>
          </div>
        </div>                               
        @endforeach
      </div>
      @include('outer.index')
    </div>
    </div>
  </section>
  @endsection