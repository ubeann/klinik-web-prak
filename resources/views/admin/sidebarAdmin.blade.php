<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}" target="_blank">
        <img src="{{ asset('img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Family Dental Care</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white {{ ($nav === "dashboard") ? 'active bg-gradient-primary' : ''}}" href="{{ route('admin.dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ ($nav === "doctor") ? 'active bg-gradient-primary' : ''}}" href="{{ route('admin.doctor.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">account_box</i>
            </div>
            <span class="nav-link-text ms-1">Dokter</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ ($nav === "patient") ? 'active bg-gradient-primary' : ''}}" href="{{ route('admin.patient.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">people</i>
            </div>
            <span class="nav-link-text ms-1">Pasien</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ ($nav === "registration") ? 'active bg-gradient-primary' : ''}}" href="{{ route('admin.registration.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Pendaftaran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ ($nav === "inspection") ? 'active bg-gradient-primary' : ''}}" href="{{ route('admin.inspection.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_hospital</i>
            </div>
            <span class="nav-link-text ms-1">Pemeriksaan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ ($nav === "payment") ? 'active bg-gradient-primary' : ''}}" href="{{ route('admin.payment.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt</i>
            </div>
            <span class="nav-link-text ms-1">Pembayaran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('admin.logout') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Keluar</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
