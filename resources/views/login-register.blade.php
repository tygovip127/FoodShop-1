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
                    <input type="text" name="email" placeholder="Email"
                      value="{{ old('email') }}">
                    <span class="text-danger">
                      @error('email'){{ $message }}@enderror
                    </span>
                    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                    <span class="text-danger">
                      @error('password'){{ $message }}@enderror
                    </span>
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
                      <button type="submit" >Login</button>
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
                    <input type="text" name="fullname" placeholder="Fullname" value="{{ old('fullname') }}">
                    <span class="text-danger">
                      @error('fullname'){{ $message }}@enderror
                    </span>
                    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                    <span class="text-danger">
                      @error('username'){{ $message }}@enderror
                    </span>
                    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                    <span class="text-danger">
                      @error('password'){{ $message }}@enderror
                    </span>
                    <input type="password" name="re-password" placeholder="Retype Password"
                      value="{{ old('re-password') }}">
                    <span class="text-danger">
                      @error('re-password'){{ $message }}@enderror
                    </span>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    <span class="text-danger">
                      @error('email'){{ $message }}@enderror
                    </span>
                    <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                    <span class="text-danger">
                      @error('phone'){{ $message }}@enderror
                    </span>
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