

$( document ).ready(function(){
	activateMenuBtn();
	// console.log($( window ).width());
	//makes dropdown menu for events
	ajaxNavEvents();

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
function fillEventLinks(events){
	var links_html = '';

	if(events.length > 1){
		events.sort(compare);
	}

	for (var i = 0; i < events.length; i++ ){
		links_html += formatEventLinkHTML(events[i]);
	}

 	$('#event_links_wrap').html(links_html); 

}

//formats event links with html
function formatEventLinkHTML(event){  
	return '<a class="event_link" href="events.php#event-' + event.id + '">' + event.title + '</a>';
}

function ajaxNavEvents(){
        
  $.ajax({
      type: "POST",
      url: 'php/grabEvents.php',
      dataType: 'json',
      success: function(data)
      {
      	var events = new Array();

      	for(var i = 0; i < data.length; i++){
      		events[i] = jQuery.extend(new Event(), data[i]); 	
      	}
      	
        fillEventLinks(events);
        
        
      }, //end of success

  });
            
};

//Event object constuctor
function Event(id, title, img_url, summary, speaker){
	this.id = id;
	this.title = title;
	this.img_url = img_url;
	this.summary = summary;
	this.speaker = speaker;
}

//algorithm to sort array of events
function compare(a,b) {
  if (a.title < b.title)
    return -1;
  if (a.title > b.title)
    return 1;
  return 0;
}
