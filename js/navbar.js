
$( document ).ready(function(){
	activateMenuBtn();
	// console.log($( window ).width());


	$( window ).resize(function() {
  		if(!$('#mobile_btn').is(":visible") &&
  			$(window).scrollTop() < 50){
      	
    	$('#logoImg').css('width', '300px');      
    	
      }else{
      	$('#logoImg').css('width', '200px');
      }

	});

	//removes logo when scrolling
	$(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      
      if(!$('#mobile_btn').is(":visible")){
      	
      	if ($(window).scrollTop() > 50) {
    	$('#logoImg').css('width', '200px');
      
    	}
	    
	    if ($(window).scrollTop() < 50) {      
	    	$('#logoImg').css('width', '300px');      
	    }

      }else{
      	$('#logoImg').css('width', '200px');
      }
    
  });

});



function activateMenuBtn(){
	$("#menuBar").on('click', function(e){
	    $("#mobile_menu").slideDown("swing");
	    $("#mobile_btn").html('<i id="cancel_btn" class="fa fa-times fa-2x" aria-hidden="true"></i>');
	    activateCancelBtn();
	    e.stopImmediatePropagation();
	});
}

function activateCancelBtn(){
	$("#cancel_btn").on('click', function(e){
	    $("#mobile_menu").slideUp();
	    $("#mobile_btn").html('<i id="menuBar" class="fa fa-bars fa-2x" aria-hidden="true"></i>');
	    activateMenuBtn();
	    e.stopImmediatePropagation();
	});
}
