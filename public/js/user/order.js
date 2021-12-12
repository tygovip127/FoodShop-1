var host = window.location.host;

$("#order").click(function() {

    var address = document.getElementById("address-billing-1").innerText
    address += document.getElementById("address-billing-2").innerText

    var phone = $("#phone").val();
    var voucher_id = $('#voucher_id').val();

    console.log(address, phone)

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
            'voucher_id': voucher_id //send voucher_id
        },
        success: function(response) {
            var $success = document.getElementById('response')
            $success.innerHTML = "<div class='alert alert-success'>Order products successfully!</div>"
        },
        error: function(error) {
            var $error = document.getElementById('response')
            $error.innerHTML = "<div class='alert alert-danger'>Error! Please try again!!</div>"
            console.log(error.getMessage())
        }
    })
});

// function to update totalValue when change voucher
$(".update-voucher").change(function(e) {
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
        url: `http://${host}/order/update`,
        method: "put",
        data: {
            voucher_id: element.val()
        },
        success: function(response) {
            let totalValueDisplay = document.getElementById('totalValue');
            let totalValue = document.getElementById('total-value');
            let subTotal = document.getElementById('subTotalValue');
            let newTotalValue = parseInt(subTotal.innerText) - parseInt(subTotal.innerText) * response.voucher / 100;
            totalValueDisplay.innerText = newTotalValue + " VND";
            totalValue.innerText = newTotalValue;
        }
    });
});