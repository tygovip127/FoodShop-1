@extends('layouts.admin-app')
@section('title', 'Food Shop VKU | Products')
@section('content')
<div class="main-content">
  <div class="myaccount-content">
    <div class="account-details-form">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="account-details-form">
              <div class="row mx-2">
                <div class="col-lg-2">
                  <div class="single-input-item">
                    <label for="discount">Set Discount (%)</label>
                    <input type="number" name="discount" id="discount" min="0" max="100" value="0">
                    <span class="text-danger">
                      @error('discount'){{ $message }}@enderror
                    </span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="single-input-item">
                    <label>&nbsp;</label>
                    <button id="set-discount" class="check-btn sqr-btn ">Update</button>
                  </div>
                </div>
              </div>
              <div class="row ml-4" id="alert-result"></div>
            </div>
            <div class="card-header pb-0 d-flex flex-row justify-content-between">
              <div class="row">
                <input type="checkbox" name="check-all" id="check-all" style="width:20px">
                <h5 class="ml-2 mt-2">All Products</h5>
              </div>
              @can('create_product')
              <div class="single-input-item m-0">
                <a href="{{ route('admin.products.create') }}">Add product</a>
              </div>
              @endcan
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th>Select</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        ID
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Photo
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Name
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Sell value
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Rate
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach( $products as $product)
                    <x-product-list-card :id="$product->id" :image="$product->feature_image_path"
                      :title="$product->title" :sellValue="$product->sell_value" :rate="$product->rate">
                    </x-product-list-card>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
            <div class="pro-pagination-style text-center mt-10">
              <span class="hidden">
                {{ $pages = ceil($products->total()/ $products->perPage()) }}
              </span>
              <ul>
                <li><a class="prev" href="{{ $products->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
                @for ($i = 1; $i <= $pages; $i++) <li>
                  <a href=<?php echo url()->current() . "?page=" . $i ?>>{{ $i }}</a>
                  </li>
                  @endfor
                  <li><a class="next" href="{{ $products->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
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
</div>
</div>
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('../../js/admin/admin.js') }}"></script>
<script src="{{ asset('../../js/admin/product_checkbox.js') }}"></script>
@endsection
@endsection