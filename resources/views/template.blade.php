<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <script src="/docs/5.3/assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Tabungan Siswa SMK Muhammadiyah 15</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/">

  <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <style>
    .navbar {
      background-color: #712cf9; /* Set your desired navbar background color */
    }

    .navbar-brand {
      color: #fff; /* Navbar brand text color */
      font-weight: bold;
    }

    .navbar-nav .nav-link {
      color: #fff; /* Navbar link text color */
      margin-right: 10px; /* Adjust spacing between nav links */
    }

    .navbar-nav .nav-link:hover {
      color: #fff; /* Hover color for nav links */
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TABUNGAN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
        <ul class="navbar-nav mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('student.index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('student.create') }}">Tambah Siswa Baru</a>
          </li>
          {{-- Add more nav items here if needed --}}
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  @yield('content')

  <!-- Bootstrap Bundle JS -->
  <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
