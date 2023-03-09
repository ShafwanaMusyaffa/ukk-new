<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Lelangin</title>
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
  <link href="/asset/vendor/boxicons/css/boxicons.css" rel="stylesheet">
  <link href="/asset/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/asset/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/asset/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/asset/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="/asset/vendor/DataTables/datatables.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/asset/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/pages/admin/" class="logo d-flex align-items-center">
        <img src="/asset/img/logo.png" alt="Lelangin">
        <span class="d-none d-lg-block">Lelangin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/asset/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-capitalize">{{Auth::user()->name;}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6 class="text-capitalize">{{Auth::user()->name}}</h6>
              <span class="text-capitalize">{{Auth::user()->role}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <li>
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="/pages/admin/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Personalia</li>

      @if (auth::user()->role == "admin")
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{url('admin/admin')}}">
            <i class="bi bi-person-gear"></i>
            <span>Admin</span>
            </a>
        </li><!-- End Admin Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{url('admin/karyawan')}}">
            <i class="bi bi-person-vcard"></i>
            <span>Karyawan</span>
            </a>
        </li><!-- End Karyawan Nav -->
      @endif

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('admin/pengguna')}}">
          <i class="bi bi-people"></i>
          <span>Pengguna</span>
        </a>
      </li><!-- End Pengguna Nav -->

      <li class="nav-heading">Lelang</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('assets.index') }}">
                <i class="bi bi-wallet2"></i>
                <span>Lelang</span>
            </a>
        </li><!-- End Pengguna Nav -->


      <li class="nav-heading">Laporan</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-earmark-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="laporan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li class="">
            <a href="/pages/admin/laporan/laporan-bulanan.html" class="">
              <i class="bi bi-circle"></i><span>Bulanan</span>
            </a>
          </li>
          <li class="">
            <a href="/pages/admin/laporan/laporan-produk.html" class="">
              <i class="bi bi-circle"></i><span>Produk</span>
            </a>
          </li>
          <li class="">
            <a href="/pages/admin/laporan/laporan-pengguna.html" class="">
              <i class="bi bi-circle"></i><span>Pengguna</span>
            </a>
          </li>
        </ul>
      </li><!-- End Lelang Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main min-vh-100">

    @yield('content')

  </main><!-- End #main -->


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
  <script src="/asset/js/main.js"></script>
  <script src="/asset/js/jquery-3.6.3.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
  <script src="/asset/vendor/DataTables/datatables.js"></script>
  <script src="/asset/js/dashboard.js"></script>

</body>

</html>
