@extends('layouts.app')

@section('content')
<x-breadcrumb currentPage="Forgot Password"></x-breadcrumb>
<div class="login-register-area pt-120 pb-120">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-form-container">
            <div class="login-register-form">
              <form action="{{ route('password.email') }}" method="post">
                @csrf
                <p>Please enter your email address to reset your password.</p>
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                <div class="button-box">
                  @error('email')
                   <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  @if (session()->has('status'))
                    <div class="alert alert-success">{{ session()->get('status') }}</div>
                  @endif
                  <div class="login-toggle-btn text-center">
                    <button type="submit">Confirm</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection