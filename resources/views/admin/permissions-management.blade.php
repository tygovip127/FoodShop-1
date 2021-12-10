@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/role.css')}}">
@endsection
@section('title','Food Shop VKU | Admin')
@section('content')
<div class="main-content">
    <div class="myaccount-content mb-5">
        <h3>Create new permission</h3>
        <div class="account-details-form">
            <form action="{{ route('admin.permissions.store') }}" method="post">
                @csrf
                <div class="row mt-15">
                    <div class="col-lg-12">
                        <div class="single-input-item">
                            <label for="module_parent" class="required">Select module</label>
                            <select name="module_parent" id="name">
                                <option value="" disabled selected>Permission parent</option>
                                @foreach(config('permissions.table_module') as $module)
                                <option value="{{ $module }}">{{ $module }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('module_parent')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="4">
                                            <input type="checkbox" class="checkbox mr-3 checkbox-wrapper">Check All
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach(config('permissions.module_children') as $module_children)
                                        <td class="col-lg-3">
                                            <input type="checkbox" name="module_children[]" class="checkbox mr-3 checkbox-children" value="{{ $module_children }}">
                                            {{ $module_children }}
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @error('module_children')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @if (session()->has('permission_success'))
                <div class="alert alert-success">
                    {{ session('permission_success') }}
                </div>
                @endif
                @if (session()->has('permission_fail'))
                <div class="alert alert-danger">
                    {{ session('permission_fail') }}
                </div>
                @endif
                <div class="single-input-item mt-2">
                    <button class="check-btn sqr-btn">Create</button>
                </div>
            </form>
        </div>
    </div>
    <div class="myaccount-content">
        <h3>All permissions</h3>
        @foreach($permissions_parent as $permission_parent)
        <div class="col-lg-12">
            <div class="card">
                <a href="" data-url="{{ route('admin.permissions.destroy', array($permission_parent->id)) }}" class="action_delete">
                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                </a>
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="4">
                                {{ $permission_parent->name }} Module
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($permission_parent->permissionsChildren as $permission_children)
                            <td class="col-lg-3">
                                {{ $permission_children->name }}
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</div>
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/admin/admin.js') }}"></script>
<script src="{{ asset('js/role.js')}}"></script>
@endsection
@endsection