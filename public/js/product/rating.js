var host = window.location.host;

$("#btn-rating").click((event)=>{
  var url = document.URL
  var product_id = url.split("/").pop();
  var ratings = document.querySelectorAll('.rating__input')
  var review = document.getElementById('yourReivew')

  var rate=0;
  for(i=0; i<ratings.length; i++){
    if(ratings[i].checked==true){
      rate = ratings[i].value
    }
  }
  console.log(product_id)

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: `http://${host}/rating`,
    method: 'post',
    data: {
      product_id: product_id,
      rate: rate,
      review: review.value
    },
    success: function(response) {
      console.log(response)
      var new_rating = response.new_rating
      // render rating start
      var html_rating_star=`<div class="review-rating">`
      for(i=1; i<=rate; i++){
        html_rating_star+=' <i class="text-warning icon_star"></i>'
      }
      for(i=5; i>rate; i--){
        html_rating_star+=' <i class="text-muted icon_star"></i>'
      }
      html_rating_star+="</div>"

      // render review
      var newReivew=`
        <div class="single-review">
        <div class="review-img">
          <img src="${response.user.avatar}" alt="">
        </div>
        <div class="review-content">
          <div class="review-top-wrap">
            <div class="review-name">
              <h5><span>${response.user.username}</span> just now</h5>
            </div>
          </div>
         `
         +html_rating_star+
         `
          <p>${new_rating.review}</p>
        </div>
      </div>
      `
      $(".review-wrapper").append(newReivew)
    },

    }) 
    // event.preventDefault()
})
