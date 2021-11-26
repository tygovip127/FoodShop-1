@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/user.css')}}">
@endsection
@section('title','Food Shop VKU | Admin')
@section('content')
<div class="main-content">
  <div class="myaccount-content">
    <h3>Update product</h3>
    <div class="account-details-form">
      <form action="{{ route('admin.users.update', array($user->id)) }}" method="post">
        @method('PUT')
        @csrf
        <div class="profile-header">
          <div class="row align-items-center">
            <div class="col-auto profile-image">
              <a href="#">
                <img class="rounded-circle" style="width:5rem" alt="User Image" src="">
              </a>
            </div>
            <div class="col ml-md-n2 profile-user-info">
              <h4 class="user-name mb-0">{{ $user->fullname }}</h4>
              <h6 class="text-muted">{{ $user->email }}</h6>
              <div class="user-Location"><i class="fa fa-map-marker"></i>{{ $user->address }}
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-15 mb-15">
          <div class="col-lg-6">
            <div class="single-input-item">
              <label for="username" class="required">Username</label>
              <input type="text" name="username" id="username" value="{{ $user->username }}" />
              @error('username')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="single-input-item">
              <label for="fullname" class="required">Fullname</label>
              <input type="text" name="fullname" id="fullname" value="{{ $user->fullname }}" />
              @error('fullname')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="single-input-item">
              <label for="email" class="required">Email Address</label>
              <input type="email" name="email" id="email" value="{{ $user->email }}" />
              @error('email')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="single-input-item">
              <label for="phone" class="required">Your phone number</label>
              <input type="text" name="phone" id="phone" value="{{  $user->phone }}" />
              @error('phone')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="multiple-input-item">
              <label for="role_id[]">Role</label>
              <select name="role_id[]" id="role_id[]" multiple size="5">
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
              </select>
              @error('role_id')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
          </div>
        </div>
        @if (session()->has('user_success'))
        <div class="alert alert-success">
          {{ session('user_success') }}
        </div>
        @endif

        <div class="single-input-item">
          <button class="check-btn sqr-btn ">Save Changes</button>
        </div>
      </form>
      {{-- Form change password --}}
      <form action="{{ route('reset-password') }}" method="post" enctype="multipart/form">
        @csrf
        @method('PUT')
        <fieldset>
          <legend class="pt-15">Password change</legend>
          <div class="single-input-item">
            <label for="current-pwd" class="required">Current Password</label>
            <input type="password" name="current-pwd" id="current-pwd" value="{{ old('current-pwd') }}" />
            @error('current-pwd')
            <span class="text-danger">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="single-input-item">
                <label for="new-pwd" class="required">New Password</label>
                <input type="password" name="new-pwd" id="new-pwd" />
                @error('new-pwd')
                <span class="text-danger">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="single-input-item">
                <label for="confirm-pwd" class="required">Confirm Password</label>
                <input type="password" name="confirm-pwd" id="confirm-pwd" />
                @error('confirm-pwd')
                <span class="text-danger">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
        </fieldset>
        @if (session()->has('pwd_success'))
        <div class="alert alert-success">
          {{ session('pwd_success') }}
        </div>
        @endif
        @if (session()->has('pwd_fail'))
        <div class="alert alert-danger">
          {{ session('pwd_fail') }}
        </div>
        @endif
        <div class="single-input-item">
          <button class="check-btn sqr-btn ">Change Password</button>
        </div>
      </form>
    </div>
  </div>
</div>
@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
</script>
<script src="{{ asset('../../js/admin/admin.js') }}"></script>
@endsection
@endsection