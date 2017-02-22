var page_events = new Array();

$(document).ready(function(){
	fillEvents();

});

function fillEvents(){
	var events_html = '';
	page_events.sort(compare);
	for (var i = 0; i < page_events.length; i++) {
		events_html += page_events[i].makeEventBoxHTML();
	}

	$('#event_section').html(events_html);
}


//prototype to fill evnent box with coresponding event
Event.prototype.makeEventBoxHTML = function(){
	var when;
	if (this.title == 'Worship Service'){
		when = 'Wednesdays at 7pm<br>Sundays at 11am and 7pm';
	}else{
		when = 'See Calendar Below for Scheduled Events';
	}
	
	return 		'<div id="' + this.id + '" style="height: 40px;"></div>' +
	            '<div class="event-container center page shadow-box">'+
				'<div id="event_page_box">' + 
				'<div id="event_page_img">' +
				'<a id="imgLink_page" href="' + this.img_url + '" target="_blank" >' + 
				'<img id="dispImg_page" src="' + this.img_url + '">' + 
				'</a>' +
				'</div>' +
				'<table id="event_page_desc">' +
				'<tr>' +
					'<td colspan="2" id="event_page_title">' + this.title + '</td>' +
					'</tr>' +
					'<tr>' +			
					'<td><b>When: </b></td>' +
					'<td id="eventTime_page">' + when + '</td>' +
					'</tr>' +
					'<tr>' +
					'<td><b>About:</b></td>' +
					'<td colspan="1" id="about_page">' + this.summary + '</td>' +
					'</tr>' +
					'<tr>' +
					'<td><b>Speaker(s):</b></td>' +
					'<td colspan="1" id="speaker_page">' + this.speaker + '</td>' +
					'</tr>' +
					'</table>' +				
				'</div>' +
			'</div>';
}

//Event object constuctor
function Event(id, title, img_url, summary, speaker){
	this.id = id;
	this.title = title;
	this.img_url = img_url;
	this.summary = summary;
	this.speaker = speaker;
}

// example objects for web page
page_events[0] = new Event(1, 'Worship Service', 'images/originalFlyer.png', 'At Deltona Victory Chapel, our lively worship services are Pentecostal in nature, featuring music, praise, Bible-Based preaching, ministry and prayer for personal needs.',
 'Pastor Josh Shapiro');
page_events[1] = new Event(2, 'The Choice', 'images/choiceFlyer.png', '5 Special Services to turn your life around.',
 'Pastor Paul Campo');

//algorithm to sort array of events
function compare(a,b) {
  if (a.title < b.title)
    return -1;
  if (a.title > b.title)
    return 1;
  return 0;
}
