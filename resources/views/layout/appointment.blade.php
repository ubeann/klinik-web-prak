<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
      <form class="main-form" method="POST" action="{{ url('/#appointment') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input name="fullname" type="text" class="form-control" placeholder="Nama Lengkap">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input name= "no_pasien" type="text" class="form-control" placeholder="No. Pasien (bagi pasien lama)">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <label for="">Pilih Dokter</label>
            <select id="nama_dokter" class="custom-select">
              <option value="dokter1">Drg. Jo Jaehyun</option>
              <option value="dokter2">Drg. Periodontist</option>
              <option value="dokter3">Drg. Dental</option>
            </select>
          </div>{{-- 
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <label for="">Tanggal Kedatangan</label>
            <select name="departement" id="departement" class="custom-select">
              <option value="general">Orthodontist</option>
              <option value="cardiology">Periodontist</option>
              <option value="dental">Dental</option>
            </select>
          </div> --}}
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label>Tanggal Kedatangan</label>
            <input name="tgl_book" type="date" class="form-control">
          </div>
          {{-- <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div> --}}
          <div class="col-12 col-sm-6 py-2" >
            <a href="/">
              <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
            </a>
          </div>
        </div>
      </form>
    </div>
  </div> <!-- .page-section -->