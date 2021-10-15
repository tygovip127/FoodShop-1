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

  {{-- <link rel="stylesheet" href="{{ asset('../../css/vendor/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/vendor/vendor.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../../plugins/plugins.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/style.min.css')}}"> --}}
  <title>Document</title>
</head>

<body>
  <div class="main-wrap">
    @include('layouts.header')
  
    <h3>body </h3>
    @yield('content')
    @include('layouts.footer')

  </div>
  <script src="{{ asset('../..//js/main.js') }}"></script>
</body>

</html>