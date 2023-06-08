<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.svg') }}">
    <title>
        {{ $title }}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.0.2') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200 dark-version">
  @include('patient.sidebarPatient')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Jadwal Temu</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Jadwal Temu</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @if (session('success'))
            <div class="alert alert-success text-white mb-4">
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger text-white mb-4">
                <span>{{ session('error') }}</span>
            </div>
        @endif
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Jadwal Temu</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">Tgl</th>
                      <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">No. Urut</th>
                      <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">Tgl Kedatangan</th>
                      <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">Nama Dokter</th>
                      <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">Spesialis</th>
                      <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($registrations as $registration)
                        @if ($registration->patient_id == Auth::guard('patient')->user()->id)
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs text-white mb-0">{{ $registration->created_at }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs text-white mb-0">{{ $loop->iteration }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs text-white mb-0">{{ $registration->arrival_date }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs text-white mb-0">{{ $registration->doctor->name }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs text-white mb-0">{{ $registration->doctor->specialization }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    @if ($registration->status == 'pending')
                                        <p class="text-xs text-white mb-0">{{ Str::ucfirst($registration->status) }}</p>
                                    @elseif ($registration->status == 'accepted')
                                        <p class="text-xs text-success mb-0">{{ Str::ucfirst($registration->status) }}</p>
                                    @elseif ($registration->status == 'declined')
                                        <p class="text-xs text-danger mb-0">{{ Str::ucfirst($registration->status) }}</p>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td class="align-middle text-center text-sm" colspan="7">
                                <p class="text-xs text-white mb-0">Tidak ada data</p>
                            </td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-right pb-2 mb-3 float-right">
        <div class="btn-toolbar mb-0 btn text-right">
          <div class="btn-group me-2 float-right"><a href="{{ route('patient.dashboard.registration.create') }}" class="btn btn-info mb-3 btn text-right">Buat Jadwal Temu</a></div>
        </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-dashboard.min.js?v=3.0.2') }}"></script>
</body>

</html>
