@extends('layouts.app')
@section('title','Food Shop VKU | Login - Register')
@section('content')
<x-breadcrumb currentPage="Login - Register"></x-breadcrumb>
<div class="login-register-area pt-50 pb-120">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav">
            <a class="active" data-toggle="tab" href="#lg1">
              <h4> login </h4>
            </a>
            <a data-toggle="tab" href="#lg2">
              <h4> register </h4>
            </a>
          </div>
          <div class="tab-content">
            <div id="lg1" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form">
                  <form action="{{ route('login') }}" method="post">
                    @csrf
                    @error('email')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                    @enderror
                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('password')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                    @enderror
                    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                    <div class="button-box">
                      <div class="login-toggle-btn">
                        <input type="checkbox">
                        <label>Remember me</label>
                        <a href="/forgot-password">Forgot Password?</a>
                      </div>
                      @if (session()->has('errors'))
                        <div class="alert alert-danger">{{ session()->get('errors') }}</div>
                      @endif
                      @if (session()->has('status'))
                      <div class="alert alert-success">{{ session()->get('status') }}</div>
                    @endif
                      <div class="login-toggle-btn text-center">
                        <button type="submit">Login</button>
                      </div>
                      <hr>
                      <div class="row login-toggle-btn text-center">
                        <a href="{{ url('google') }}" class="btn">Or you can login with Google</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div id="lg2" class="tab-pane">
              <div class="login-form-container">
                <div class="login-register-form">
                  <form action="{{ route('register') }}" method="post">
                    @csrf
                    @error('_fullname')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                    @enderror
                    <input type="text" name="_fullname" placeholder="Fullname" value="{{ old('_fullname') }}">
                    @error('_username')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                    @enderror
                    <input type="text" name="_username" placeholder="Username" value="{{ old('_username') }}">
                    @error('_password')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                    @enderror
                    <input type="password" name="_password" placeholder="Password" value="{{ old('_password') }}">
                    @error('_password')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                    @enderror
                    <input type="password" name="_password" placeholder="Retype Password" value="{{ old('_password') }}">
                    @error('_email')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                    @enderror
                    <input type="email" name="_email" placeholder="Email" value="{{ old('_email') }}">
                    @error('_phone')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                    @enderror
                    <input type="text" name="_phone" placeholder="Phone Number" value="{{ old('_phone') }}">
                    <div class="button-box text-center">
                      <button type="submit">Register</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection