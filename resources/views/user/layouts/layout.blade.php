<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/img/svg/logo.svg') }}" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">


  <div class="main-wrapper">
    <!-- ! Main nav -->
    @include('user.layouts.header')
    
    <!-- ! Main -->
    @yield('content')
    
    <!-- ! Footer -->
    @include('user.layouts.footer')
   
  </div>
</div>
<!-- Chart library -->
<script  src="{{ asset('assets/plugins/chart.min.js') }}"></script>
<!-- Icons library -->
<script src="{{ asset('assets/plugins/feather.min.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>