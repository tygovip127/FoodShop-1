<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="single-product-wrap mb-35">
    <div class="product-img product-img-zoom mb-20">
      <a href="product-details.html">
        <img src="{{ asset(''.$image.'') }}">
      </a>
      @if ($discount !=0 || $discount != null)
        <span class="pro-badge left bg-red">-{{ $discount }}%</span>
      @endif
      <div class="product-action-wrap">
        <div class="product-action-left">
          <button><i class="icon-basket-loaded"></i>Add to Cart</button>
        </div>
        <div class="product-action-right tooltip-style">
          <button data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick
              View</span></button>
          <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
        </div>
      </div>
    </div>
    <div class="product-content-wrap">
      <div class="product-content-left">
        <h4><a href="product-details.html">{{ $title }}</a></h4>
        <div class="product-price">
          @if ($discount !=0 || $discount != null)
            <span class="new-price">${{ $new_price }}</span>
            <span class="old-price">${{ $old_price }}</span>
          @else
            <span>${{ $old_price }}</span>
          @endif
        </div>
      </div>
      <div class="product-content-right tooltip-style">
        <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
      </div>
    </div>
  </div>
</div>