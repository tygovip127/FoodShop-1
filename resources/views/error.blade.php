@extends('layouts.app')
@section('title','Error')

@section('content')
<div class="error-box pt-100 pb-120">
  <h1>400</h1>
  {{-- <h1>{{ $errorStatus }}</h1> --}}
  <h3 class="h2 mb-3"><i class="fa fa-warning"></i> Oops! Page not found!</h3>
  {{-- <h3 class="h2 mb-3"><i class="fa fa-warning"></i> {{ $statusText }}</h3> --}}
  <p class="h4 font-weight-normal">The page you requested was not found.</p>
  <a href="/" class="btn btn-primary">Back to Home</a>
</div>
@endsection