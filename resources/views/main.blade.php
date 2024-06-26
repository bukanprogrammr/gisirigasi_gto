@extends('layouts.outer')
@section('content')

{{-- hero --}}
<section class="ud-hero" id="home">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
          @if (session('pesan'))
    <div class="alert alert-success alert-dismissible" id="success-alert">
        <h5><i class="icon fas fa-check"></i>{{ session('pesan') }}</h5>
    </div>
    @endif
          <h1 class="ud-hero-title">
            Sistem Informasi Geografis Daerah Irigasi Provinsi Gorontalo
          </h1>
          <p class="ud-hero-desc">
            Visualisasi Data Daerah Irigasi Melalui Pemetaan Sederhana.
          </p>
          <ul class="ud-hero-buttons">
            <li>
              <a href="/map" rel="nofollow noopener" target="_blank" class="ud-main-btn ud-white-btn">
                Map
              </a>
            </li>
            <li>
              <a href="#fitur" rel="nofollow noopener" class="ud-main-btn ud-link-btn">
                Selengkapnya <i class="lni lni-arrow-right"></i>
              </a>
            </li>
          </ul>
        </div>
        
        <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
          <img src="{{ asset('play-bootstrap-main') }}/assets/images/hero/background.png" alt="hero-image" class="rounded"/>
          <img
            src="{{ asset('play-bootstrap-main') }}/assets/images/hero/dotted-shape.svg"
            alt="shape"
            class="shape shape-1"
          />
          <img
            src="{{ asset('play-bootstrap-main') }}/assets/images/hero/dotted-shape.svg"
            alt="shape"
            class="shape shape-2"
          />
        </div>
      </div>
    </div>
  </div>
</section>

{{-- fitur --}}
<section id="fitur" class="ud-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-section-title">
            <h2>Menu</h2>
           
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <div class="ud-single-feature wow fadeInUp" data-wow-delay=".1s">
              <a href="/dirigasi">
            <div class="ud-feature-icon">
                <i class="fas fa-draw-polygon"></i>
            </div>
        </a>
            <div class="ud-feature-content">
              <h3 class="ud-feature-title">Daerah Irigasi</h3>
              <p class="ud-feature-desc">
                Cek Data Pemetaan Daerah Irigasi Provinsi Gorontalo
              </p>
              <a href="/dirigasi" class="ud-feature-link">
                Selengkapnya <i class="lni lni-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <div class="ud-single-feature wow fadeInUp" data-wow-delay=".15s">
              <a href="/bendung">
            <div class="ud-feature-icon">
                <i class="fab fa-simplybuilt"></i>
            </div>
        </a>
            <div class="ud-feature-content">
              <h3 class="ud-feature-title">Bendung</h3>
              <p class="ud-feature-desc">
                Cek Data Pemetaan Bendung Provinsi Gorontalo
              </p>
              <a href="javascript:void(0)" class="ud-feature-link">
                Selengkapnya <i class="lni lni-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <div class="ud-single-feature wow fadeInUp" data-wow-delay=".2s">
              <a href="/jaringan">
            <div class="ud-feature-icon">
                <i class="fas fa-water"></i>
            </div>
        </a>
            <div class="ud-feature-content">
              <h3 class="ud-feature-title">Jaringan Irigasi</h3>
              <p class="ud-feature-desc">
                Cek Data Pemetaan Jaringan Irigasi Provinsi Gorontalo
              </p>
              <a href="javascript:void(0)" class="ud-feature-link">
                Selengkapnya <i class="lni lni-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-feature wow fadeInUp" data-wow-delay=".25s">
                <a href="/sawah">
              <div class="ud-feature-icon">
                <i class="fab fa-pagelines"></i>
            </div>
        </a>
            <div class="ud-feature-content">
              <h3 class="ud-feature-title">Sawah</h3>
              <p class="ud-feature-desc">
                Cek Data Pemetaan Sawah Provinsi Gorontalo
              </p>
              <a href="javascript:void(0)" class="ud-feature-link">
                Selengkapnya <i class="lni lni-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- partisipasimasyarakat --}}
  <section id="team" class="ud-team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-section-title mx-auto text-center">
              <h2>Partisipasi Masyarakat</h2>
              <button class="btn btn-warning btn-lg" data-toggle="modal" data-target=".modal_partisipasi_masyarakat"><i class="fas fa-bullhorn"></i>  Form Pengaduan</button>
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
              <button class="ud-main-btn ud-border-btn detail-button"
               data-nama="{{ $data->nama }}" 
               data-kritik="{{ $data->kritik }}" 
               data-koordinat="{{ $data->koordinat }}" 
               data-tanggapan="{{ $data->tanggapan }}" 
               data-foto="{{ $data->foto }}">Detail</button>
            </div>
          </div>
        </div>                               
        @endforeach
      </div>
      
      @include('outer.modalmasyarakat')
    </div>
    </div>
  </section>
  @include('layouts.footer')
  <script>

         $(document).ready(function() {
        // Hide the alert after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            $("#success-alert").fadeOut('slow', function() {
                $(this).remove(); 
            });
        }, 3000);
    });

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
      document.getElementById("detail_foto").src = "{{ asset('storage/foto-masalah/') }}" + "/" + data.foto;
    
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
