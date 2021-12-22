<nav class="navbar navbar-expand-lg main-navbar">
  <form>
    <ul class="navbar-nav mr-3">
      <li><a href="" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars text-dark"></i></a></li>
    </ul>
  </form>
  <div class="col-xl-2 col-lg-3 ml-auto">
    <div class="header-action header-action-flex header-action-mrg-right mr-5">
      <div class="same-style-2 header-search-1 pt-1">
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
              <a href="/login-register"><img src="{{ Auth::user()->avatar }}" alt="" class="obf-cover avatar-mini rounded-circle"></a>
              <ul class="sub-menu-style">
                <li><a href="/profile">{{ (Auth::user() && Auth::user()->fullname)? Auth::user()->fullname: "My account" }} </a></li>
                <li><a href="/logout">Logout </a></li>
                <li><a href="/admin">Admin </a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
      <div class="same-style-2 pt-1 mr-5">
        <a href="/admin/transactions"><i class="icon-bell"></i><span class="pro-count red">{{ $transaction_notification }}</span></a>
      </div>
    </div>
  </div>
</nav>