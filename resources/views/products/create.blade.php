@extends('layouts.admin-app')

@section('title','Food Shop VKU | Admin')
@section('content')
<div class="main-content">
  <div class="myaccount-content">
    <h3>Create new product</h3>
    <div class="account-details-form">
      <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="profile-header">
          <div class="row align-items-center">
            <!-- <div class="col-auto profile-image">
              <a href="#">
                <img class="rounded-circle" style="width:5rem" alt="User Image" src="">
              </a>
            </div> -->
            <img class="rounded-circle" style="width:5rem" alt="User Image" src="http://localhost:8000/../images/users/usersavatardefault_92824.png">
            <div class="single-input-item">
              <label for="feature_image_path" class="required">Main Image</label>
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
              <input type="text" name="title" id="title" value="{{ old('title') }}" />
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
              <input type="number" name="restock_value" id="restock_value" placeholder="VND" min="0" value="{{ old('restock_value') }}" />
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
              <select name="category_id" id="category_id">
                <option value="" disabled selected>Select your option</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
              <input type="number" name="sell_value" id="sell_value" placeholder="VND" min="0" value="{{ old('sell_value') }}" />
              @error('sell_value')
              <span class="text-danger">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <label for="subtitle" class="required">Subtitle</label>
            <textarea name="subtitle" id="editor">{{ old('subtitle') }}</textarea>
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
              <span class="text-danger">

              </span>

            </div>
          </div>
        </div>
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