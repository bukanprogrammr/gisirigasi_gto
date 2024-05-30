@extends('layouts.frontend')
@section('content')

{{-- hero --}}
<section class="ud-hero" id="home">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
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
              <a href="https://github.com/uideck/play-bootstrap" rel="nofollow noopener" target="_blank" class="ud-main-btn ud-link-btn">
                Selengkapnya <i class="lni lni-arrow-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div
          class="ud-hero-brands-wrapper wow fadeInUp"
          data-wow-delay=".3s"
        >
          <img src="{{ asset('play-bootstrap-main') }}/assets/images/hero/brand.svg" alt="brand" />
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
<section id="features" class="ud-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-section-title">
            <span>Fitur</span>
            <h2>Main Features of Play</h2>
           
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
                Lorem Ipsum is simply dummy text of the printing and industry.
              </p>
              <a href="/dirigasi" class="ud-feature-link">
                Learn More
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
                Lorem Ipsum is simply dummy text of the printing and industry.
              </p>
              <a href="javascript:void(0)" class="ud-feature-link">
                Learn More
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
                Lorem Ipsum is simply dummy text of the printing and industry.
              </p>
              <a href="javascript:void(0)" class="ud-feature-link">
                Learn More
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
                Lorem Ipsum is simply dummy text of the printing and industry.
              </p>
              <a href="javascript:void(0)" class="ud-feature-link">
                Learn More
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
  @include('layouts.footer')
  <script>
         // ==== for menu scroll
         const pageLink = document.querySelectorAll(".ud-menu-scroll");

pageLink.forEach((elem) => {
  elem.addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector(elem.getAttribute("href")).scrollIntoView({
      behavior: "smooth",
      offsetTop: 1 - 60,
    });
  });
});

// section menu active
function onScroll(event) {
  const sections = document.querySelectorAll(".ud-menu-scroll");
  const scrollPos =
    window.pageYOffset ||
    document.documentElement.scrollTop ||
    document.body.scrollTop;

  for (let i = 0; i < sections.length; i++) {
    const currLink = sections[i];
    const val = currLink.getAttribute("href");
     {
      document
        .querySelector(".ud-menu-scroll")
        .classList.remove("active");
      currLink.classList.add("active");
    } else {
      currLink.classList.remove("active");
    }
  }
}

window.document.addEventListener("scroll", onScroll);

  </script>

@endsection
