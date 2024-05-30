<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Play | Free Startup and SaaS Landing Page Template by UIdeck</title>

    <!-- Primary Meta Tags -->
<meta name="title" content="Play - Free Open Source HTML Bootstrap Template by UIdeck">
<meta name="description" content="Play - Free Open Source HTML Bootstrap Template by UIdeck Team">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://uideck.com/play/">
<meta property="og:title" content="Play - Free Open Source HTML Bootstrap Template by UIdeck">
<meta property="og:description" content="Play - Free Open Source HTML Bootstrap Template by UIdeck Team">
<meta property="og:image" content="https://uideck.com/wp-content/uploads/2021/09/play-meta-bs.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://uideck.com/play/">
<meta property="twitter:title" content="Play - Free Open Source HTML Bootstrap Template by UIdeck">
<meta property="twitter:description" content="Play - Free Open Source HTML Bootstrap Template by UIdeck Team">
<meta property="twitter:image" content="https://uideck.com/wp-content/uploads/2021/09/play-meta-bs.jpg">

    <!--====== Favicon Icon ======-->
    <link
      rel="shortcut icon"
      href="{{ asset('play-bootstrap-main') }}/assets/images/favicon.svg"
      type="image/svg"
    />

    <!-- ===== All CSS files ===== -->
    @include('layouts.packouter')
  </head>
  <body>
    <!-- ====== Header Start ====== -->
    <header class="ud-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            @include('layouts.navbar')
          </div>
        </div>
      </div>
    </header>
    <!-- ====== Header End ====== -->

    @yield('content')

    <!-- ====== Footer Start ====== -->
    @include('layouts.footer')
    <!-- ====== Footer End ====== -->

    <!-- ====== Back To Top Start ====== -->
    <a href="javascript:void(0)" class="back-to-top">
      <i class="lni lni-chevron-up"> </i>
    </a>
    <!-- ====== Back To Top End ====== -->

    <!-- ====== All Javascript Files ====== -->

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
          const refElement = document.querySelector(val);
          const scrollTopMinus = scrollPos + 73;
          if (
            refElement.offsetTop <= scrollTopMinus &&
            refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
          ) {
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
  </body>
</html>
