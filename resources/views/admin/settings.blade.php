@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/role.css')}}">
@endsection
@section('title','Food Shop VKU | Admin')
@section('content')
<div class="main-content">
    <div class="myaccount-content mb-5">
        <h3>Interface setting</h3>
        @if (session()->has('setting_success'))
        <div class="alert alert-success">
            {{ session('setting_success') }}
        </div>
        @endif
        <div class="account-details-form row">
            @foreach($settings as $setting)
            <div class="col-lg-12 mb-5">
                <form action="{{ route('admin.settings.update', array($setting->id)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row mt-15">
                        <div class="col-lg-12">
                            @if($setting->name === 'introduction')
                            <label for="content" class="text-capitalize">{{ $setting->name }}</label>
                            <textarea name="content" id="editor1">{{ $setting->content }}</textarea>
                            @elseif($setting->name === 'logo')
                            <div class="single-input-item">
                                <label for="content" class="text-capitalize">{{ $setting->name }}</label>
                                <input type="file" name="content">
                                <div class="single-product-wrap m-1">
                                    <div class="product-img product-img-zoom mb-20">
                                       <img src="{{ $setting->content }}" class="obf-cover w-25">
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="single-input-item">
                                <label for="content" class="text-capitalize">{{ $setting->name }}</label>
                                <input type="text" name="content" value="{{ $setting->content }}">
                            </div>
                            @endif
                            @error('content')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="single-input-item">
                        <button class="check-btn sqr-btn">Save</button>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/admin/admin.js') }}"></script>
<script src="{{ asset('js/role.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor1'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
@endsection