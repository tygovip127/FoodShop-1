<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
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
  <link rel="stylesheet" href="{{ asset('../../plugins/plugins.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/style.min.css')}}">
  <title>Document</title>
</head>

<body>
  <div class="main-wrapper">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
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
</body>

</html>