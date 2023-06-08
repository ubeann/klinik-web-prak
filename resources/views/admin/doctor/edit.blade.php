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

<body class="g-sidenav-show bg-gray-200 dark-version">
  @include('admin.component.sidebarAdmin', ['nav' => 'doctor'])

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('admin.component.navbarAdmin', ['title' => 'Dokter'])
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Edit Dokter {{ $doctor->name }}</h6>
              </div>
            </div>
            <div class="card-body px-2 pb-2">
              <div class="table-responsive p-0">
                <div class="col-lg-8 table align-items-center mb-0">
                  <form method="POST" action="{{ route('admin.doctor.update', $doctor->id) }}" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Nama Lengkap</label>
                        <div class="ms-md-auto">
                          <div class="input-group input-group-outline mb-3">
                              <input class="form-control text-white @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name') ?? $doctor->name }}" required autocomplete="name">
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>
                        </div>
                      </div>
                        <div class="mb-3">
                            <label for="birth_date">Tanggal Lahir</label>
                            <div class="ms-md-auto">
                              <div class="input-group input-group-outline">
                                    <input class="form-control text-white @error('birth_date') is-invalid @enderror" id="birth_date" type="date" name="birth_date" value="{{ old('birth_date') ?? strftime('%Y-%m-%d', strtotime($doctor->birth_date)) }}" required autocomplete="birth_date">
                                    @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              </div>
                            </div>
                            </div>
                            <div class="mb-3">
                              <label for="number_SIP">No SIP</label>
                              <div class="ms-md-auto">
                                  <div class="input-group input-group-outline">
                                      <input class="form-control text-white @error('number_SIP') is-invalid @enderror" id="number_SIP" type="number" name="number_SIP" value="{{ old('number_SIP') ?? $doctor->number_SIP }}" autocomplete="number_SIP">
                                      @error('number_SIP')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="specialization">Spesialisasi</label>
                              <div class="ms-md-auto">
                                  <div class="input-group input-group-outline mb-3">
                                      <input class="form-control text-white @error('specialization') is-invalid @enderror" id="specialization" type="text" name="specialization" value="{{ old('specialization') ?? $doctor->specialization }}" autocomplete="specialization">
                                        @error('specialization')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                  </div>
                              </div>
                            </div>
                            <div class="mb-3">
                            <label for="address">Alamat</label>
                            <div class="ms-md-auto">
                              <div class="input-group input-group-outline">
                                  <textarea class="form-control text-white @error('address') is-invalid @enderror" id="address" name="address" autocomplete="address" rows="3">{{ old('address') ?? $doctor->address }}</textarea>
                                  @error('address')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                            </div>
                        <div class="mb-3">
                            <label for="number_phone">Nomor Telepon</label>
                            <div class="ms-md-auto">
                              <div class="input-group input-group-outline">
                                  <input class="form-control text-white @error('number_phone') is-invalid @enderror" id="number_phone" type="text" name="number_phone" value="{{ old('number_phone') ?? $doctor->number_phone }}" autocomplete="number_phone">
                                  @error('number_phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                        </div>
                        <div class="mb-3">
                          <label for="image" class="form-label">Tambahkan Foto</label></br>
                          <img class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset($doctor->image) }}">
                          <div class="input-group input-group-outline">
                              <input class="form-control text-white @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" onchange="previewImage()">
                              @error('image')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                          <div class="mb-3 px-3">
                              <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                  </form>
                  </div>
              </div>
            </div>
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

    function previewImage(){
      const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
    }

  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-dashboard.min.js?v=3.0.2') }}"></script>
</body>

</html>
