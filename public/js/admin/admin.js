var host= window.location.host;

//delete product
function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }

                },
                error: function(data) {

                }
            })

        }
    })
}

$(function() {
    $(document).on('click', '.action_delete', actionDelete);
});

//delete image from update product
function actionDeleteImage(event) {
    event.preventDefault();
    let that = $(this);
    that.parent().parent().parent().remove();
}

$(function() {
    $(document).on('click', '.action_delete_image', actionDeleteImage);
});

$(".order-detail").click(function(event) {
    console.log($(this))
    // admin/transactions/{transaction} 
    var id=  $(this).attr("data-id")

    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
        url: `http://${host}/admin/transactions/${id}`,
        method: 'GET',

        success: function (response) {
            console.log(response);
            var tbody_detail="";
            response.forEach(function (order){
                tbody_detail +=`
                <tr>
                    <td>${order.id}</td>
                    <td>${order.product.title}</td>
                    <td>${order.quantity}</td>
                    <td>${order.price}</td>
                    <td>${order.price*order.quantity}</td>
                </tr>
                `
            })
            document.getElementById("tbody-detail").innerHTML=tbody_detail
        }
    })

    $('#call-modal').trigger('click');
})