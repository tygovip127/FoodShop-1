<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- X-CSRF-TOKEN -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ asset('../../css/vendor/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/vendor/signericafat.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/vendor/cerebrisans.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/vendor/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/vendor/elegant.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/vendor/linear-icon.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/plugins/nice-select.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/plugins/easyzoom.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/plugins/slick.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/plugins/animate.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/plugins/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/plugins/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/style.css')}}">

  <link rel="stylesheet" href="{{ asset('../../css/vendor/vendor.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/style.min.css')}}">  

  <!-- General CSS Files Sidebar -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS Sidebar -->
  <link rel="stylesheet" href="{{ asset('../../css/style-sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('../../css/components-sidebar.css') }}">
  @yield('css')

  <title>@yield('title')</title>
</head>

<body>
  <div class="main-wrapper">
    @include('layouts.admin-header')
    @include('layouts.admin-sidebar')
    @yield('content')


    @include('layouts.admin-footer')
  </div>
  <script src="{{ asset('../../js/vendor/modernizr-3.6.0.min.js') }}"></script>
  <script src="{{ asset('../../js/vendor/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('../../js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
  <script src="{{ asset('../../js/vendor/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('../../js/plugins/slick.js') }}"></script>
  <script src="{{ asset('../../js/plugins/jquery.syotimer.min.js') }}"></script>
  <script src="{{ asset('../../js/plugins/jquery.instagramfeed.min.js') }}"></script>
  <script src="{{ asset('../../js/plugins/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('../../js/plugins/wow.js') }}"></script>
  <script src="{{ asset('../../js/plugins/jquery-ui-touch-punch.js') }}"></script>
  <script src="{{ asset('../../js/plugins/jquery-ui.js') }}"></script>
  <script src="{{ asset('../../js/plugins/magnific-popup.js') }}"></script>
  <script src="{{ asset('../../js/plugins/sticky-sidebar.js') }}"></script>
  <script src="{{ asset('../../js/plugins/easyzoom.js') }}"></script>
  <script src="{{ asset('../../js/plugins/scrollup.js') }}"></script>
  <script src="{{ asset('../../js/plugins/ajax-mail.js') }}"></script>

  <script src="{{ asset('../../js/main.js') }}"></script>

  <!-- General JS Scripts Sidebar -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <!-- Template JS File Sidebar -->
  <script src="{{ asset('../../js/scripts-sidebar.js') }}"></script>
  <script src="{{ asset('../../js/custom-sidebar.js') }}"></script>
  @yield('js')
</body>

</html>