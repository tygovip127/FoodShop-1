@extends('layouts.app')
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
              <tbody>
                @if (session('cart'))
                @foreach (session('cart') as $id => $item)
                <tr data-id="{{ $id }}">
                  <td class="product-thumbnail">
                    <a href="{{ route('product.show',$id) }}"><img src="{{ asset($item['image']) }}" alt=""></a>
                  </td>
                  <td class="product-name"><a href="{{ route('product.show',$id) }}">{{ $item['title'] }}</a></td>
                  <td class="product-price-cart" id={{ "price_".$id }} value="{{ $item['price'] }}"><span class="amount">{{ $item['price'] }}</span></td>
                  <td class="product-quantity pro-details-quality">
                    <div class="cart-plus-minus">
                      <input class="cart-plus-minus-box quantity update-cart" type="text" name="qtybutton" value="{{ $item['quantity'] }}">
                    </div>
                  </td>
                  <td class="product-subtotal" id="{{ "subTotal_".$id }}">{{ $item['quantity']*$item['price'] }}</td>
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
                  <button>Update Cart</button>
                  <a href="#" class="clear">Clear Cart</a>
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
                      * Country
                    </label>
                    <select class="email s-email s-wid">
                      <option>Bangladesh</option>
                      <option>Albania</option>
                      <option>Åland Islands</option>
                      <option>Afghanistan</option>
                      <option>Belgium</option>
                    </select>
                  </div>
                  <div class="tax-select">
                    <label>
                      * Region / State
                    </label>
                    <select class="email s-email s-wid">
                      <option>Bangladesh</option>
                      <option>Albania</option>
                      <option>Åland Islands</option>
                      <option>Afghanistan</option>
                      <option>Belgium</option>
                    </select>
                  </div>
                  <div class="tax-select">
                    <label>
                      * Zip/Postal Code
                    </label>
                    <input type="text">
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
  <script type="text/javascript">

    $(".remove-cart-item").click(function (e) {
      e.preventDefault();
      var element = $(this);
      if(confirm("Are you sure want to remove?")) {
          $.ajax({
              url: '{{ route('removeCartItem') }}',
              method: "DELETE",
              data: {
                  _token: '{{ csrf_token() }}', 
                  id: element.parents("tr").attr("data-id")
              },
              success: function (response) {
                var numberCartTtem = document.getElementById("number-cart-time");
        numberCartTtem.innerText= parseInt(numberCartTtem.innerText)-1;
                element.parents('tr').remove();
              }
          });
      }
    });
    
     $(".update-cart").change(function (e) {
        e.preventDefault();
        var element = $(this);
        console.log(element);
        $.ajax({
            url: '{{ route('updateCart') }}',
            method: "put",
            data: {
                _token: '{{ csrf_token() }}', 
                id: element.parents("tr").attr("data-id"), 
                quantity: element.parents("tr").find(".quantity").val()
            },
            success: function (response) {
              e.preventDefault();
            }
        });
    });
  </script>
@endsection