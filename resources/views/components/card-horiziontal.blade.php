<div class="shop-list-wrap mb-30">
    <div class="row">
      <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
        <div class="product-list-img">
          <a href="products/{{ $id }}">
            <img src="{{ asset(''.$image.'') }}" alt="Product Style">
          </a>
          <div class="product-list-quickview">
            <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i
                class="icon-size-fullscreen icons"></i></button>
          </div>
        </div>
      </div>
      <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
        <div class="shop-list-content">
          <h3><a href="products/{{ $id }}">{{ $name }}</a></h3>
          <div class="pro-list-price">
            @if ($discount !=0 || $discount != null)
            <span class="new-price">{{ $new_price }} VND</span>
            <span class="old-price">{{ $old_price }} VND</span>
            @else
            <span>{{ $old_price }} VND</span>
            @endif
          </div>
          <div class="product-list-rating-wrap">
            <div class="product-list-rating">
              <i class="icon_star"></i>
              <i class="icon_star"></i>
              <i class="icon_star"></i>
              <i class="icon_star gray"></i>
              <i class="icon_star gray"></i>
            </div>
            <span>(3)</span>
          </div>
          <p>{{ $description }}</p>
          <div class="product-list-action">
            <button title="Add To Cart"><i class="icon-basket-loaded"></i></button>
            <button title="Wishlist"><i class="icon-heart"></i></button>
            <button title="Compare"><i class="icon-refresh"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>