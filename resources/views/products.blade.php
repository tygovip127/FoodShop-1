@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/product.css')}}">
@endsection
@section('title','Food Shop VKU | Products')
@section('content')
<x-breadcrumb currentPage="Products List"></x-breadcrumb>

<div class="shop-area pt-120 pb-120">
  <div class="container">
    <div class="row flex-row-reverse">
      <div class="col-lg-9">
        <div class="shop-topbar-wrapper">
          <div class="shop-topbar-left">
            <div class="view-mode nav">
              <a class="active" href="#shop-1" data-toggle="tab"><i class="icon-grid"></i></a>
              <a href="#shop-2" data-toggle="tab"><i class="icon-menu"></i></a>
            </div>
            {{-- <p>Showing 1 - 20 of 30 results </p> --}}
          </div>
          <div class="product-sorting-wrapper">
            <div class="product-shorting shorting-style">
              <label>View :</label>
              <select id="perPage" data-url="{{ $url }}" name="product_per_page">
                <option value="9" selected> 9</option>
                <option value="12"> 12</option>
                <option value="15"> 15</option>
              </select>
            </div>
            <div class="product-show shorting-style">
              <label>Sort by :</label>
              <select name="sort_price" id="sort_price">
                <option value="null">Price</option>
                <option value="asc"> Price: Low to High</option>
                <option value="desc"> Price: High to Low</option>
              </select>
            </div>
          </div>
        </div>
        <div class="shop-bottom-area">
          <div class="tab-content jump">
            <div id="shop-1" class="tab-pane active">
              <div class="row">
                @if ($products->total() == 0)
                  <div class="error-box">
                    <h1>Oops!</h1>
                    <h3 class="h2 mb-3"><i class="fa fa-warning"></i>No products to show! Please try again!</h3>
                  </div>
                @endif
                @foreach ($products as $item)
                <x-card :id="$item->id" :name="$item->title" 
                  :price="$item->sell_value" :image="$item->feature_image_path">
                </x-card>
                @endforeach
              </div>
            </div>
            <div id="shop-2" class="tab-pane">
              @foreach ($products as $item)
              <x-card-horiziontal :id="$item->id" 
                :name="$item->title" :description="$item->subtitle"
                :price="$item->sell_value" :image="$item->feature_image_path">
              </x-card-horiziontal>
              @endforeach
            </div>
          </div>
          <div class="pro-pagination-style text-center mt-10">
            <span class="hidden">
              {{ $pages = ceil($products->total() / $products->perPage()) }}
            </span>
            @if ($products->total() != 0)
            <ul id="pagination">
              <li><a class="prev" href="{{ $products->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
              @for ($i = 1; $i <= $pages; $i++) <li>
                <a href={{ $url."page=".$i }} >{{ $i }}</a>
                </li>
                @endfor
                <li><a class="next" href="{{ $products->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
            </ul>
            @endif
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
          <div class="sidebar-widget mb-40">
            <h4 class="sidebar-widget-title">Search </h4>
            <div class="sidebar-search">
              <form class="sidebar-search-form" action="{{ route('search') }}">
                <input name="keyword" type="text" placeholder="Search here...">
                <button>
                  <i class="icon-magnifier"></i>
                </button>
              </form>
            </div>
          </div>
          <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
            <h4 class="sidebar-widget-title">Categories </h4>
            <div class="shop-catigory">
              <ul>
                @if(!empty($categories))
                @foreach ($categories as $category)
                <li><a href=<?php echo url()->current()."?category_id=".$category->id ?> >{{ $category->name }}</a></li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
          <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
            <h4 class="sidebar-widget-title">Price Filter </h4>
            <div class="price-filter">
              <span>Range: 15.000 - 250.000 </span>
              <div id="slider-range"></div>
              <div class="price-slider-amount">
                <div class="label-input">
                  <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                </div>
              </div>
            </div>
          </div>
          <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
            <h4 class="sidebar-widget-title">Refine By </h4>
            <div class="sidebar-widget-list">
              <ul>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox"  id="checkbox_sale" name="checkbox_sale"> <a href="#">Sale Off </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox"  id="checkbox_new" name="checkbox_new"> <a href="#">New Products</a>
                    <span class="checkmark"></span>
                  </div>
                </li>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">In Stock </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <button type="button" class="btn-style-1" id="btn-filter">Filter</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('../../js/product/cart.js') }}"></script>
<script src="{{ asset('../../js/product/filter_sort.js') }}"></script>
@endsection