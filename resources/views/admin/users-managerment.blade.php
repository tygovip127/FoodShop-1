@extends('layouts.admin-app')
@section('title', 'Food Shop VKU | Products')
@section('content')
<div class="main-content">
  <div class="myaccount-content">
    <div class="account-details-form">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header pb-0 d-flex flex-row justify-content-between">
              <div>
                <h5 class="mb-0">All Users</h5>
              </div>
              <div class="single-input-item m-0">
                <a href="{{ route('admin.users.create') }}">Add user</a>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        ID
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Avatar
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Full name
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Email
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Phone
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Address
                      </th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Created at
                                            </th> -->
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Updated at
                                            </th>-->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach( $users as $user)
                    <x-user-list-card :id="$user->id" :avatar="$user->avatar" :fullname="$user->fullname" :email="$user->email" :phone="$user->phone" :address="$user->address">
                    </x-user-list-card>
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
    {{ $pages = ceil($users->total()/ $users->perPage()) }}
  </span>
  <ul>
    <li><a class="prev" href="{{ $users->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
    @for ($i = 1; $i <= $pages; $i++) 
      <li>
        <a href=<?php echo url()->current()."?page=".$i ?> >{{ $i }}</a>
      </li>
      @endfor
      <li><a class="next" href="{{ $users->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
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