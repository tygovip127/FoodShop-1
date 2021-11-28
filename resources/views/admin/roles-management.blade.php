@extends('layouts.admin-app')
@section('title', 'Food Shop VKU | Roles')
@section('content')
<div class="main-content">
  <div class="myaccount-content">
    <div class="account-details-form">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header pb-0 d-flex flex-row justify-content-between">
              <div>
                <h5 class="mb-0">All Roles</h5>
              </div>
              @can('create_role')
              <div class="single-input-item m-0">
                <a href="{{ route('admin.roles.create') }}">Add role</a>
              </div>
              @endcan
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        ID
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Name
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Description
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach( $roles as $role)
                    <x-role-list-card :id="$role->id" :name="$role->name" :displayName="$role->display_name">
                    </x-role-list-card>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="pro-pagination-style text-center mt-10">
  <span class="hidden">
    {{ $pages = ceil($roles->total()/ $roles->perPage()) }}
  </span>
  <ul>
    <li><a class="prev" href="{{ $roles->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
    @for ($i = 1; $i <= $pages; $i++) 
      <li>
        <a href=<?php echo url()->current()."?page=".$i ?> >{{ $i }}</a>
      </li>
      @endfor
      <li><a class="next" href="{{ $roles->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
  </ul>
</div>
</div>
</div>
</div>
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('../../js/admin/admin.js') }}"></script>
@endsection
@endsection