//Weekly calendar functionality.
//Calendar can be inserted into any page and will allow viewing a week at a time

//global variables for calendar
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var today = new Date();
var mDate = moment(today, moment.ISO_8601);
var weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
var active = false; //prevents multiple clicks during animation
var events = new Array();
var event_meta = new Array();

$( document ).ready(function(){
	startCalendar();	
	
})

//function fills calendar
// use this function along with
//prev and next week in main js file
function startCalendar(){

	fillCalendar();
	
	//forward click function
	$("#back").click(function (e){
		
		if(active){ return; }
		
		active = true;
		hideEvent();
		$('#daysHead').fadeOut();
		$('#weekRow').fadeOut(function(){
		clearEvents();	
		prevWeek();	
		e.stopImmediatePropagation();
		$('#daysHead').fadeIn();
		$('#weekRow').fadeIn(function(){active = false;});
		});
		
	});
	//backward click function
	$("#fwd").click(function(e){
		if(active){ return; }
		
		active = true;
		hideEvent();
		$('#daysHead').fadeOut();
		$('#weekRow').fadeOut(function(){
		clearEvents();	
		nextWeek();	
		e.stopImmediatePropagation();
		$('#daysHead').fadeIn();
		$('#weekRow').fadeIn(function(){active = false;});
		});
	});


	
	
}

function makeEventsClickable(){
	$('.event_links').on('click',  function(e){
			var objectId = parseInt($(this).closest('a').attr('id'));
			console.log(objectId);
			var event = findEventMeta(objectId);
			event.fillEventBox();		
			showEvent();
			e.stopImmediatePropagation();
		});
}

function fillCalendar(){
	fillWeekName(mDate);	
	fillDayNumbersandEvents(mDate);	
}

function clearEvents(){
	for(var i = 1; i <= 7; i++){
		$('#event_sec_' + i).empty();
	}
}

//function creates array of day numbers for week displayed
function fillDayNumbersandEvents(moment){
	var dayNums = new Array();
	var events = new Array();
	
	for (var i = 1; i <= 7; i++){
		var eventsHTML = "";
		dayNums[i] = moment.isoWeekday(i).get('date');		
		$("#day_" + i).html(dayNums[i]);
		events = findDailyEvents(moment.isoWeekday(i));
		for (var x = 0; x < events.length; x++){
				eventsHTML = eventsHTML + "" + events[x].formatEventHTML();
				
			}

		if (events.length > 0){
			$('#event_sec_' + i).html(eventsHTML);
		}	
		
		
		
	}
	// return dayNums;
	makeEventsClickable(); //makes new events clickable
}

//returns string of month name for week calendar view
function fillWeekName(m){
	var day = moment(m);
	var name;

	fMonth = day.isoWeekday(1).get('month');
	fday = day.isoWeekday(1).get('date');
	fYear = day.isoWeekday(1).get('year');	
	
	lday = day.isoWeekday(7).get('date');	
	lMonth = day.isoWeekday(7).get('month');
	lYear = day.isoWeekday(7).get('year');
	
	if(fMonth == lMonth){
		name = months[fMonth] + " " + fday + " - " + lday + ", " + fYear;
	}else if(fYear == lYear){
		name = months[fMonth] + " " + fday + " - " + months[lMonth] + " " + lday + ", " + fYear;
	}else{
		name = months[fMonth] + " " + fday + ", " + fYear + " - " + months[lMonth] + " " + lday + ", " + lYear;
	}
	$("#weekName").html(name);
}

//sets moment object to next week
function nextWeek(){
	mDate.add(1, 'w');
	fillCalendar();			
}

//sets moment object to previous week
function prevWeek(){
	mDate.subtract(1, 'w');
	fillCalendar();	
} 

//functions to hide and show events
function hideEvent(){
	$("#event_box").fadeOut();
}

function showEvent(){
	$("#event_box").fadeIn();
}

//Event object constuctor
function Event(id, title, img_url, desc, speaker){
	this.id = id;
	this.title = title;
	this.img_url = img_url;
	this.desc = desc;
	this.speaker = speaker;
}

//Constructor for event meta objects
function Event_meta(id, event_id, repeating, start_date, end_date, week_day_num, interval, time){
	this.id = id;
	this.event_id = event_id;
	this.repeating = repeating;
	this.start_date = start_date;
	this.end_date = end_date;
	this.week_day_num = week_day_num;
	this.interval = interval;
	this.time = time;
}

