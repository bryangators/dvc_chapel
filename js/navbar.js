var nav_events = new Array();

nav_events[0] = ['The Worship', 1];
nav_events[1] = ['The Choice', 2];

$( document ).ready(function(){
	activateMenuBtn();
	// console.log($( window ).width());
	//makes dropdown menu for events
	fillEventLinks();

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

//function will make event links for dropdown box
function fillEventLinks(){
	var links_html = '';

	for (var i = 0; i < nav_events.length; i++ ){
		links_html += formatEventLinkHTML(nav_events[i]);
	}

	$('#event_links').html(links_html);

}

//formats event links with html
function formatEventLinkHTML(event){
	return '<a href="events.php#' + event[1] + '">' + event[0] + '</a>'
}