<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>
        {{ Str::ucfirst($type ?? 'Patient') }} Login
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

<body class="dark-version">
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto {{-- me-lg-5 --}}">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Sign In {{ Str::ucfirst($type ?? 'Patient') }}</h4>
                                    <p class="mb-0">Enter your email and password to sign In</p>
                                    @if (session('success'))
                                    <div class="alert alert-success mt-2 mb-0">
                                        <span>{{ session('success') }}</span>
                                    </div>
                                    @endif
                                    @if (session('error'))
                                    <div class="alert alert-danger mt-2 mb-0">
                                        <span>{{ session('error') }}</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <form
                                        action="{{ $type === 'patient' ? route('patient.login.submit') : route('admin.login.submit') }}"
                                        method="post" role="form">
                                        @csrf
                                        <div class="input-group input-group-outline mb-3">
                                            <input id="email" name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" name="email" value="{{ old('email') }}" required
                                                autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password" required
                                                autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">Sign
                                                In</button>
                                        </div>
                                </div>
                                </form>
                                @if($type === 'patient')
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Haven't signed up yet?
                                        <a href="{{ route('patient.register.form') }}"
                                            class="text-info text-gradient font-weight-bold">Sign Up</a>
                                    </p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
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
    <script src="../assets/js/material-dashboard.min.js?v=3.0.2"></script>
    <script type="module">
        // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-app.js";
    import { getDatabase } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-database.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
      apiKey: "AIzaSyAi9ybhYXcFG0wv_VUWPmfVU4lxLTN3fZw",
      authDomain: "familydentalcare-web.firebaseapp.com",
      databaseURL: "https://familydentalcare-web-default-rtdb.firebaseio.com",
      projectId: "familydentalcare-web",
      storageBucket: "familydentalcare-web.appspot.com",
      messagingSenderId: "157887231485",
      appId: "1:157887231485:web:4655f5ba5cb310b6765594",
      measurementId: "G-91R5JD9F9S"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    </script>
</body>

</html>
