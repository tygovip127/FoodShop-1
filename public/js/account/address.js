

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

$('#ward').change(function(e) {
  e.preventDefault();
  $province = $('#province  option:selected').text()
  $district = $('#district option:selected').text()
  $ward = $('#ward  option:selected').text()
  $street = $('#street').val()
  document.getElementById('address-billing-1').innerText=$province+", "+ $district+", "
  document.getElementById('address-billing-2').innerText=$ward+", " +$street
})


$('#street').change(function(){
  $ward = $('#ward  option:selected').text()
  $street = $('#street').val()
  document.getElementById('address-billing-2').innerText=$ward+", " +$street
});