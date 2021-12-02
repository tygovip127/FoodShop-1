var host = window.location.host;

$("#btn-filter").click((event) => {

    $perPage = $("#perPage").val();
    $new_products = $('#checkbox_new').is(":checked");
    $sale = $('#checkbox_sale').is(":checked");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: `http://${host}/products/filter`,
        method: 'GET',
        data: {
            perPage: $perPage,
            new_products: $new_products,
            sale: $sale,
        },
        success: function(response) {
            renderProducts(response)
            renderPagination(response)
        },

    })

})


$("#sort_price").change((event) => {

    $perPage = $("#perPage").val();
    $sort_price = $("#sort_price").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: `http://${host}/products/filter`,
        method: 'GET',
        data: {
            perPage: $perPage,
            sort_price: $sort_price
        },
        success: function(response) {
            renderProducts(response)
            renderPagination(response)
        },

    })

})

$("#perPage").change((event) => {

    $perPage = $("#perPage").val();
    var sliderrange = $('#slider-range')
    console.log(sliderrange.slider("values", 0))
    console.log(sliderrange.slider("values", 1))

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: `http://${host}/products/filter`,
        method: 'GET',
        data: {
            perPage: $perPage,
        },
        success: function(response) {
            renderProducts(response)
            renderPagination(response)
        },

    })

})

function renderProducts(response) {
    // render the products
    $shop1 = document.querySelector("#shop-1>div.row");
    var $no_products_html = (response.data.length != 0) ? "" : `<div class="error-box">
      <h1>Oops!</h1>
      <h3 class="h2 mb-3"><i class="fa fa-warning"></i>No products to show! Please try again!</h3>
    </div>`

    $test = $shop1.innerHTML = $no_products_html + response.data.join("")
    console.log($test)
}

function renderPagination(response) {
    $products = response.products;
    $pagination = document.getElementById("pagination")

    $pagination_html = `<li><a class="prev" href="${$products.prev_page_url}">
                        <i class="icon-arrow-left"></i></a>
                      </li>`
    var $pages = parseInt($products.total) / parseInt($products.per_page)
    $pages = Math.ceil($pages) //round up
    for (var i = 1; i <= $pages; i++) {
        $pagination_html += `<li>
                         <a href="${$products.path}?page=".${i}>${i}</a>
                        </li>`
    }
    $pagination_html += `<li><a class="prev" href="${$products.next_page_url}">
                        <i class="icon-arrow-right"></i></a>
                      </li>`

    $pagination.innerHTML = $pagination_html
}