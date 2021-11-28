@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/role.css')}}">
@endsection
@section('js')
<script src="{{ asset('../../js/role.js')}}"></script>
@endsection
@section('title','Food Shop VKU | Admin')
@section('content')
<div class="main-content">
  <div class="myaccount-content">
    <h3>Create new role</h3>
    <div class="account-details-form">
      <form action="{{ route('admin.roles.store') }}" method="post">
        @csrf
        <div class="row mt-15">
          <div class="col-lg-12">
            <div class="single-input-item">
              <label for="name" class="required">Role name</label>
              <input type="text" name="name" id="name" value="{{ old('name') }}" />
              @error('name')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-lg-12 mb-3">
            <label for="display_name" class="required">Description</label>
            <textarea name="display_name" id="editor">{{ old('display_name') }}</textarea>
            @error('display_name')
            <span class="text-danger">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="col-lg-12">
            <input type="checkbox" class="checkbox mr-3 check-all">Check All
          </div>
          @foreach($permissions_parent as $permission_parent)
          <div class="col-lg-12">
            <div class="card">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="4">
                      <input type="checkbox" class="checkbox mr-3 checkbox-wrapper" value="">{{ $permission_parent->name }} Module
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach($permission_parent->permissionsChildren as $permission_children)
                    <td class="col-lg-3">
                      <input type="checkbox" name="permission_id[]" class="checkbox mr-3 checkbox-children" value="{{ $permission_children->id }}">{{ $permission_children->name }}
                    </td>
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          @endforeach
        </div>
        @if (session()->has('role_success'))
        <div class="alert alert-success">
          {{ session('role_success') }}
        </div>
        @endif
        @if (session()->has('role_fail'))
        <div class="alert alert-danger">
          {{ session('role_fail') }}
        </div>
        @endif
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