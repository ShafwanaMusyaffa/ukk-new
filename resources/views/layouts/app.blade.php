<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Selamat Datang - Lelangin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/asset/img/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/asset/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="/asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/asset/vendor/DataTables/datatables.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/asset/css/client.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- Main -->
  <main>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#">
          <img src="/asset/img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-1">
          Lelang
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cari</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Penawaran</a>
            </li>
          </ul>
        @if (Auth::user())
        <button type="button" class="btn btn-outline-primary dropdown-toggle text-capitalize" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle me-1"></i>
            {{ Auth::user()->name }}
        </button>
        <div class="btn-group">
            <ul class="dropdown-menu dropdown-menu-end">
            @if(Auth::user()->is_admin == true)
                <li>
                <a class="dropdown-item" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
                </li>
            @endif
            <li>
                <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="dropdown-item" type="submit">Logout</button>
                </form>
            </li>
            </ul>
        </div>
        @else
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('login') }}" class="btn btn-primary">
            <i class="bi bi-box-arrow-in-right"></i>
            </a>
        </div>
        @endif
        </div>
      </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-light">
      <div class="container py-4">
        <div class="row justify-content-between">
          <div class="col-12 col-lg-6">
            <h1 class="fw-bold text-black mb-1">Lelang</h1>
            <p class="mb-0">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti error cum dolores unde et, eaque nostrum reprehenderit ipsam assumenda debitis.
            </p>
          </div>
          <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-md-end">
            <div class="w-fit">
              <h3 class="mb-2 fw-bold">Ikuti Kami</h3>
              <div class="d-flex align-items-center gap-2">
                <a href="" class="btn btn-primary p-2 rounded-full mb-0">
                  <i class="bi bi-instagram"></i>
                </a>
                <a href="" class="btn btn-primary p-2 rounded-full mb-0">
                  <i class="bi bi-twitter"></i>
                </a>
                <a href="" class="btn btn-primary p-2 rounded-full mb-0">
                  <i class="bi bi-facebook"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->
  </main>
  <!-- End #main -->





  <!-- Vendor JS Files -->
  <script src="/asset/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/asset/vendor/chart.js/chart.umd.js"></script>
  <script src="/asset/vendor/echarts/echarts.min.js"></script>
  <script src="/asset/vendor/quill/quill.min.js"></script>
  <script src="/asset/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/asset/vendor/tinymce/tinymce.min.js"></script>
  <script src="/asset/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/asset/js/jquery-3.6.3.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
  <script src="/asset/vendor/DataTables/datatables.js"></script>
  <script src="/asset/js/numeral.js"></script>
  <script src="/asset/js/client.js"></script>

</body>

</html>s
