<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="/"><span class="text-primary">Family</span> Dental Care</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupport">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ ($title === "Home") ? 'active' : ''}}">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item {{ ($title === "About") ? 'active' : ''}}">
          <a class="nav-link" href="/about">About Us</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="/admin">Dashboard</a>
        </li>
        <li class="nav-item">
          <form action ="/logout" method="post">
            @csrf
            <button class="btn btn-primary ml-lg-3" type="submit">
              Logout
          </form>
        </li>
        @else
        <li class="nav-item">
          <a class="btn btn-primary ml-lg-3" href="/login">Login / Register</a>
        </li>
        @endauth
      </ul>
    </div> <!-- .navbar-collapse -->
  </div> <!-- .container -->
</nav>