
var host = window.location.host;

$("#check-all").click(function(event) {
  if(this.checked) {
    $(':checkbox').each(function() {
        this.checked = true;                        
    });
  } else {
      $(':checkbox').each(function() {
          this.checked = false;                       
      });
  }
})

$("#set-discount").click(function(event) {

  var $discount= document.getElementById("discount").value;
  
  //  get checkox elements
  var $checkAll= document.getElementById("check-all")
  $checkAll= $checkAll.checked? true:false
  var $checkItem= document.getElementsByName("select[]");
  
  // get id of products to set discount 
  var $productIDs=[]
  var $length= $checkItem.length
  for (var i=0; i<$length; i++){
    if($checkItem[i].checked){
     $productIDs.push($checkItem[i].value)
    }
  }
  
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: `http://${host}/admin/products/set-discount`,
    method: "post",
    data: {
      'discount': $discount,
      'checkAll': $checkAll,
      'productIDs': $productIDs,
    },
    success: function (response) {
      $status = response.status
      $alertHTML=document.getElementById('alert-result')
      if($status!=0 || $status!=null) {
       $alertHTML.innerHTML = `<div class="alert alert-success">Set discount successfully!</div>`
      }else{
       $alertHTML.innerHTML = `<div class="alert alert-danger">Set discount failed!</div>`
      }
    }
  });
})