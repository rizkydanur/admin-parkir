<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Parkir | Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/img/svg/logo.svg') }}" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <!-- Template styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
  <!-- Livewire styles -->
</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- Sidebar -->
  @include('user.layouts.sidebar')

  <div class="main-wrapper">
    <!-- ! Main nav -->
    @include('user.layouts.header')
    <br>
    <!-- ! Main -->
    @yield('content')
    <div style="height: 350px;"></div>
    
    </div>
  <!-- ! Footer -->
  @include('user.layouts.footer')
</div>
<!-- Chart library -->
<script  src="{{ asset('assets/plugins/chart.min.js') }}"></script>
<!-- Icons library -->
<script src="{{ asset('assets/plugins/feather.min.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
