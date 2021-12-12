@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('../../css/billing.css')}}">
@endsection
@section('title','Food Shop VKU | Order')
@section('content')
{{-- {{ dd($address) }} --}}
<x-breadcrumb currentPage="Order"></x-breadcrumb>
<div class="cart-main-area pt-50 pb-120">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="cart-tax">
          <div class="title-wrap">
            <h4 class="cart-bottom-title section-bg-gray">Confirm Delivery Address</h4>
          </div>
          <div class="tax-wrapper">
            <p>Enter your destination to get a shipping estimate.</p>
            <div class="tax-select-wrapper">
              <div class="tax-select">
                <label>
                  * Province
                </label>
                <select class="px-2 py-20" name="province" id="province">
                  @if (count($address)!=0)
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
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="col-lg-4 col-md-6">
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
      </div> --}}
      <div class="col-lg-8 col-md-12">
        <div class="your-order-area">
          <h3>Your order</h3>
          <div class="your-order-wrap gray-bg-4">
            <div class="your-order-info-wrap">
              <div class="your-order-info">
                <ul>
                  <li>Product <span>Total</span></li>
                </ul>
              </div>
              <div class="your-order-middle">
                <ul>
                  <?php $subTotal = 0;
                  $total = 0; ?>
                  @foreach ($items as $id =>$item)
                  <?php $subTotal += $item['quantity'] * $item['price'] ?>
                  <li>{{ $item['title'] }} x{{ $item['quantity'] }}
                    <span>{{ $item['quantity']*$item['price'] }} VND</span>
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="your-order-info order-subtotal">
                <ul>
                  <li>Subtotal <span>&nbsp;VND</span><span id="subTotalValue">{{ $subTotal }}</span></li>
                </ul>
              </div>
              <div class="your-order-info order-shipping">
                <ul>
                  <li>Customer
                    <p>{{ Auth::user()->fullname }}</p>
                  </li>
                </ul>
              </div>
              <div class="your-order-info order-shipping">
                <ul>
                  <li>Phone Number
                    <input type="text" id="phone" class="float-right col-sm-2" value={{ Auth::user()->phone }}>
                  </li>
                </ul>
              </div>
              <div class="your-order-info order-shipping">
                <ul>
                  <li>Delivery Address
                    <p id="address-billing-1">{{ count($address)!=0 ?$address[0]->name.", ".$address[1]->name."," : null }}</p>
                  </li>
                  <li>
                    <p id="address-billing-2">
                      {{ count($address)!=0 ? $address[2]->name.", " : null}} {{ Auth::user() ? Auth::user()->address: NULL }}
                    </p>
                  </li>
                </ul>
              </div>
              
              <!-- Display voucher select -->
              <div class="your-order-info order-subtotal">
                <ul>
                  <li>Voucher
                    <span>
                      <!-- Select voucher and then update totalValue -->
                      <select name="voucher_id" id="voucher_id" class="update-voucher">
                      @if(Auth::user()->vouchers)
                        <option value="">Apply voucher</option>
                        @foreach(Auth::user()->vouchers as $voucher)
                        <option value="{{ $voucher->id }}">{{ $voucher->discount . '%. ' . $voucher->name }} </option>
                        @endforeach
                      @else
                        <option value="">Empty</option>
                      @endif
                      </select>
                    </span>
                  </li>
                </ul>
              </div>
              <div class="your-order-info order-total">
                <ul>
                  <li>Total <span id="totalValue">{{ $subTotal }} VND</span></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="response">

          </div>
          <div class="Place-order col-sm-3">
            <a id="order">Order</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('../../js/account/address.js') }}"></script>
<script src="{{ asset('../../js/user/order.js') }}"></script>
@endsection