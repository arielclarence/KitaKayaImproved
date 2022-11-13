<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PROYEK APLINS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="text/css" href="{{ asset('assets/img/favicon.png') }}">
  <link rel="apple-touch-icon" type="text/css" href="{{ asset('assets/img/apple-touch-icon.png') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate.css/animate.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/aos/aos.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">KITAKAYA@gmail.com</a>
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="index.html">KITAKAYA</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>


        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#services">Motto</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>

            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" name="login">Login</a></li>
            <li><a href="{{url("/register")}}">Register</a></li>
            <li></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('assets/img/bgkitakaya.png');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h3 class="animate__animated animate__fadeInDown">BELAJAR DARI YANG TERBAIK</h3>
                <h2 class="animate__animated animate__fadeInUp">UBAH KONDISI</h2>
                <h2 class="animate__animated animate__fadeInUp">FINANCIAL KAMU</h2>
                <h1 class="animate__animated animate__fadeInUp">SEKARANG</h1>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="{{asset('assets/img/about.jpg')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>About Us</h2>
              <p>KITAKAYA hadir untuk memberi banyak pengetahuan kepada semua orang akan pentingnya investasi mulai dari sekarang. Dan mengajarkan kepada semua orang tentang apa itu investasi sehingga orang tidak dapat tertipu oleh investasi bodong.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">TERPERCAYA</a></h4>
              <p class="description">Memiliki analis terbaik yang dapat memberikan saran mengenai investasi kepada anda</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">TUJUAN</a></h4>
              <p class="description">Merubah Financial anda menjadi lebih baik</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <br>
    <br>
    <h1 style="text-align: center;">DENGAR APA KATA MEMBER</h1>

    <!-- Tambahan Biar bagus -->
    <section class="bg-light" id="reviews">
      <div class="review">
          <div class="person">
              <img src="assets/img/pelanggan/p1.jpeg" alt="">
              <h5>Cecilia Suwadji</h5>
              <h5>15 Tahun</h5>
          </div>
          <h3>Porto gua dulu minus sampe 20%++ karna selalu ikut2an. Sejak ikut KITAKAYA
            ,gua mulai bisa analisa dan atur psikologis. Sekarang porto gua udah mulai pulih dan bisa
            bikin plan kapan harus beli/jual,ga fomo lagi.
          </h3>
      </div>
      <div class="review">
          <div class="person">
              <img src="assets/img/pelanggan/p2.jpg" alt="">
              <h5>Audrey Celia</h5>
              <h5>17 Tahun</h5>
          </div>
          <h3>Berkat belajar di KITAKAYA,saya sudah bisa membantu orang tua melunasi cicilan, beli hal2
            yang saya ingin seperti gadget dan makeup, dan mencapai 50 juta pertama saya di umur 17.
          </h3>
      </div>
  </section>
  <!-- Akhir Dari Tambahan -->

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-simple-smile" style="color: #20b38e;"></i>
              <span data-purecounter-start="0" data-purecounter-end="8000" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Member</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="bi bi-document-folder" style="color: #c042ff;"></i>
              <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1" class="purecounter"></span>
              <p>Level Of Success</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="bi bi-live-support" style="color: #46d1ff;"></i>
              <span data-purecounter-start="0" data-purecounter-end="3000" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="bi bi-users-alt-5" style="color: #ffb459;"></i>
              <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hard Workers</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Motto</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"><i class="bi bi-chat-left-dots"></i></div>
            <h4 class="title"><a href="">Komunikasi</a></h4>
            <p class="description">Memiliki team yang terbaik di bidangnya.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-bounding-box"></i></div>
            <h4 class="title"><a href="">Kebersamaan</a></h4>
            <p class="description">Memiliki member yang banyak membuat KITAKAYA seperti saudara.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-globe"></i></div>
            <h4 class="title"><a href="">Universal</a></h4>
            <p class="description">Dari suku,agama,dan belahan dunia manapun dapat belajar di sini.</p>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>ISTTS NI BOSS! Senggol Dong!</p>
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-1.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Ivander Berwyn Wijaya</h4>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Calvin Adhikang</h4>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-3.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Ariel Clarence</h4>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="{{asset('assets/img/team/team-4.jpeg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Axellino Adi</h4>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>General Questions</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-6 faq-item" data-aos="fade-up">
            <h4>Apakah Investasi adalah Judi?</h4>
            <p>
              Tidak, karena investasi memiliki bentuk sebuah perusahaan dan kita dapat menganalisa dengan laporan keuangan bukan hanya menebak asal.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
            <h4>Apakah Investasi Halal?</h4>
            <p>
              Menurut fatwa DSN-MUI No 80 tahun 2011, hukum Islam dari trading atau jual beli aset di pasar modal adalah boleh/mubah/halal selama tidak ada faktor-faktor yang membuatnya haram seperti, memperjualbelikan saham perusahaan yang menjual barang-barang yang dilarang agama.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
            <h4>Apa Saja Resiko Investasi?</h4>
            <p>
              Risiko dari kegiatan ini adalah risiko kerugian akibat penurunan harga aset terkait. Hal ini karena pasar modal dan pasar komoditas adalah dua jenis pasar dengan tingkat volatilitas harga tertinggi. Jadi bisa jadi Anda membeli per lembar saham seharga Rp.10.000 per lembar tapi harus menjualnya kembali ketika harga mencapai Rp. 9.000 per lembar.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
            <h4>Apa itu Investasi Bodong?</h4>
            <p>
              Investasi bodong adalah investasi yang tidak memiliki dasar hukum dan legalitas yang jelas di Indonesia. Pada investasi jenis ini, investor akan diminta untuk mengirimkan dana dengan alasan untuk membiayai proyek atau perusahaan tertentu padahal proyek dan perusahaan tersebut tidak ada.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="400">
            <h4>Siapakah Bursa Efek Indonesia (BEI)?</h4>
            <p>
              Bursa Efek Indonesia (BEI atau IDX) adalah pihak yang menyelenggarakan dan mengelola sistem pasar modal di Indonesia. Bursa Efek Indonesia merupakan gabungan dari Bursa Efek Jakarta dan Bursa Efek Surabaya. Adapun instrumen yang diperdagangkan di BEI ada bermacam-macam mulai dari saham, reksa dana hingga ETF dan obligasi.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="500">
            <h4>Apakah cepat kaya dengan cara Investasi?</h4>
            <p>
              TIDAK! Jangan Bodo.
            </p>
          </div>

        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>SOHO CAPITAL Podomoro City, 19th Floor, Jl. Letjen. S. Parman Kav. 28, Tanjung Duren Selatan, Grogol Petamburan, Jakarta Barat 11470</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>cs@KITAKAYA.id</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Contact Us Section -->

    <!-- Modal Login -->
    <!-- Perbaikan action form -->
    <form action="controllers/auth.php" method="POST">
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-12 bg-cover">
                                <img src="{{asset('assets/img/fotologin.jpg')}}" class="img-fluid" style="min-height:300px" alt="">
                                <div>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form class="p-lg-5 col-12 row g-3">
                                    <div>
                                      <br>
                                        <h1>Login</h1>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="userName" class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="ivanderkw2@gmail.com" id="userName" name="username">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="userName" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="userName" name="pass">
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script type="text/javascript" src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
