//Weekly calendar functionality.
//Calendar can be inserted into any page and will allow viewing a week at a time

//global variables for calendar
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var today = new Date();
var mDate = moment(today, moment.ISO_8601);
var weekDays = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
var active = false; //prevents multiple clicks during animation

//function fills calendar
// use this function along with
//prev and next week in main js file
function startCalendar(){
	fillCalendar();
	//forward click function
	$("#back").click(function (e){
		
		if(active){ return; }

		active = true;
		$('.calBox').fadeOut(300, function(){
		prevWeek();
		e.stopImmediatePropagation();
		$('.calBox').fadeIn(300, function(){active = false;});
		});
		
	});
	//backward click function
	$("#fwd").click(function(e){
		if(active){ return; }
		
		active = true;
		$('.calBox').fadeOut(500, function(){
		nextWeek();
		e.stopImmediatePropagation();
		$('.calBox').fadeIn(500, function(){active = false;});
		});
	});
}

function fillCalendar(){
	fillWeekName(mDate);	
	fillDayNumbers(mDate);	
}

//function creates array of day numbers for week displayed
function fillDayNumbers(moment){
	var dayNums = new Array();
	
	for (var i = 1; i <= 7; i++){
		dayNums[i] = moment.isoWeekday(i).get('date');
		$("#" + i).html(dayNums[i]);
	}
	return dayNums;
}

//returns string of month name for week calendar view
function fillWeekName(m){
	var a = moment(m);
	var name;
	//console.log(firstDay);
	fMonth = a.isoWeekday(1).get('month');
	fday = a.isoWeekday(1).get('date');
	fYear = a.isoWeekday(1).get('year');	
	
	//console.log(lastDay);
	lday = a.isoWeekday(7).get('date');	
	lMonth = a.isoWeekday(7).get('month');
	lYear = a.isoWeekday(7).get('year');
	
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

