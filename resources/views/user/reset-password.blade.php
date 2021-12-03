@extends('layouts.app')

@section('content')
<x-breadcrumb currentPage="Reset Password"></x-breadcrumb>
<div class="login-register-area pt-50 pb-120">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav">
            <a class="active">
              <h4> Reset Password</h4>
            </a>
          </div>
          <div class="login-form-container">
            <div class="login-register-form">
              <form action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="email" value={{ $email }}>
                <input type="hidden" name="token" value="{{ $token }}">
                <label for="password" class="required">Password</label>
                <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                <label for="password_confirmation" class="required">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                  value="{{ old('password') }}">
                <div class="button-box">
                  @if (session()->has('email'))
                  <div class="alert alert-success">{{ session()->get('email') }}</div>
                  @endif
                  @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="login-toggle-btn text-center">
                    <button type="submit">Save</button>
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