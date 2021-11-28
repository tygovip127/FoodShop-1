@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/user.css')}}">
@endsection
@section('title','Food Shop VKU | Admin')
@section('content')
<div class="main-content">
  <div class="myaccount-content">
    <h3>Update user</h3>
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
              <input type="text" name="username" id="username" value="{{ $user->username }}" disabled/>
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
              <input type="text" name="fullname" id="fullname" value="{{ $user->fullname }}" disabled/>
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
              <input type="email" name="email" id="email" value="{{ $user->email }}" disabled/>
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
              <input type="text" name="phone" id="phone" value="{{  $user->phone }}" disabled/>
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
                <option {{ $roles_selected->contains('id', $role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
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