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
                  <td>
                    <a href="{{ route('product.show',$id) }}"><img src="{{ asset($item['image']) }}" class="img-col"
                        alt=""></a>
                  </td>
                  <td class="product-name"><a href="{{ route('product.show',$id) }}">{{ $item['title'] }}</a></td>
                  <td class="product-price-cart" id={{ "price_" .$id }} value="{{ $item['price'] }}"><span
                      class="amount">{{ $item['price'] }}</span></td>
                  <td class="product-quantity pro-details-quality">
                    <div class="cart-plus-minus">
                      <input class="cart-plus-minus-box quantity update-cart" type="text" name="qtybutton"
                        value="{{ $item['quantity'] }}">
                    </div>
                  </td>
                  <td class="product-subtotal" id="{{ "subTotal_".$id }}">{{ $item['quantity']*$item['price'] }} VND
                  </td>
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
                  <a href="{{ route('order.index') }}" id="">Order</a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('../../js/product/cart.js') }}"></script>
<script src="{{ asset('../../js/account/address.js') }}"></script>
@endsection