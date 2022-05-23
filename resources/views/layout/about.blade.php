<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.head')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    @include('navbar')
  </header>

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">About Us</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 wow fadeInUp">
          <h1 class="text-center mb-3">Welcome to Your Family Dental Care</h1>
          <div class="text-lg">
            <p class="text-center mb-3">Family Dental Care adalah klinik gigi yang didirikan di Banjarbaru, Kalimantan Selatan oleh drg. Tetri Aprillia Sesanti. Dengan pengalaman hampir 20 tahun, Family Dental Care berkembang dengan konsep baru sebagai pelopor dalam kedokteran gigi kosmetik.</p>
            <p class="text-center mb-3">Dengan menggunakan pendekatan holistik, kami siap memberikan berbagai perawatan estetika gigi untuk meningkatkan kesehatan gigi Anda dan memperbarui senyum Anda. 
              Kami menggunakan teknologi kedokteran gigi terbaru yang memberi Anda perawatan terbaik dan perawatan tanpa rasa sakit dalam mencapai senyum terbaik yang bisa Anda dapatkan. Kami telah membangun fasilitas yang luas di klinik kami termasuk Kids Corner, Lounge, In-House Lab, dan banyak lainnya untuk membuat setiap kunjungan Anda menyenangkan dan nyaman.
            </p>
          </div>
        </div>
        <div class="col-lg-10 mt-5">
          <h1 class="text-center mb-5 wow fadeInUp">Our Dentist</h1>
          <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 wow zoomIn">
              <div class="card-doctor">
                <div class="header">
                  <img src="../assets/img/doctors/doctor_1.jpg" alt="">
                  <div class="meta">
                    <a href="#"><span class="mai-call"></span></a>
                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">drg. Keira Knightley</p>
                  <span class="text-sm text-grey">Orthodontist</span>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 wow zoomIn">
              <div class="card-doctor">
                <div class="header">
                  <img src="../assets/img/doctors/doctor_2.jpg" alt="">
                  <div class="meta">
                    <a href="#"><span class="mai-call"></span></a>
                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">drg. Jo Jaehyun</p>
                  <span class="text-sm text-grey">Dental</span>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 wow zoomIn">
              <div class="card-doctor">
                <div class="header">
                  <img src="../assets/img/doctors/doctor_3.jpg" alt="">
                  <div class="meta">
                    <a href="#"><span class="mai-call"></span></a>
                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">drg. Mia</p>
                  <span class="text-sm text-grey">Periodontist</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="page-footer">
    @include('layout.footer')
  </footer>

  <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  
  <script src="{{ asset('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
  
  <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>
  
  <script src="{{ asset('assets/js/theme.js') }}"></script>
  
</body>
</html>