//prototype to fill evnent box with coresponding event
Event_meta.prototype.fillEventBox = function(){
	var event = findEvent(this.event_id);
	var dayNum = this.week_day_num;
	var wDay = weekDays[dayNum];
	var time = this.time;
	$('#imgLink').attr('href', event.img_url);
	$('#dispImg').attr('href', event.img_url);
	$('#event_title').text(event.title);
	$('#eventTime').text(wDay + " " + time);
	$('#about').text(event.desc);
	$('#speaker').text(event.speaker);
}

Event_meta.prototype.formatEventHTML = function() {
	event = findEvent(this.event_id);
	title = event.title;
	time = this.time;
	return '<a  id="'+ this.id +'" href="#event_top">'+
		   '<li id="1" class="event_links" href="#event_top">'+
		   '<span id="eName">'+ title + '</span>'+
		   '<br><span id="eTime"><i>' + time + '</i></span></li></a>';
};

//function to find events in array
function findEvent(id){
	for (var i = 0; i < events.length; i++) {
		if(events[i].id == id){
			return events[i];
		}
	}
}

//function to find event_meta_objects
function findEventMeta(id){
	for (var i = 0; i < event_meta.length; i++) {
		if(event_meta[i].id == id){
			return event_meta[i];
		}
	}
}



// This function will search through event meta data 
// and return events that fall on the date in question
// in an array
function findDailyEvents(date){
	var day = moment(date);
	var resultEvents = [];
	
	
	for (i = 0; i < event_meta.length; i++){
		// date format used for comparison
		var this_date = moment(event_meta[i].start_date).utc().format("YYYY-MM-DD");
		console.log(this_date);
		if (event_meta[i].repeating){ //finds repeating events
			
			if(event_meta[i].end_date == null){//for never ending events

				if(day.isSameOrAfter(event_meta[i].start_date)){//valid date range
						
					if(event_meta[i].interval == 1){//daily event
						resultEvents.push(event_meta[i]);
					}else if(event_meta[i].interval == 7 &&	
						day.isoWeekday() == event_meta[i].week_day_num){						
						//weekly event check
						resultEvents.push(event_meta[i]);
					}else{
						if (event_meta[i].interval == 30) {//check for monthly dates
							if(moment(day.isoWeekday()).isSame(moment(event_meta[i].start_date).isoWeekday())){
								resultEvents.push(event_meta[i]);
							}						
						}
					}// end of monthly repeat check
				}
			}else{//checks events within date range
				console.log('in');
				if(day.isBetween(event_meta[i].start_date, event_meta[i].end_date,'[]')){//valid date range
					if(event_meta[i].interval == 1){//daily event
						resultEvents.push(event_meta[i]);
					}else if(event_meta[i].interval == 7 &&	
						day.isoWeekday() == event_meta[i].week_day_num){
						//weekly event check
						resultEvents.push(event_meta[i]);
					}else{
						if (event_meta[i].interval == 30) {//check for monthly repeating dates
							if(moment(day.isoWeekday()).isSame(moment(event_meta[i].start_date).isoWeekday())){
								resultEvents.push(event_meta[i]);
							}						
						}
					}// end of monthly repeat check
				}
			}// end of date range check
		}else if(day.isSame(this_date, 'day')){//single date events
			console.log(event_meta[i].start_date);
			resultEvents.push(event_meta[i]);
		}//end of single date check
	}//end of loop check
	
	//sorts results in order of event time
	var	sortedResult = sortResultsByTime(resultEvents);		
	return sortedResult;
}


function sortResultsByTime(events){
	events = events.sort(function(a,b){
			var first = moment(a.time, "HH:mm a");
			var second = moment(b.time, "HH:mm a");
			
			if(first.isAfter(second)){
				return 1;
			}else if(first.isBefore(second)){
				return -1;
			}else{
				return 0;
			}
		});
	return events;
}
	

//need to clear html in each event section


// example objects for web page
events[0] = new Event(1, 'Worship Service', 'images/originalFlyer.png', 'At Deltona Victory Chapel, our lively worship services are Pentecostal in nature, featuring music, praise, Bible-Based preaching, ministry and prayer for personal needs.',
 'Pastor Josh Shapiro');


event_meta[0] = new Event_meta(1, 1, true, "2017-02-01", null, 7, 7, '7:00 PM' );
event_meta[1] = new Event_meta(2, 1, true, "2016-02-01", null, 7, 7, '11:00 AM' );
event_meta[2] = new Event_meta(3, 1, true, "2016-02-01", null, 3, 7, '07:00 PM');


