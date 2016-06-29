var $ = jQuery;
// Topmenu <ul> replace to <select>
	
jQuery(document).ready(function($) {


// style Select, Radio, Checkbox
	if ($("select").hasClass("select_styled")) {
		var deviceAgent = navigator.userAgent.toLowerCase();
		var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);
		if (agentID) {
			cuSel({changedEl: ".select_styled", visRows: 8, scrollArrows: true});	 // Add arrows Up/Down for iPad/iPhone
		} else {
			cuSel({changedEl: ".select_styled", visRows: 8, scrollArrows: true});
		}		
	}
	
	  
});

function jsUpdateCart(){
  var parameter_string = '';
  allNodes = $(".process");
  for(i = 0; i < allNodes.length; i++) {
  	var tempid = allNodes[i].id;
    var temp = new Array;
    temp = tempid.split("_");
 	var real_id = temp[2];
 	var real_value = allNodes[i].value;
    parameter_string += real_id +':'+real_value+',';
  }

  var params = 'ids='+parameter_string;
  
   $.ajax({
   type: "POST",
   url: "../webshop/ajax_cart",
   data: params,
   success: function( r ) {
    $('#ajax_msg').html( r );
    location.reload( true );
  }
 });
  
}



function jsRemoveProduct(id){
  var params = 'id='+id;
  $.ajax({
   type: "POST",
   url: "../webshop/ajax_cart_remove",
   data: params,
   success: function( r ) {
    //$('#ajax_msg').html( r );
    location.reload( true );
  }
 });
}
