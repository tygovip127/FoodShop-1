@extends('layouts.admin-app')

@section('title','Food Shop VKU | Admin')
@section('content')
<div class="main-content">
    <div class="myaccount-content">
        <h3>Create new user</h3>
        <div class="account-details-form">
            <form action="{{ route('admin.users.store') }}" method="post">
                @csrf
                <div class="row mt-15">
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="username" class="required">Username</label>
                            <input type="text" name="username" value="{{ old('username') }}">
                            @error('username')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="fullname" class="required">Full name</label>
                            <input type="text" name="fullname" value="{{ old('fullname') }}">
                            @error('fullname')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="password" class="required">Password</label>
                            <input type="password" name="password" value="{{ old('password') }}">
                            @error('password')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="email" class="required">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="re-password" class="required">Re-password</label>
                            <input type="password" name="re-password" value="{{ old('re-password') }}">
                            @error('re-password')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="phone">Phone number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}">
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
                <div class="single-input-item mt-2">
                    <button class="check-btn sqr-btn">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection