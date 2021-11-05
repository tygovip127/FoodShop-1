@extends('layouts.admin-app')

@section('title','Food Shop VKU | Admin')

@section('content')
<x-breadcrumb currentPage="Dashboard"></x-breadcrumb>
<div class="shop-area pt-120 pb-120 section-padding-2">
  <div class="container-fluid">
    <div class="row">
      @include('layouts.admin-sidebar')
      <div class="col-lg-9 col-md-8">
        <div class="myaccount-content">
          <h3>Categories</h3>
          <div class="account-details-form">
            <form action="/admin/category" method="post">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <div class="single-input-item">
                    <label for="category">Category Name</label>
                    <input type="text" name="category" id="category">
                    <span class="text-danger">
                      @error('category'){{ $message }}@enderror
                    </span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single-input-item">
                    <label>&nbsp;</label>
                    <button class="check-btn sqr-btn ">Save Changes</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="myaccount-table table-responsive ">
            <table class="table table-bordered text-center">
              <thead class="thead-light">
                <tr>
                  <th>Ordinal numbers</th>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <span class="hidden">{{ $i=0 }}</span>
                @foreach ($categories as $category)
                <form action="/admin/category/{{ $category->id }}" method="post">
                  @csrf
                  @method('delete')
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                      <button type="submit" class="btn-danger m-auto">Delete</button>
                    </td>
                  </tr>
                </form>
                @endforeach
              </tbody>
            </table>

            {{-- <div class="pro-pagination-style text-center mt-10">
              <span class="hidden">
                {{ $pages = ceil($category->total()/ $category->perPage()) }}
              </span>
              <ul>
                <li><a class="prev" href="{{ $category->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
                @for ($i = 1; $i <= $pages; $i++) <li>
                  <a href='{{ "http://127.0.0.1:8000/admin/category?page=".$i }}'>{{ $i }}</a>
                  </li>
                  @endfor
                  <li><a class="next" href="{{ $users->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
              </ul>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection