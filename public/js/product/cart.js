
  $(".add-to-cart").click(function (event) {
    event.preventDefault();
    var element = $(this);
    var id= element.parent().attr("data-id")

    $.ajax({
      url:  `http://localhost:8000/cart/add-to-cart/${id}`,
      method: 'GET',
      headers: { 'Content-Type': 'application/json' },
      success: function (response) {
        var cart=response;

        // increase the number items of cart
        var numberCartTtem = document.getElementById("number-cart-time");
        numberCartTtem.innerText= parseInt(numberCartTtem.innerText)+1;

        // update the list of items in cart
        $("#list-cart-item li").remove();
        console.log(response)
        var subTotal=0;
        cart.forEach(function(item){
          subTotal+=parseFloat(item.data.quantity)*parseFloat(item.data.price);
          var li_item=`
            <li class="single-product-cart">
                <div class="cart-img">
                  <a href="#"><img src="{{ asset(${item.data.image}) }}" alt=""></a>
                </div>
                <div class="cart-title">
                  <h4><a href="#">${item.data.title}</a></h4>
                  <span> ${item.data.quantity} x ${item.data.price} VND</span>
                </div>
                <div class="cart-delete">
                  <a href="#">×</a>
                </div>
            </li>
          `
          $("#list-cart-item").append(li_item);
        })

        // update subTotal
        document.getElementById("subTotal").innerText=subTotal.toFixed(1)+" VND";
      }
    })
  })