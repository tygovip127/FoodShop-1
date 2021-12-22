@extends('layouts.admin-app')

@section('title','Food Shop VKU | Admin')

@section('content')
<div class="main-content">

  {{-- <x-breadcrumb currentPage="Dashboard"></x-breadcrumb> --}}

  <div class="shop-area  pb-120 section-padding-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="myaccount-content">
            <h3>Categories</h3>
            <div class="account-details-form">
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
                    <button id="save-category" class="check-btn sqr-btn ">Save Changes</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="myaccount-table table-responsive ">
              <table class="table table-bordered text-center">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="category-list">
                  <span class="hidden">{{ $index=0 }}</span>
                  @foreach ($categories as $category)
                    <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td>
                        <button  data-id="{{ $category->id }}" class="btn-danger m-auto delete-category">Delete</button>
                      </td>
                    </tr>
                  @endforeach
                  <span id="last-index" class="hidden">{{ $index }}</span>
                </tbody>
              </table>

              <div class="pro-pagination-style text-center mt-10">
                <span class="hidden">
                  {{ $pages = ceil($categories->total()/ $categories->perPage()) }}
                </span>
                <ul>
                  <li><a class="prev" href="{{ $categories->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
                  @for ($i = 1; $i <= $pages; $i++) <li>
                    <a href=<?php echo url()->current()."?page=".$i ?> >{{ $i }}</a>
                    </li>
                    @endfor
                    <li><a class="next" href="{{ $categories->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
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
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('../../js/admin/category.js') }}"></script>
@endsection