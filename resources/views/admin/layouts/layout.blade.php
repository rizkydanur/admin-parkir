<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/img/svg/logo.svg') }}" type="image/x-icon">
   <!-- Custom styles -->
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <!-- Template styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
  <!-- Livewire styles -->
  @livewireStyles
</head>
<body>
  <div class="layer"></div>
  <!-- Body content -->
  <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
  <div class="page-flex">
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <div class="main-wrapper">
      <!-- Main nav -->
      @include('admin.layouts.header')
      <br>
      <!-- Main content -->
      @yield('content')

      <!-- Footer -->
      @include('admin.layouts.footer')
    </div>
  </div>
  <!-- Chart library -->
  <script src="{{ asset('assets/plugins/chart.min.js') }}"></script>
  <!-- Icons library -->
  <script src="{{ asset('assets/plugins/feather.min.js') }}"></script>
  <!-- Custom scripts -->
  <script src="{{ asset('assets/js/script.js') }}"></script>
  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>


  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
