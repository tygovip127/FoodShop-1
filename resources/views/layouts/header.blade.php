<header class="header-area">
  <div class="container">
    <div class="header-large-device">
      <div class="header-bottom">
        <div class="row align-items-center">
          <div class="col-xl-2 col-lg-2">
            <div class="logo">
              <a href="/"><img src="{{ asset('images/logo/logo.png') }}" alt="logo"></a>
            </div>
          </div>
          <div class="col-xl-8 col-lg-7">
            <div class="main-menu main-menu-padding-1 main-menu-lh-1">
              <nav>
                <ul>
                  <li>
                    <a href="/">HOME </a>
                  </li>
                  <li>
                    <a href="/products">SHOP </a>
                  </li>
                  <li>
                    <a href="#">PAGES </a>
                  </li>
                  <li>
                    <a href="blog.html">BLOG </a>
                  </li>
                  <li><a href="contact.html">CONTACT </a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3">
            <div class="header-action header-action-flex header-action-mrg-right">
              <div class="same-style-2 header-search-1">
                <a class="search-toggle" href="#">
                  <i class="icon-magnifier s-open"></i>
                  <i class="icon_close s-close"></i>
                </a>
                <div class="search-wrap-1">
                  <form action="{{ route('search') }}">
                    <input name="keyword" placeholder="Search products…" type="text">
                    <button class="button-search"><i class="icon-magnifier"></i></button>
                  </form>
                </div>
              </div>
              <div class="same-style-2 main-menu">
                <nav>
                  <ul>
                    <li>
                      <a href="/login-register"><i class="icon-user"></i></a>
                      <ul class="sub-menu-style">
                        <li><a href="/profile">{{ (Auth::user() && Auth::user()->fullname)? Auth::user()->fullname: "My account" }} </a></li>
                        <li><a href="/logout">Logout </a></li>
                        @can('access_admin')
                        <li><a href="/admin">Admin </a></li>
                        @endcan
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
              <div class="same-style-2 header-cart">
                <a href="#" class="cart-active">
                  <i class="icon-basket-loaded"></i><span class="pro-count red" id="number-cart-time">{{ session('cart')? count(session('cart')): 0 }}</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-small-device small-device-ptb-1">
      <div class="row align-items-center">
        <div class="col-5">
          <div class="mobile-logo">
            <a href="/">
              <img alt="" src="{{ asset('images/logo/logo.png') }}">
            </a>
          </div>
        </div>
        <div class="col-7">
          <div class="header-action header-action-flex">
            <div class="same-style-2">
              <a href="login-register.html"><i class="icon-user"></i></a>
            </div>
            <div class="same-style-2">
              <a href="#" class="cart-active"><i class="icon-heart"></i><span class="pro-count red">03</span></a>
            </div>
            <div class="same-style-2 header-cart">
              <a href="/cart">
                <i class="icon-basket-loaded"></i><span class="pro-count red">{{ session('cart')? count(session('cart')): 0 }}</span>
              </a>
            </div>
            <div class="same-style-2 main-menu-icon">
              <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- mini cart start -->
<div class="sidebar-cart-active">
  <div class="sidebar-cart-all">
    <a class="cart-close" href="#"><i class="icon_close"></i></a>
    <div class="cart-content">
      <h3>Shopping Cart</h3>
      <ul id="list-cart-item">
        @if (session('cart'))
        @foreach (session('cart') as $id => $item)
        <li class="single-product-cart">
          <div class="cart-img">
            <a href="{{ route('product.show',$id) }}"><img src="{{ asset($item['image']) }}" alt=""></a>
          </div>
          <div class="cart-title">
            <h4><a href="{{ route('product.show',$id) }}">{{ $item['title'] }}</a></h4>
            <span> {{ $item['quantity'] ." x ". $item['price'] }} VND</span>
          </div>
          <div class="cart-delete">
            <a href="#">×</a>
          </div>
        </li>
        @endforeach
        @endif
      </ul>
      <div class="cart-total">
        @php
        $subTotal=0;
        @endphp
        @if (session('cart') )
        @foreach (session('cart') as $id => $item)
        @php
        $subTotal+= $item['quantity']*$item['price'];
        @endphp
        @endforeach
        @endif
        <h4>Subtotal: <span id="subTotal">{{ $subTotal  }} VND</span></h4>
      </div>
      <div class="cart-checkout-btn">
        <a class="btn-hover cart-btn-style" href="/cart">view cart</a>
        <a class="no-mrg btn-hover cart-btn-style" href="checkout.html">checkout</a>
      </div>
    </div>
  </div>
</div>

<!-- Mobile menu start -->
<div class="mobile-header-active mobile-header-wrapper-style">
  <div class="clickalbe-sidebar-wrap">
    <a class="sidebar-close"><i class="icon_close"></i></a>
    <div class="mobile-header-content-area">
      <div class="mobile-search mobile-header-padding-border-1">
        <form class="search-form" action="{{ route('search') }}">
          <input name="keyword" type="text" placeholder="Search here…">
          <button class="button-search"><i class="icon-magnifier"></i></button>
        </form>
      </div>
      <div class="mobile-menu-wrap mobile-header-padding-border-2">
        <!-- mobile menu start -->
        <nav>
          <ul class="mobile-menu">
            <li class="menu-item-has-children">
              <span class="menu-expand"><i></i></span><a href="/">Home</a>
            </li>
            <li class="menu-item-has-children ">
              <span class="menu-expand"><i></i></span><a href="/products">shop</a>
            </li>
            <li class="menu-item-has-children">
              <span class="menu-expand"><i></i></span><a href="#">Pages</a>
            </li>
            <li class="menu-item-has-children ">
              <span class="menu-expand"><i></i></span><a href="#">Blog</a>
            </li>
            <li><a href="contact.html">Contact us</a></li>
          </ul>
        </nav>
        <!-- mobile menu end -->
      </div>
      <div class="mobile-contact-info mobile-header-padding-border-4">
        <ul>
          <li><i class="icon-phone "></i> (+84) 359 9999</li>
          <li><i class="icon-envelope-open "></i> foodshopVKU@gmail.com</li>
          <li><i class="icon-home"></i> 470 Tran Dai Nghia, Ngu Hanh Son, Da Nang</li>
        </ul>
      </div>
      <div class="mobile-social-icon">
        <a class="facebook" href="#"><i class="icon-social-facebook"></i></a>
        <a class="twitter" href="#"><i class="icon-social-twitter"></i></a>
        <a class="pinterest" href="#"><i class="icon-social-pinterest"></i></a>
        <a class="instagram" href="#"><i class="icon-social-instagram"></i></a>
      </div>
    </div>
  </div>
</div>