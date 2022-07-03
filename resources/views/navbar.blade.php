<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('landing') }}"><span class="text-primary">Family</span> Dental Care</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupport">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ ($nav === "home") ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('landing') }}">Home</a>
        </li>
        <li class="nav-item {{ ($nav === "about") ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
        @auth('patient')
            <li class="nav-item {{ ($nav === "dashboard") ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('patient.dashboard.registration.index') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{ route('patient.logout') }}">Logout</a>
            </li>
        @else
            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{ route('patient.login.form') }}">Login / Register</a>
            </li>
        @endauth
      </ul>
    </div> <!-- .navbar-collapse -->
  </div> <!-- .container -->
</nav>
