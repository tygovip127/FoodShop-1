@extends('layouts.admin-app')
@section('title','Food Shop VKU | Add product')

@section('content')
<x-breadcrumb currentPage="Create New Product"></x-breadcrumb>

<div class="shop-area pt-120 pb-120 section-padding-2">
  <div class="container-fluid">

    <div class="row">
      @include('layouts.admin-sidebar')
      <div class="col-lg-9">

        <div class="myaccount-content">
          <h3>Create new products</h3>
          <div class="account-details-form">
            <form action="{{ route('products.store') }}" method="post">
              @csrf
              <div class="profile-header">
                <div class="row align-items-center">
                  <div class="col-auto profile-image">
                    <a href="#">
                      <img class="rounded-circle" style="width:5rem" alt="User Image" src="">
                    </a>
                  </div>
                  <div class="col ml-md-n2 profile-user-info">
                    <h4 class="user-name mb-0"></h4>
                    <h6 class="text-muted"></h6>
                    <div class="user-Location"><i class="fa fa-map-marker"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-15">
                <div class="col-lg-6">
                  <div class="single-input-item">
                    <label for="title" class="required">Product name</label>
                    <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror" value="" />
                    @error('title')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single-input-item">
                    <label for="restock_value" class="required">Restock value</label>
                    <input type="number" name="restock_value" id="restock_value" class="@error('restock_value') is-invalid @enderror" placeholder="VND" min="0" value="" />
                    @error('restock_value')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single-input-item">
                    <label for="category_id" class="required">Category</label>
                    <select name="category_id" id="category_id" class="@error('restock_value') is-invalid @enderror" >
                      <option value="" disabled selected>Select your option</option>
                    </select>
                    @error('category_id')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single-input-item">
                    <label for="sell_value" class="required">Sell value</label>
                    <input type="number" name="sell_value" id="sell_value" class="@error('restock_value') is-invalid @enderror" placeholder="VND" min="0" value="" />
                    @error('sell_value')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single-input-item">
                    <label for="subtitle" class="required">Subtitle</label>
                    <textarea name="subtitle" id="subtitle" class="@error('restock_value') is-invalid @enderror" cols="30" rows="10"></textarea>
                    @error('subtitle')
                    <span class="text-danger">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single-input-item">
                    <label for="subtitle" class="required">Images</label>
                    <input type="file" multiple>
                    <span class="text-danger">

                    </span>
                  </div>
                </div>
              </div>

              <div class="alert alert-success">

              </div>


              <div class="single-input-item">
                <button class="check-btn sqr-btn ">Create</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection