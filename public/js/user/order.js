
var host = window.location.host;

$("#order").click(function(){

  var address= document.getElementById("address-billing-1").innerText
  address+= document.getElementById("address-billing-2").innerText

  var total= document.getElementById("total-value").innerText
  var phone = $("#phone").val();

  console.log(address,total, phone)

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: `http://${host}/order/store`,
    method: "post",
    data: {
      'address': address,
      'phone': phone,
      'total': total,
    },
    success: function(response) {
      var $success =document.getElementById('response')
      $success.innerHTML="<div class='alert alert-success'>Order products successfully!</div>"
    },
    error: function(error) {
      var $error= document.getElementById('response')
      $error.innerHTML="<div class='alert alert-danger'>Error! Please try again!!</div>"
      console.log(error.getMessage())
    }
  })
})