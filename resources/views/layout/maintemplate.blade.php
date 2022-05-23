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

  <div class="page-hero bg-image overlay-dark" style="background-image: url({{ asset('assets/img/bg_image_2.jpg') }});">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Dental clinic in Banjarbaru, South Kalimantan</span>
        <h1 class="display-4">Family Dental Care</h1>
        
        <a href="#section1" class="btn btn-primary">Make an Appointment</a>
      </div>
    </div>
  </div>

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Jadwal Praktek <br></h1>
            <ul>
              <br>
              <li>
                <h6>Pagi</h6>
                <span>Senin - Sabtu : 09.00 - 13.00 WITA</span>
              </li>
              <li>
                <h6>Sore</h6>
                <span>Senin - Sabtu : 16.30 - 21.00 WITA</span>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="../assets/img/bg-doctor.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Dentist</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="{{ asset('assets/img/doctors/doctor_1.jpg') }}" alt="">
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
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="{{ asset('assets/img/doctors/doctor_2.jpg') }}" alt="">
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
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="{{ asset('assets/img/doctors/doctor_3.jpg') }}" alt="">
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

  <!-- .page-section -->
  <section id="section1">
  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
      <form class="main-form">
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Nama">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control" placeholder="No. Pasien (bagi pasien lama)">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="departement" id="departement" class="custom-select">
              <option value="general">Orthodontist</option>
              <option value="cardiology">Periodontist</option>
              <option value="dental">Dental</option>
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->
</section>
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