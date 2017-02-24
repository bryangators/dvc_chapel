$(document).ready(function(){

	ajaxPageEvents();

});

function makeEventBoxHTML(event){
	var when;
	
		if (event.title == 'Worship Service'){
			when = 'Wednesdays at 7pm<br>Sundays at 11am and 7pm';
		}else{
			when = 'See Calendar Below for Scheduled Events';
		}
		
		return 		'<div id="event-' + event.id + '" style="height: 20px;"></div>' +
		            '<div class="event-container center page_style shadow-box">'+
					'<div id="event_page_box">' + 
					'<div id="event_page_img">' +
					'<a id="imgLink_page" href="' + event.img_url + '" target="_blank" >' + 
					'<img id="dispImg_page" src="' + event.img_url + '">' + 
					'</a>' +
					'</div>' +
					'<table id="event_page_desc">' +
					'<tr>' +
						'<td colspan="2" id="event_page_title">' + event.title + '</td>' +
						'</tr>' +
						'<tr>' +			
						'<td><b>When: </b></td>' +
						'<td id="eventTime_page">' + when + '</td>' +
						'</tr>' +
						'<tr>' +
						'<td><b>About:</b></td>' +
						'<td colspan="1" id="about_page">' + event.summary + '</td>' +
						'</tr>' +
						'<tr>' +
						'<td><b>Speaker(s):</b></td>' +
						'<td colspan="1" id="speaker_page">' + event.speaker + '</td>' +
						'</tr>' +
						'</table>' +				
					'</div>' +
				'</div>';
}

function fillEvents(events){
	
	var events_html = '';
	
	if(events.length > 1){
		events.sort(compare);
	}
	
	
	for (var i = 0; i < events.length; i++) {
		events_html += makeEventBoxHTML(events[i]);
	}
	$('#event_section').html(events_html);
	setTimeout(scrollToDiv, 100);
	


}

function scrollToDiv(){
	
	$('html, body').animate({
    // window.location.hash is the div you want to scroll to as set by the link on the other page, and it even comes pre hashed ("#whatever").
    
    scrollTop: $(window.location.hash).offset().top-70
  	}, 1000);
}

//algorithm to sort array of events
function compare(a,b) {
  if (a.title < b.title)
    return -1;
  if (a.title > b.title)
    return 1;
  return 0;
}

////////////////////////////////////////////////////////
////Ajax function to connect to the database///////////
//////////////////////////////////////////////////////

function ajaxPageEvents(){
        
  $.ajax({
      type: "POST",
      url: 'php/grabEvents.php',
      dataType: 'json',
      success: function(data)
      {
      	var events = new Array();

      	//converts json objects from db to event object array
      	for(var i = 0; i < data.length; i++){
      		events[i] = jQuery.extend(new Event(), data[i]);
      	}
      	
      	//will fill page with events from database
        fillEvents(events);
        
        
      }, //end of success

  });
            
};