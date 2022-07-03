<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
      <form class="main-form" method="POST" action="{{ route('patient.dashboard.registration.store') }}">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <label for="name">Nama Lengkap</label>
            @auth('patient')
                <input type="text" name="name" id="name" class="form-control" value="{{ Auth::guard('patient')->user()->name }}" readonly>
            @else
                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" placeholder="Nama Lengkap" required autofocus>
            @endauth
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <label for="patient_id">Nomor Pasien</label>
            @auth('patient')
                <input type="text" name="patient_id" id="patient_id" class="form-control" value="{{ Auth::guard('patient')->user()->id }}" readonly>
            @else
                <input class="form-control @error('patient_id') is-invalid @enderror" id="patient_id" name="patient_id" type="text" value="{{ old('patient_id') }}" autocomplete="patient_id" placeholder="Nomor Pasien">
            @endauth
            @error('patient_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <label for="doctor_id">Pilih Dokter</label>
            <select name="doctor_id" id="doctor_id" class="form-control">
                @forelse ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }} - {{ $doctor->specialization }}</option>
                @empty
                    <option selected disabled>No data found</option>
                @endforelse
            </select>
            @error('doctor_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for='arrival_date'>Tanggal Kedatangan</label>
            <input class="form-control @error('arrival_date') is-invalid @enderror" id="arrival_date" name="arrival_date" type="date" value="{{ old('arrival_date') ?? date('Y-m-d') }}" autocomplete="arrival_date" placeholder="Tanggal Kedatangan" required>
            @error('arrival_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2">
            @auth('patient')
                <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
            @else
                <a href="{{ route('patient.register.form') }}" class="btn btn-primary mt-3 wow zoomIn">Create Patient Account</a>
            @endauth
          </div>
        </div>
      </form>
    </div>
  </div> <!-- .page-section -->
