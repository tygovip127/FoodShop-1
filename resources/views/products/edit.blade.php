@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/product.css')}}">
@endsection
@section('title','Food Shop VKU | Admin')
@section('content')
<div class="main-content">
  <div class="myaccount-content">
    <h3>Create new products</h3>
    <div class="account-details-form">
      <form action="{{ route('admin.products.update', array($product->id)) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="profile-header">
          <div class="row align-items-center">
            <!-- <div class="col-auto profile-image">
              <a href="#">
                <img class="rounded-circle" style="width:5rem" alt="User Image" src="">
              </a>
            </div> -->
            <img class="rounded-circle obf-cover" style="width:5rem; height:5rem" alt="User Image" src="{{ $product->feature_image_path }}">
            <div class="single-input-item">
              <label for="feature_image_path" class="required">Avatar</label>
              <input type="file" name="feature_image_path" id="feature_image_path">
              <span class="text-danger">

              </span>
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
              <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror" value="{{ $product->title }}" />
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
              <input type="number" name="restock_value" id="restock_value" class="@error('restock_value') is-invalid @enderror" placeholder="VND" min="0" value="{{ $product->restock_value }}" />
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
              <select name="category_id" id="category_id" class="@error('category_id') is-invalid @enderror">
                <option value="" disabled selected>Select your option</option>
                @foreach($categories as $category)
                @if($category->id == $product->category->id)
                <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
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
              <input type="number" name="sell_value" id="sell_value" class="@error('sell_value') is-invalid @enderror" placeholder="VND" min="0" value="{{ $product->sell_value }}" />
              @error('sell_value')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <label for="subtitle" class="required">Subtitle</label>
            <textarea name="subtitle" id="editor" class="@error('subtitle') is-invalid @enderror">{{ $product->subtitle }}</textarea>
            @error('subtitle')
            <span class="text-danger">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="col-lg-6">
            <div class="single-input-item">
              <label for="image_path[]">Images</label>
              <input type="file" name="image_path[]" id="image_path[]" multiple>
              <div class="row">
                @foreach($product->pictures as $picture)
                <div class="single-product-wrap m-1">
                  <div class="product-img product-img-zoom mb-20">
                    <a href="#" class="p-0"><img src="{{ $picture->picture }}" class="obf-cover product-delete-img"></a>
                    <div class="product-action-wrap">
                      <a href="" class="action_delete_image">Delete</a>
                      <input type="hidden" name="image_picture[]" value="{{ $picture->picture }}">
                    </div>
                  </div>
                </div>
                @endforeach
                <div id="deleted_image">

                </div>
              </div>
              <span class="text-danger">

              </span>

            </div>
          </div>
        </div>
        <div class="single-input-item mt-2">
          <button class="check-btn sqr-btn">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
</script>
<script src="{{ asset('../../js/admin/admin.js') }}"></script>
@endsection
@endsection