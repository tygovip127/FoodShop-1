

$("#province").change(function(e){
  e.preventDefault();
  var id = $("#province").val();
  $("#district option").remove();
  $("#ward option").remove();
  var host =window.location.host;
  $.ajax({
    type: "GET",
    url: `http://${host}/api/address/districts/${id}`,
    headers: { 'Content-Type': 'application/json' },
    success: function(response) {
      console.log(response);
      $.each( response, function(id, item) {
        $('#district').append($('<option>', {value:item.id, text:item.name}));
      });
    }
  })
});

$('#district').change(function (e){
  e.preventDefault();
  var id = $("#district").val();
  var host =window.location.host;
  $("#ward option").remove();

  $.ajax({
    type: "GET",
    url: `http://${host}/api/address/wards/${id}`,
    headers: { 'Content-Type': 'application/json' },
    success: function(response) {
      console.log(response);
      $.each( response, function(id,item) {
        $('#ward').append($('<option>', {value:item.id, text:item.name}));
      });
    }
  })
})