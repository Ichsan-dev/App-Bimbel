@php
    //jumbotron
    $jumbotron = get_jumbotron();

    //setting
    $site_name  = get_setting_value('_site-name');
    $location   = get_setting_value('_location');
    $sitedesc   = get_setting_value('_site_description');
    $sitemail   = get_setting_value('_email');

    //sosmed
    $tiktok     = get_setting_value('_tiktok');
    $instagram  = get_setting_value('_instagram');
    $facebook   = get_setting_value('_facebook');

    //section
    $kursus     = get_section();

    //review
    $review     = get_reviews();
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('Halaman-depan/css/styles.css')}}" />
      <link rel="stylesheet" href="{{asset('/../AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <title>RumahPinus</title>
  </head>
  <body>
    <!-- navigatin bar -->

    <header class="bg-header">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand text-white fw-bold" href="#" data-bs-toggle="tooltip" data-bs-title="RumahPinus" data-bs-placement="bottom">{{$site_name}}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item px-2">
                <a class="nav-link" aria-current="page" href="#how">Keuntungan</a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link" href="#review">Reviewer</a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link" href="#features">Pelayanan</a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link" href="#contact">Kontak</a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link cta" href="{{Route('login')}}">Masuk</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <section class="hero-section py-5">
        <div class="container py-3">
          <div class="row g-5">
            <div class="d-flex align-items-center justify-content-between">
              @foreach ($jumbotron as $item)
              <div class="col-12 col-lg-6">
                <h1 class="text-white fw-bold">{{$item->title}}</h1>
                <p class="text-white pt-4">
                  {{$item->description}}</p>
                <a href="{{ route('formulirpendaftaran') }}" class="btn mt-5 nav-link cta" style="color: white;">Daftar</a>
              </div>
              <div class="col-12 col-lg-6">
                <div class="d-flex justify-content-end">
                  <img src="{{ asset('storage/jumbotron/'.$item->image)}}" class="hero-img" alt="" />
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    </header>
    <main>
      <section class="featured py-5" id="features">
        <div class="container">
          <h2 class="text-dark fw-bold text-center pt-5 pb-5">Kursus</h2>
        </div>
        
        <div class="container">
          <div class="row g-5">
            @php
                $i = 1;
            @endphp
            @foreach ($kursus as $item)
            <!-- Partner Item {{ $i}}-->
            <div class="col-12 col-lg-3">
              <div class="card shadow-sm border-0 rounded">
                <img src="{{ asset('storage/photo-user/'.$item->thumbnail)}}" class="card-img-top" alt="" />
                <div class="card-body">
                  <h3 class="card-title">{{$item->title}}</h3>
                  <p class="card-text">{!! $item->content !!}</p>
                </div>
              </div>
            </div>
            <!-- last partner {{ $i}}-->
            @php
              $i++;
            @endphp
            @endforeach
          </div>
        </div>
      </section>

      <section class="how-it-works" id="how">
        <div class="container">
          <h2 class="text-dark fw-bold text-center pt-5 pb-3">Mengapa memilih bimbel Rumah Pinus?</h2>

          <div class="container py-5">
            <div class="row g-5">
              <div class="col-12 col-lg-6">
                <div class="p-4 d-flex shadow-sm section-how-card flex-column justify-content-center rounded">
                  <span><i class="fas fa-star" style="font-size: 20px; margin-bottom: 15px; color: yellow;"></i></span>
                  <h3 class="fw-bold text-dark how-it-works-title">Kualitas pengajaran</h3>
                  <p class="how-it-works-text">Bimbel Rumah Pinus menawarkan pengajaran berkualitas tinggi yang disampaikan oleh instruktur terlatih dan berpengalaman.</p>
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="d-flex p-4 shadow-sm section-how-card flex-column justify-content-center rounded">
                  <span><i class="fas fa-seedling" style="font-size: 20px; margin-bottom: 15px; color: rgb(50, 185, 9)"></i></span>
                  <h3 class="fw-bold text-dark how-it-works-title">Lingkungan yang kondusif</h3>
                  <p class="how-it-works-text">
                    Suasana belajar yang nyaman dan santai di Bimbel Rumah Pinus membantu meningkatkan motivasi dan minat belajar siswa.
                  </p>
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="d-flex p-4 shadow-sm section-how-card flex-column justify-content-center rounded">
                  <span><i class="fas fa-signature" style="font-size: 20px; margin-bottom: 15px; color: rgb(224, 91, 28)"></i></span>
                  <h3 class="fw-bold text-dark how-it-works-title">Fokus personalisasi</h3>
                  <p class="how-it-works-text"> Program pembelajaran disesuaikan dengan kebutuhan individual setiap siswa, memastikan pemahaman yang mendalam dan perkembangan yang optimal.</p>
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="d-flex p-4 shadow-sm section-how-card flex-column justify-content-center rounded">
                  <span><i class="fas fa-rocket" style="font-size: 20px; margin-bottom: 15px; color: rgb(253, 11, 11)"></i></span>
                  <h3 class="fw-bold text-dark how-it-works-title">Metode pembelajaran inovatif</h3>
                  <p class="how-it-works-text">Bimbel Rumah Pinus menggunakan metode pembelajaran inovatif dan beragam, membuat proses belajar menjadi lebih menarik dan efektif.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="testimonials" id="review">
          <div class="container">
              <div id="carouselExample" class="carousel slide">
                  <div class="carousel-inner">
                      @php
                      $r = 1;
                      @endphp
                      @foreach ($review as $reviews) 
                      <div class="carousel-item @if($r == 1) active @endif">
                          <div class="container py-5">
                              <div class="row">
                                  <div class="col-12">
                                      <div class="d-flex flex-column align-items-center justify-content-center text-center">
                                          <div class="testimonial-card">
                                              <img src="{{ asset('storage/review/'.$reviews->gambar)}}" width="150px" class="rounded-circle pb-4" alt="" />
                                              <p class="testimonial-text pb-2">
                                                  {{$reviews->komentar}}
                                              </p>
                                              <h3 class="testimonials-name">{{$reviews->nama}}</h3>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @php
                      $r++;
                      @endphp
                      @endforeach
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                  </button>
              </div>
          </div>
      </section>

    </main>

    <footer>
      <div class="container py-5" id="contact">
        <div class="row" style="text-align:center;">
          <div class="col-12 col-lg-4">
            <h3 class="fw-bold pb-3">Lokasi</h3>
            <p>
              {{$location}}
            </p>
          </div>
          <div class="col-12 col-lg-4">
            <h3 class="fw-bold pb-3">Kontak Kami</h3>
            <p>
              @if($facebook)
              <a href="{{$facebook}}"><i class="fab fa-facebook-square" style="font-size: 34px; margin-right: 20px;"></i></a>
              @endif
              @if($tiktok)
              <a href="{{$tiktok}}"><i class="fab fa-tiktok" style="font-size: 34px; color:black; margin-right: 20px;"></i></a>
              @endif
              @if($instagram)
              <a href="{{$instagram}}"><i class="fab fa-instagram" style="color: #da0e0e; font-size: 34px; margin-right: 20px;"></i></a>
              @endif
            </p>
            <a href="bimbelrumahpinus@gmail.com"><i class="fas fa-envelope" style="color: #000000; font-size: 18px; margin-right: 10px;"></i>{{$sitemail}}</a>
          </div>
          <div class="col-12 col-lg-4">
            <h3 class="fw-bold pb-3"> Tentang Rumah Pinus</h3>
            <div class="d-flex flex-row">
              <p>{{$sitedesc}}</p>
            </div>
          </div>
        </div>
      </div>
      <p class="text-center copyright">&copy; 2023 all right reserved by RumahPinus</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="{{asset('Halaman-depan/js/myscript.js')}}"></script>
  </body>
</html>
