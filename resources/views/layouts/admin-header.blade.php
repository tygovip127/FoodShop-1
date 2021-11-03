<nav class="navbar navbar-expand-lg main-navbar">
  <form>
    <ul class="navbar-nav mr-3">
      <li><a href="" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>

  <div class="container">
    <div class="header-large-device">
      <div class="header-bottom">
        <div class="row align-items-center">
          <div class="col-xl-2 col-lg-2">
            <div class="logo">
              <a href="/"><img src="{{ asset('images/logo/logo.png') }}" alt="logo"></a>
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
                  <form action="#">
                    <input placeholder="Search products…" type="text">
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
                        <li><a href="/account">My Account </a></li>
                        <li><a href="/logout">Logout </a></li>
                        <li><a href="/dashboard">Admin </a></li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>

              <div class="same-style-2">
                <a href="/wishlist"><i class="icon-heart"></i><span class="pro-count red">03</span></a>
              </div>
              <div class="same-style-2 header-cart">
                <a class="cart-active" href="#">
                  <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
                </a>
              </div>
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
          <a href="index.html">
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
            <a href="/wishlist"><i class="icon-heart"></i><span class="pro-count red">03</span></a>
          </div>
          <div class="same-style-2 header-cart">
            <a class="cart-active" href="#">
              <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
            </a>
          </div>
          <div class="same-style-2 main-menu-icon">
            <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>