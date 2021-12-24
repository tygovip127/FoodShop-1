@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/product.css')}}">
@endsection
@section('title','Food Shop VKU | Home')
@section('content')
{{-- @if (Auth::user())
{{ dd(Auth::user()->fullname) }}
@endif --}}

<div class="slider-area bg-gray">
  <div class="hero-slider-active-1 nav-style-1 dot-style-1">
    @if (!empty($banners))
    @foreach ($banners as $banner)
    <div class="single-hero-slider single-animation-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="hero-slider-content-1 hero-slider-content-1-pt-1 slider-animated-1 text-capitalize">
              <h4 class="animated">{{ $banner->title }}</h4>
              <h1 class="animated">{{ $banner->name }}</h1>
              <p class="animated">{{ $banner->description }}</p>
              <div class="btn-style-1">
                <a class="animated btn-1-padding-1" href="product-details.html">Explore Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="hero-slider-img-1 slider-animated-1">
              <img class="animated" src="{{  asset($banner->image) }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @endif
  </div>
</div>
<div class="service-area">
  <div class="container">
    <div class="service-wrap">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="single-service-wrap mb-30">
            <div class="service-icon">
              <i class="icon-cursor"></i>
            </div>
            <div class="service-content">
              <h3>Free Shipping</h3>
              <span>Orders over 100k VND</span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="single-service-wrap mb-30">
            <div class="service-icon">
              <i class="icon-reload"></i>
            </div>
            <div class="service-content">
              <h3>Free Returns</h3>
              <span>Within 30 days</span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="single-service-wrap mb-30">
            <div class="service-icon">
              <i class="icon-lock"></i>
            </div>
            <div class="service-content">
              <h3>100% Secure</h3>
              <span>Ship Cod</span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="single-service-wrap mb-30">
            <div class="service-icon">
              <i class="icon-tag"></i>
            </div>
            <div class="service-content">
              <h3>Best Price</h3>
              <span>Guaranteed</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="about-us-area pt-85">
  <div class="container">
    <div class="border-bottom-1 about-content-pb">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="about-us-logo">
            <img alt="" src="{{ asset($logo) }}">
          </div>
        </div>
        <div class="col-lg-9 col-md-9">
          <div class="about-us-content">
            <h3>Introduce</h3>
            {!! $introduction !!}
            <div class="signature">
              <h2>Food Shop VKU</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="product-area section-padding-1 pt-115 pb-75">
  <div class="container">
    <div class="section-title-tab-wrap mb-45">
      <div class="section-title">
        <h2>Featured Products</h2>
      </div>
      <div class="tab-style-1 nav">
        <a class="active" href="#product-1" data-toggle="tab">Best Seller</a>
        <a href="#product-2" data-toggle="tab"> Sale-off</a>
        <a href="#product-3" data-toggle="tab">New Arrivals </a>
        <a href="#product-4" data-toggle="tab">All Products</a>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="tab-content jump">
      <div id="product-1" class="tab-pane active">
        <div class="row">
          @foreach ($products as $item)
          <x-simple-card :id="$item->id" :name="$item->title" :price="$item->sell_value" :discount="$item->discount" :image="$item->feature_image_path">
          </x-simple-card>
          @endforeach
        </div>
      </div>
      <div id="product-2" class="tab-pane">
        <div class="row">
        @foreach ($products as $item)
          <x-simple-card :id="$item->id" :name="$item->title" :price="$item->sell_value" :discount="$item->discount" :image="$item->feature_image_path">
          </x-simple-card>
          @endforeach
        </div>
      </div>
      <div id="product-3" class="tab-pane">
        <div class="row">
        @foreach ($products as $item)
          <x-simple-card :id="$item->id" :name="$item->title" :price="$item->sell_value" :discount="$item->discount" :image="$item->feature_image_path">
          </x-simple-card>
          @endforeach
        </div>
      </div>
      <div id="product-4" class="tab-pane">
        <div class="row">
        @foreach ($products as $item)
          <x-simple-card :id="$item->id" :name="$item->title" :price="$item->sell_value" :discount="$item->discount" :image="$item->feature_image_path">
          </x-simple-card>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script src="{{ asset('js/product/cart.js') }}"></script>
@endsection