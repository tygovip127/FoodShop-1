@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('../../css/product.css')}}">
@endsection
@section('title','Food Shop VKU | Product Detail')

@section('content')
<x-breadcrumb currentPage=" Product-Detail"></x-breadcrumb>
<div class="product-details-area pt-50 pb-115">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="product-details-tab">
          <div class="pro-dec-big-img-slider">
            <div class="easyzoom-style">
              <div class="easyzoom easyzoom--overlay">
                <a href="{{ asset($product->feature_image_path) }}">{{--  image full scrreen--}}
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
                <i class="icon_star"></i>
                <i class="icon_star"></i>
                <i class="icon_star"></i>
                <i class="icon_star"></i>
                <i class="icon_star"></i>
              </div>
              <div class="product-digit">
                <span>5.0</span>
              </div>
            </div>
            <div class="product-review-order">
              <span>0 Reviews</span>
              <span>{{ count($product->orders) }} Orders</span>
            </div>
          </div>
          <p>{{ strip_tags($product->subtitle) }}</p>
          <div class="pro-details-price">
            {{-- <span class="new-price">$75.72</span>
            <span class="old-price">$95.72</span> --}}
            <span class="new-price">{{ $product->sell_value }} VND</span>
          </div>
          {{-- <div class="pro-details-color-wrap">
            <span>Color:</span>
            <div class="pro-details-color-content">
              <ul>
                <li><a class="dolly" href="#">dolly</a></li>
                <li><a class="white" href="#">white</a></li>
                <li><a class="azalea" href="#">azalea</a></li>
                <li><a class="peach-orange" href="#">Orange</a></li>
                <li><a class="mona-lisa active" href="#">lisa</a></li>
                <li><a class="cupid" href="#">cupid</a></li>
              </ul>
            </div>
          </div> --}}
          {{-- <div class="pro-details-size">
            <span>Size:</span>
            <div class="pro-details-size-content">
              <ul>
                <li><a href="#">XS</a></li>
                <li><a href="#">S</a></li>
                <li><a href="#">M</a></li>
                <li><a href="#">L</a></li>
                <li><a href="#">XL</a></li>
              </ul>
            </div>
          </div> --}}
          <div class="pro-details-quality">
            <span>Quantity:</span>
            <div class="cart-plus-minus">
              <input class="cart-plus-minus-box quantity update-cart" type="text" name="qtybutton" value="1">
            </div>
          </div>
          <div class="product-details-meta">
            <ul>
              <li><span>Category:</span> <a href="#">{{ $product->category->name }}</a></li>
              {{-- <li><span>Tag: </span> <a href="#">Fashion,</a> <a href="#">Mentone</a> , <a href="#">Texas</a></li> --}}
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
              <h2>1 review for Sleeve Button Cowl Neck</h2>
              <div class="single-review">
                <div class="review-img">
                  <img src="assets/images/product-details/client-1.png" alt="">
                </div>
                <div class="review-content">
                  <div class="review-top-wrap">
                    <div class="review-name">
                      <h5><span>John Snow</span> - March 14, 2019</h5>
                    </div>
                    <div class="review-rating">
                      <i class="yellow icon_star"></i>
                      <i class="yellow icon_star"></i>
                      <i class="yellow icon_star"></i>
                      <i class="yellow icon_star"></i>
                      <i class="yellow icon_star"></i>
                    </div>
                  </div>
                  <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna molestie a. Proin ac ex
                    maximus, ultrices justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula
                    lacus scelerisque</p>
                </div>
              </div>
            </div>
            <div class="ratting-form-wrapper">
              <span>Add a Review</span>
              <p>Your email address will not be published. Required fields are marked <span>*</span></p>
              <div class="ratting-form">
                <form action="#">
                  <div class="row">
                    <div class="col-lg-6 col-md-6">
                      <div class="rating-form-style mb-20">
                        <label>Name <span>*</span></label>
                        <input type="text">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="rating-form-style mb-20">
                        <label>Email <span>*</span></label>
                        <input type="email">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="star-box-wrap">
                        <div class="single-ratting-star">
                          <a href="#"><i class="icon_star"></i></a>
                        </div>
                        <div class="single-ratting-star">
                          <a href="#"><i class="icon_star"></i></a>
                          <a href="#"><i class="icon_star"></i></a>
                        </div>
                        <div class="single-ratting-star">
                          <a href="#"><i class="icon_star"></i></a>
                          <a href="#"><i class="icon_star"></i></a>
                          <a href="#"><i class="icon_star"></i></a>
                        </div>
                        <div class="single-ratting-star">
                          <a href="#"><i class="icon_star"></i></a>
                          <a href="#"><i class="icon_star"></i></a>
                          <a href="#"><i class="icon_star"></i></a>
                          <a href="#"><i class="icon_star"></i></a>
                        </div>
                        <div class="single-ratting-star">
                          <a href="#"><i class="icon_star"></i></a>
                          <a href="#"><i class="icon_star"></i></a>
                          <a href="#"><i class="icon_star"></i></a>
                          <a href="#"><i class="icon_star"></i></a>
                          <a href="#"><i class="icon_star"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="rating-form-style mb-20">
                        <label>Your review <span>*</span></label>
                        <textarea name="Your Review"></textarea>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-submit">
                        <input type="submit" value="Submit">
                      </div>
                    </div>
                  </div>
                </form>
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
@endsection