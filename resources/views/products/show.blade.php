@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('../../css/product.css')}}">
@endsection
@section('title','Food Shop VKU | Product Detail')

@section('content')
{{-- {{ dd($rating) }} --}}
<x-breadcrumb currentPage=" Product-Detail"></x-breadcrumb>
<div class="product-details-area pt-50 pb-115">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="product-details-tab">
          <div class="pro-dec-big-img-slider">
            <div class="easyzoom-style">
              <div class="easyzoom easyzoom--overlay">
                <a href="{{ asset($product->feature_image_path) }}">{{-- image full scrreen--}}
                  <img class="product-detail-img" src="{{ asset($product->feature_image_path) }}" alt="">
                </a>
              </div>
              <a class="easyzoom-pop-up img-popup" href="{{ asset($product->feature_image_path) }}">
                <i class="icon-size-fullscreen"></i>
              </a>
            </div>
            @if ($product->pictures)
            @foreach ($product->pictures as $item)
            <div class="easyzoom-style">
              <div class="easyzoom easyzoom--overlay">
                <a href="{{ asset($item->picture) }}">
                  <img class="product-detail-img" src="{{ asset($item->picture) }}" alt="">
                </a>
              </div>
              <a class="easyzoom-pop-up img-popup" href="{{ asset($item->picture) }}">
                <i class="icon-size-fullscreen"></i>
              </a>
            </div>
            @endforeach
            @endif
          </div>
          <div class="product-dec-slider-small product-dec-small-style1">
            <div class="product-dec-small active">
              <img src="{{ asset($product->feature_image_path) }}" alt="">
            </div>
            @if ($product->pictures)
            @foreach ($product->pictures as $item)
            <div class="product-dec-small active">
              <img src="{{ asset($item->picture) }}" alt="">
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="product-details-content pro-details-content-mrg">
          <h2>{{ $product->title }}</h2>
          <div class="product-ratting-review-wrap">
            <div class="product-ratting-digit-wrap">
              <div class="product-ratting">
                @for ($i = 1; $i <= $product->rate; $i++)
                  <i class="text-warning icon_star"></i>
                @endfor
                @for ($i = 5; $i > $product->rate; $i--)
                  <i class="text-muted icon_star"></i>
                @endfor
              </div>
              <div class="product-digit">
                <span>{{ $product->rate }}.0</span>
              </div>
            </div>
            <div class="product-review-order">
              <span>{{ count($rating) }} Reviews</span>
              <span>{{ count($product->orders) }} Orders</span>
              <span>{{ $product->view }} Views</span>
            </div>
          </div>
          <p>{{ strip_tags($product->subtitle) }}</p>
          <div class="pro-details-price">
            @if ($product->discount !=0 || $product->discount != null)
              <span class="new-price">{{ $product->sell_value*(100-$product->discount)/100.0 }} VND</span>
              <span class="old-price">{{ $product->sell_value }} VND</span>
            @else
             <span class="new-price">{{ $product->sell_value }} VND</span>
            @endif
          </div>
          <div class="pro-details-quality">
            <span>Quantity:</span>
            <div class="cart-plus-minus">
              <input class="cart-plus-minus-box quantity update-cart" type="text" name="qtybutton" value="1">
            </div>
          </div>
          <div class="product-details-meta">
            <ul>
              <li><span>Category:</span> <a href="#">{{ $product->category->name }}</a></li>
            </ul>
          </div>
          <div class="pro-details-action-wrap">
            <div data-id="{{ $product->id }}" class="pro-details-add-to-cart">
              <a class="add-to-cart" title="Add to Cart">Add To Cart</a>
            </div>
            <div class="pro-details-action">
              <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
              <a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>
              <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
              <div class="product-dec-social">
                <a class="facebook" title="Facebook" href="#"><i class="icon-social-facebook"></i></a>
                <a class="twitter" title="Twitter" href="#"><i class="icon-social-twitter"></i></a>
                <a class="instagram" title="Instagram" href="#"><i class="icon-social-instagram"></i></a>
                <a class="pinterest" title="Pinterest" href="#"><i class="icon-social-pinterest"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="description-review-wrapper pb-110">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="dec-review-topbar nav mb-45">
          <a class="active" data-toggle="tab" href="#des-details1">Description</a>
          <a data-toggle="tab" href="#des-details2">Specification</a>
          <a data-toggle="tab" href="#des-details3">Meterials </a>
          <a data-toggle="tab" href="#des-details4">Reviews and Ratting </a>
        </div>
        <div class="tab-content dec-review-bottom">
          <div id="des-details1" class="tab-pane active">
            <div class="description-wrap">
              <p>Crafted in premium watch quality, fenix Chronos is the first Garmin timepiece to combine a durable
                metal case with integrated performance GPS to support navigation and sport. In the tradition of classic
                tool watches it features a tough design and a set of modern meaningful tools.</p>
              <p> advanced performance metrics for endurance sports, Garmin quality navigation features and smart
                notifications. In fenix Chronos top-tier performance meets sophisticated design in a highly evolved
                timepiece that fits your style anywhere, anytime. Solid brushed 316L stainless steel case with brushed
                stainless steel bezel and integrated EXOTM antenna for GPS + GLONASS support. High-strength scratch
                resistant sapphire crystal. Brown vintage leather strap with hand-sewn contrast stitching and nubuck
                inner lining and quick release mechanism.</p>
            </div>
          </div>
          <div id="des-details2" class="tab-pane">
            <div class="specification-wrap table-responsive">
              <table>
                <tbody>
                  <tr>
                    <td class="title width1">Name</td>
                    <td>Salwar Kameez</td>
                  </tr>
                  <tr>
                    <td class="title width1">SKU</td>
                    <td>0x48e2c</td>
                  </tr>
                  <tr>
                    <td class="title width1">Models</td>
                    <td>FX 829 v1</td>
                  </tr>
                  <tr>
                    <td class="title width1">Categories</td>
                    <td>Digital Print</td>
                  </tr>
                  <tr>
                    <td class="title width1">Size</td>
                    <td>60’’ x 40’’</td>
                  </tr>
                  <tr>
                    <td class="title width1">Brand </td>
                    <td>Individual Collections</td>
                  </tr>
                  <tr>
                    <td class="title width1">Color</td>
                    <td>Black, White</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div id="des-details3" class="tab-pane">
            <div class="specification-wrap table-responsive">
              <table>
                <tbody>
                  <tr>
                    <td class="title width1">Top</td>
                    <td>Cotton Digital Print Chain Stitch Embroidery Work</td>
                  </tr>
                  <tr>
                    <td class="title width1">Bottom</td>
                    <td>Cotton Cambric</td>
                  </tr>
                  <tr>
                    <td class="title width1">Dupatta</td>
                    <td>Digital Printed Cotton Malmal With Chain Stitch</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div id="des-details4" class="tab-pane">
            <div class="review-wrapper">
              <h2>{{ count($rating) }} reviews for {{ $product->title }}</h2>
              @foreach ($rating as $item)
              <div class="single-review">
                <div class="review-img">
                  <img src="{{ $item->user->avatar}}" alt="" class="rounded-circle" style="width:5rem">
                </div>
                <div class="review-content">
                  <div class="review-top-wrap">
                    <div class="review-name">
                      <h5><span>{{ $item->user->username}}</span> {{date('d-m-Y', strtotime($item->created_at)) }}</h5>
                    </div>
                  </div>
                  <div class="review-rating">
                    @for ($i = 1; $i <= $item->rate; $i++)
                      <i class="text-warning icon_star"></i>
                      @endfor
                      @for ($i = 5; $i > $item->rate; $i--)
                      <i class="text-muted icon_star"></i>
                      @endfor
                  </div>
                  <p>{{ $item->review}}</p>
                </div>
              </div>
              @endforeach
            </div>
            <div class="ratting-form-wrapper">
              <h3>Rating and Review</h3>
              <div class="ratting-form">
                {{-- <form action="#"> --}}
                  <div class="row">
                    <div class="col-lg-12">
                      <div id="full-stars">
                        <div class="rating-group">
                          <input disabled checked class="rating__input rating__input--none" name="rating3"
                            id="rating3-none" value="0" type="radio">
                          <label aria-label="1 star" class="rating__label" for="rating3-1">
                            <i class="rating__icon rating__icon--star fa fa-star"></i>
                          </label>
                          <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                          <label aria-label="2 stars" class="rating__label" for="rating3-2">
                            <i class="rating__icon rating__icon--star fa fa-star"></i>
                          </label>
                          <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                          <label aria-label="3 stars" class="rating__label" for="rating3-3">
                            <i class="rating__icon rating__icon--star fa fa-star"></i>
                          </label>
                          <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                          <label aria-label="4 stars" class="rating__label" for="rating3-4">
                            <i class="rating__icon rating__icon--star fa fa-star"></i>
                          </label>
                          <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                          <label aria-label="5 stars" class="rating__label" for="rating3-5">
                            <i class="rating__icon rating__icon--star fa fa-star"></i>
                          </label>
                          <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="rating-form-style mb-20">
                        <label>Your review <span>*</span></label>
                        <textarea id="yourReivew" name="Your Review"></textarea>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-submit">
                        @if ($availableRate ===true)
                          <input type="submit" id="btn-rating" value="Submit">
                        @endif
                      </div>
                    </div>
                  </div>
                  {{--
                </form> --}}
              </div>
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
<script src="{{ asset('../../js/product/rating.js') }}"></script>
@endsection