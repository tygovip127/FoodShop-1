
  // function to add a product to cart
  $(".add-to-cart").click(function (event) {
    event.preventDefault();
    var element = $(this);
    var id= element.parent().attr("data-id")
    var host = window.location.host;
  
    $.ajax({
      url:  `http://${host}/cart/add-to-cart/${id}`,
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

  // function clear all cart item
  $("#cart-clear").click(function(e){
    e.preventDefault();
    var host = window.location.host;
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: `http://${host}/cart/remove-all`,
      method: "delete",
      success: function (response) {
        $("#tbody tr").remove();
      }
    });
  })

  // function to clear a cart item
  $(".remove-cart-item").click(function (e) {
    e.preventDefault();
    var element = $(this);
    var host = window.location.host;

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    if(confirm("Are you sure want to remove?")) {
      $.ajax({
          url: `http://${host}/cart/remove-cart-item`,
          method: "DELETE",
          data: {
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

  // function to update cart item
  $(".update-cart").change(function (e) {
    e.preventDefault();
    var element = $(this);
    var host = window.location.host;
    console.log(element);

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: `http://${host}/cart/update`,
      method: "put",
      data: {
          id: element.parents("tr").attr("data-id"), 
          quantity: element.parents("tr").find(".quantity").val()
      },
      success: function (response) {

      }
    });
  });