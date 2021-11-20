@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('../../css/product.css')}}">
@endsection
@section('title','Food Shop VKU | Cart')

@section('content')

<x-breadcrumb currentPage="Cart"></x-breadcrumb>
<div class="cart-main-area pt-50 pb-120">
  <div class="container">
    <h3 class="cart-page-title">Your cart items</h3>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <form action="#">
          <div class="table-content table-responsive cart-table-content">
            <table>
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Until Price</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody id="tbody">
                @if (session('cart'))
                @foreach (session('cart') as $id => $item)
                <tr data-id="{{ $id }}">
                  <td >
                    <a href="{{ route('product.show',$id) }}"><img src="{{ asset($item['image']) }}" class="img-col" alt=""></a>
                  </td>
                  <td class="product-name"><a href="{{ route('product.show',$id) }}">{{ $item['title'] }}</a></td>
                  <td class="product-price-cart" id={{ "price_".$id }} value="{{ $item['price'] }}"><span class="amount">{{ $item['price'] }}</span></td>
                  <td class="product-quantity pro-details-quality">
                    <div class="cart-plus-minus">
                      <input class="cart-plus-minus-box quantity update-cart" type="text" name="qtybutton" value="{{ $item['quantity'] }}">
                    </div>
                  </td>
                  <td class="product-subtotal" id="{{ "subTotal_".$id }}">{{ $item['quantity']*$item['price'] }} VND</td>
                  <td class="product-remove">
                    <button class="remove-cart-item btn-danger"><i class="icon_close"></i></button>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="cart-shiping-update-wrapper">
                <div class="cart-shiping-update">
                  <a href="/products">Continue Shopping</a>
                </div>
                <div class="cart-clear">
                  <a href="#" id="cart-clear" class="clear">Clear Cart</a>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="cart-tax">
              <div class="title-wrap">
                <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
              </div>
              <div class="tax-wrapper">
                <p>Enter your destination to get a shipping estimate.</p>
                <div class="tax-select-wrapper">
                  <div class="tax-select">
                    <label>
                      * Province
                    </label>
                    <select class="px-2 py-20" name="province" id="province">
                      @if ($address)
                      <option value="{{ $address[0]->id }}">{{ $address[0]->name }}</option>
                      @else
                      <option value="0">-------- Select your province --------</option>
                      @endif
                      @foreach ( $provinces as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="tax-select">
                    <label>
                      * District 
                    </label>
                    <select name="district" id="district">
                      @if ($address)
                      <option value="{{ $address[1]->id }}">{{ $address[1]->name }}</option>
                      @else
                      <option value="0">-------- Select your district --------</option>
                      @endif
                    </select>
                  </div>
                  <div class="tax-select">
                    <label>
                      * Ward
                    </label>
                    <select name="ward" id="ward">
                      @if ($address)
                      <option value="{{ $address[2]->id }}">{{ $address[2]->name }}</option>
                      @else
                      <option value="0">-------- Select your ward --------</option>
                      @endif
                    </select>
                  </div>
                  <div class="tax-select">
                    <label>
                      * Street
                    </label>
                    <input type="text" name="street" id="street" value="{{ Auth::user() ? Auth::user()->address: NULL }}">
                  </div>
                  <button class="cart-btn-2" type="submit">Get A Quote</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="discount-code-wrapper">
              <div class="title-wrap">
                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
              </div>
              <div class="discount-code">
                <p>Enter your coupon code if you have one.</p>
                <form>
                  <input type="text" required="" name="name">
                  <button class="cart-btn-2" type="submit">Apply Coupon</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="grand-totall">
              <div class="title-wrap">
                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
              </div>
              <h5>Total products <span>$260.00</span></h5>
              <div class="total-shipping">
                <h5>Total shipping</h5>
                <ul>
                  <li><input type="checkbox"> Standard <span>$20.00</span></li>
                  <li><input type="checkbox"> Express <span>$30.00</span></li>
                </ul>
              </div>
              <h4 class="grand-totall-title">Grand Total <span>$260.00</span></h4>
              <a href="#">Proceed to Checkout</a>
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
  <script src="{{ asset('../../js/account/address.js') }}"></script>
@endsection