@extends('layouts.admin-app')

@section('title','Food Shop VKU | Admin')

@section('content')
{{-- <x-breadcrumb currentPage="Dashboard"></x-breadcrumb> --}}
{{-- {{ dd($users) }} --}}
<div class="main-content">
  <div class="shop-area pb-120 section-padding-2">
    <div class="container-fluid">
      <div class="row">
        @include('layouts.admin-sidebar')
        <div class="col-lg-12">
          <div class="myaccount-content">
            <h3>Users</h3>
            <div class="myaccount-table table-responsive ">
              <table class="table table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ? $user->phone : "----------" }}</td>
                    <td><a href="#" class="check-btn sqr-btn">Delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="pro-pagination-style text-center mt-10">
                <span class="hidden">
                  {{ $pages = ceil($users->total()/ $users->perPage()) }}
                </span>
                <ul>
                  <li><a class="prev" href="{{ $users->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
                  @for ($i = 1; $i <= $pages; $i++) <li>
                    <a href='{{ "http://127.0.0.1:8000/admin/users-management?page=".$i }}'>{{ $i }}</a>
                    </li>
                    @endfor
                    <li><a class="next" href="{{ $users->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
                </ul>
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