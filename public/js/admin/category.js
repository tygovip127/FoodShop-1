
var lastIndex = document.getElementById('last-index');
var index= parseInt(lastIndex.innerText);
var host= window.location.host;

// funtion to add a category
$('#save-category').click(function(e) {
  e.preventDefault();
  var element = $(this);
  var category= document.getElementById("category");

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: `http://${host}/admin/category`,
    method: 'POST',
    data: { 
      category: category.value,
    },
    success: function (response) {
      console.log(response)
      var category = response;
      var newItem= `
        <tr>
          <td>${++index}</td>
          <td>${category.id }</td>
          <td>${category.name }</td>
          <td>
            <button data-id="${category.id}" class="btn-danger m-auto delete-category">Delete</button>
          </td>
        </tr>
        `
      $("#category-list").append(newItem);
    }
  })

})

//  function to delete a category
$(".delete-category").click(function(e){
  e.preventDefault();
  var element = $(this);
  var id = element.attr("data-id");
  console.log(id);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: `http://${host}/admin/category/${id}`,
    method: 'DELETE',
    success: function (response) {
      element.parents('tr').remove();
      --index;
    }
  })
})