@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/product.css')}}">
@endsection
@section('title','Food Shop VKU | Products')
@section('content')
<x-breadcrumb currentPage="Products List"></x-breadcrumb>

{{-- @if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif --}}

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
            <p>Showing 1 - 20 of 30 results </p>
          </div>
          <div class="product-sorting-wrapper">
            <div class="product-shorting shorting-style">
              <label>View :</label>
              <select>
                <option value=""> 20</option>
                <option value=""> 23</option>
                <option value=""> 30</option>
              </select>
            </div>
            <div class="product-show shorting-style">
              <label>Sort by :</label>
              <select>
                <option value="">Default</option>
                <option value=""> Name</option>
                <option value=""> price</option>
              </select>
            </div>
          </div>
        </div>
        <div class="shop-bottom-area">
          <div class="tab-content jump">
            <div id="shop-1" class="tab-pane active">
              <div class="row">
                @foreach ($products as $item)
                <x-card :id="$item->id" :name="$item->title" :price="$item->sell_value" :image="$item->feature_image_path">
                </x-card>
                @endforeach

              </div>
            </div>
            <div id="shop-2" class="tab-pane">
              <x-card-horiziontal id="1" name="Make Thing Happen T-Shirt" price="80.50" image="images/products/product-14.jpg">
              </x-card-horiziontal>
              <x-card-horiziontal id="2" name="Basic White Simple Sneake" discount="20" price="80.50" image="images/products/product-14.jpg">
              </x-card-horiziontal>
              <x-card-horiziontal id="3" name="Basic White Simple Sneake" price="80.50" image="images/products/product-14.jpg">
              </x-card-horiziontal>
              <x-card-horiziontal id="1" name="Make Thing Happen T-Shirt" price="80.50" image="images/products/product-14.jpg">
              </x-card-horiziontal>
              <x-card-horiziontal id="2" name="Basic White Simple Sneake" discount="20" price="80.50" image="images/products/product-14.jpg">
              </x-card-horiziontal>
              <x-card-horiziontal id="3" name="Basic White Simple Sneake" price="80.50" image="images/products/product-14.jpg">
              </x-card-horiziontal>
              <x-card-horiziontal id="1" name="Make Thing Happen T-Shirt" price="80.50" image="images/products/product-14.jpg">
              </x-card-horiziontal>
              <x-card-horiziontal id="2" name="Basic White Simple Sneake" discount="20" price="80.50" image="images/products/product-14.jpg">
              </x-card-horiziontal>
              <x-card-horiziontal id="3" name="Basic White Simple Sneake" price="80.50" image="images/products/product-14.jpg">
              </x-card-horiziontal>
            </div>
          </div>
          <div class="pro-pagination-style text-center mt-10">
            <span class="hidden">
              {{ $pages = ceil($products->total() / $products->perPage()) }}
            </span>
            <ul>
              <li><a class="prev" href="{{ $products->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
              @for ($i = 1; $i <= $pages; $i++) <li>
                <a href='{{ "http://localhost:8000/products?page=".$i }}'>{{ $i }}</a>
                </li>
                @endfor
                <li><a class="next" href="{{ $products->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
          <div class="sidebar-widget mb-40">
            <h4 class="sidebar-widget-title">Search </h4>
            <div class="sidebar-search">
              <form class="sidebar-search-form" action="#">
                <input type="text" placeholder="Search here...">
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
                <li><a href="#">{{ $category->name }}</a></li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
          <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
            <h4 class="sidebar-widget-title">Price Filter </h4>
            <div class="price-filter">
              <span>Range: $100.00 - 1.300.00 </span>
              <div id="slider-range"></div>
              <div class="price-slider-amount">
                <div class="label-input">
                  <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                </div>
                <button type="button">Filter</button>
              </div>
            </div>
          </div>
          <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
            <h4 class="sidebar-widget-title">Refine By </h4>
            <div class="sidebar-widget-list">
              <ul>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox"> <a href="#">On Sale <span>4</span> </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">New <span>5</span></a>
                    <span class="checkmark"></span>
                  </div>
                </li>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">In Stock <span>6</span> </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
            <h4 class="sidebar-widget-title">Size </h4>
            <div class="sidebar-widget-list">
              <ul>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">XL <span>4</span> </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">L <span>5</span> </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">SM <span>6</span> </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">XXL <span>7</span> </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
            <h4 class="sidebar-widget-title">Color </h4>
            <div class="sidebar-widget-list">
              <ul>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">Green <span>7</span> </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">Cream <span>8</span> </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">Blue <span>9</span> </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
                <li>
                  <div class="sidebar-widget-list-left">
                    <input type="checkbox" value=""> <a href="#">Black <span>3</span> </a>
                    <span class="checkmark"></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="sidebar-widget shop-sidebar-border pt-40">
            <h4 class="sidebar-widget-title">Popular Tags</h4>
            <div class="tag-wrap sidebar-widget-tag">
              <a href="#">New Products</a>
              <a href="#">Sale Off</a>
              <a href="#">Best-selling</a>
              <a href="#">For Man</a>
              <a href="#">For Woman</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('../../js/product/cart.js') }}"></script>
@endsection