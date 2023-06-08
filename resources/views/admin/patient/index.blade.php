<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.svg') }}">
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
  @include('admin.component.sidebarAdmin', ['nav' => 'patient'])

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('admin.component.navbarAdmin', ['title' => 'Pasien'])
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @if (session('success'))
            <div class="alert alert-success text-white mb-2">
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger text-white mb-2">
                <span>{{ session('error') }}</span>
            </div>
        @endif
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Pasien</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nama Pasien</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Tgl Lahir</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Alamat</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">No telp</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($patients as $patient)
                    <tr>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs text-secondary mb-0">{{ $patient->name }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs text-secondary mb-0">{{ $patient->email }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs text-secondary mb-0">{{ $patient->birth_date }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs text-secondary mb-0">{{ $patient->address_card }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs text-secondary mb-0">{{ $patient->number_phone }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="{{ route('admin.patient.edit', $patient->id) }}" class="badge bg-warning md-18">
                            <div class="text-white text-center d-flex align-items-center justify-content-center">
                                <span class="material-icons md-18">edit</span>
                            </div>
                            </a>
                            <a href="{{ route('admin.patient.delete', $patient->id) }}" class="badge bg-danger" onclick="return confirm('Are you sure?')">
                            <div class="text-white text-center d-flex align-items-center justify-content-center">
                                <span class="material-icons md-18">delete</span>
                            </div>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center text-sm" colspan="8">
                            <p class="text-xs text-secondary mb-0">Tidak ada data</p>
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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-right pb-2 mb-3 float-right">
      <div class="btn-toolbar mb-0 btn text-right">
        <div class="btn-group me-2 float-right"><a href="{{ route('admin.patient.create') }}" class="btn btn-info mb-3 btn text-right">Add Pasien</a></div>
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
