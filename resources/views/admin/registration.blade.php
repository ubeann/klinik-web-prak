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
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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

<body class="g-sidenav-show dark-version bg-gray-200">
    @include('admin.component.sidebarAdmin', ['nav' => 'registration'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('admin.component.navbarAdmin', ['title' => 'Jadwal Temu'])
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
                                <h6 class="text-white text-capitalize ps-3">Jadwal Temu</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                Tgl</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                No. Urut</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                Nama Pasien</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                Tgl Kedatangan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                Nama Dokter</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                Status</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($registrations as $registration)
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">{{ $registration->created_at }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">{{ $registration->patient->name
                                                    }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">{{ $registration->arrival_date }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">{{ $registration->doctor->name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($registration->status == 'pending')
                                                <p class="text-xs text-white badge bg-warning mb-0">{{
                                                    Str::ucfirst($registration->status) }}</p>
                                                @elseif ($registration->status == 'accepted')
                                                <p class="text-xs text-white badge bg-success mb-0">{{
                                                    Str::ucfirst($registration->status) }}</p>
                                                @elseif ($registration->status == 'declined')
                                                <p class="text-xs text-white badge bg-danger mb-0">{{
                                                    Str::ucfirst($registration->status) }}</p>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($registration->is_has_inspection)
                                                <p class="text-xs text-secondary mb-0">Sudah diperiksa</p>
                                                @else
                                                <form
                                                    action="{{ route('admin.registration.update', $registration->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button name="status" type="submit" class="badge bg-info md-18"
                                                        value="pending">
                                                        <div class="text-white text-center d-flex align-items-center justify-content-center"
                                                            name="datang">
                                                            <span class="material-icons md-18">hourglass_full</span>
                                                        </div>
                                                    </button>
                                                    <button name="status" type="submit" class="badge bg-success md-18"
                                                        value="accepted">
                                                        <div class="text-white text-center d-flex align-items-center justify-content-center"
                                                            name="selesai">
                                                            <span class="material-icons md-18">check</span>
                                                        </div>
                                                    </button>
                                                    <button name="status" type="submit" class="badge bg-danger md-18"
                                                        value="declined">
                                                        <div class="text-white text-center d-flex align-items-center justify-content-center"
                                                            name="batal">
                                                            <span class="material-icons md-18">close</span>
                                                        </div>
                                                    </button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="align-middle text-center text-sm" colspan="7">
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
