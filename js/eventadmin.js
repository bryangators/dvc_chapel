var event;
var event_meta = new Array();

// Click functions for modal on doc load
$(document).ready(function(){
	
	$('#add_event_meta').on('click' , function(){
		openModal("Event Scheduler", event_modal_body_html, event_modal_footer_html);
	    activateEventModalHandlers();
	 	
	});	

	//checks if image name already exists
	$('#fileToUpload').bind('change', function() {
		
		var file = this.files[0];

		var request = $.ajax({
	    url:'images/event_images/' + file.name,
	    type:'HEAD'	    
		});

		request.done(function(){
			//if image already exists removes file chosen
			openModal("Error", "The image name: <b>" + file.name + "</b> is already taken.<br>Please rename your photo or choose another.", "ok", closeModal, null);	
			clearImage();
			
		});

		request.fail(function(){
			//if image does not exist finishes validation						
			validate_file(file);			
		});

	 });

	
	
   $('#save_ev').click(function(e){
   		e.stopImmediatePropagation();
   		//this will only be done if image is being uploaded
   		$('#ev-image').submit();
   })	


   uploadEventWithImageToServer();

});//end of document ready function

function activateEventModalHandlers(){
    $("input[name='choice']:radio").click(function(){
	showHideRptInputs();
	});
	$("#chk_box").change(function(){
	endDateCheckBoxFunction();
	}); 
	$("#freq_sel").change(function(){
	handleFrequencySelect();
	});
}


//shows repeating value inputs
function showHideRptInputs(){
	var rpt_val = $("input[name='choice']:checked").val(); 

	if(rpt_val == 'Yes'){
		$('.rpt_input').show();
		$('.rpt_hide').hide();
		handleFrequencySelect()
	}else{
		$('.rpt_input').hide();
		$('.rpt_hide').show();
		$('.wday_input').hide();
	}
}

// check box for end date
function endDateCheckBoxFunction(){
	if ($('#chk_box').is(":checked")){
		$('#end_date').prop('disabled',true);
	}else{
		$('#end_date').prop('disabled',false);
	}	
}

// function shows and hides weekly select box 
// for repeat events if needed
function handleFrequencySelect(){
	if ($('#freq_sel').val() == 'weekly'){
		$('.wday_input').show();
	}else{
		$('.wday_input').hide();
	}	
}

// Functions to validate image upload
function validate_file(upload_file){
	var errors = ""; //error message returned

	var fileExtension = upload_file.name.split('.').pop();
	var fileSizebytes = upload_file.size;
	var fileSizeString = Math.round(upload_file.size/1024/1024) + "MB";
	var fileType = upload_file.type;
	
	var allowedFileTypes = ["jpg", "JPG", "jpeg", "JPEG", "png", "PNG"];

	
    //checks for valid file type
	if(!(allowedFileTypes.indexOf(fileExtension) > -1)){
		errors += "File Extenstion: <b>." + fileExtension + "</b> is an invalid file type.<br>" + 
				  "Valid file types: <b>.jpg .jpeg .png</b>.<br>";		
	}

	//checks file size
	if(upload_file.size > 10000000){
		errors += "File is too large your file size is: <b>" +
		fileSizeString + "</b>" + "<br>Maximum file size: <b>10MB</b><br>";
	}

	if(errors.length != 0){
		openModal("Error", errors, "ok", closeModal, null);
		clearImage();
	}
	
}

function clearImage(){
	$('#fileToUpload').val("");	
	
}

function disableSave(){
	$('#save_ev').attr('disabled', true);
}

function enableSave(){
	$('#save_ev').attr('disabled', false);
}

//function will create event object with data in event form
function createNewEventObject(){
	var title = $('#ev_title').val();	
	var default_img_url = "images/event_images/logo.png";
	var upload_img_url = "images/event_images/" + $('#fileToUpload').val().replace(/C:\\fakepath\\/i, '');
	var summary = $('#ev_desc').val();
	var speaker = $('#ev_spk').val();
	var tmp_event = new Event(null, title, upload_img_url, summary, speaker);
	return tmp_event;
}

///////////////////////////////////////////////////////////////////////
//Event and event_meta objects. These will be used when manipulating///
//data as well as sending json objects to server to update mysql data//
///////////////////////////////////////////////////////////////////////

//Event object constuctor
function Event(id, title, img_url, summary, speaker){
	this.id = id;
	this.title = title;
	this.img_url = img_url;
	this.summary = summary;
	this.speaker = speaker;
}

//Constructor for event meta objects
function Event_meta(id, event_id, repeating, start_date, end_date, week_day_num, rpt_interval, time){
	this.id = id;
	this.event_id = event_id;
	this.repeating = repeating;
	this.start_date = start_date;
	this.end_date = end_date;
	this.week_day_num = week_day_num;
	this.rpt_interval = rpt_interval;
	this.time = time;	
}


///////////////////////////////////////////////////////////////////
//Ajax functions to call when sending event data to the server////
//////////////////////////////////////////////////////////////////

//this function sends event data to mysql database
//Note: this function does not send the phote just the img_url
//after the photo has been uploaded. This function will be called 
//by the upload image ajax request on success
//Note 2: this function can be called if only editing event details
//if no image upload is needed
function ajaxPostData(objectData, url, successFunc){
		
	$.ajax({
		 type: "POST",
		 url: url,
		 data: {myString:JSON.stringify(objectData)},
			 
		 success: function(data) 
		 {
		 	if (successFunc != null) {
		 		successFunc; // calls function in params
		 	}
		 	closeModal();
		 	openModal("Success", data, "ok",closeModal, null );

		 },
		 error: function(data)
		 {
		 	
		 	closeModal();
		 	openModal("Error", data + "error", "ok",closeModal, null );
		 }
	});
}

//This function is activated with document ready and will 
//upload image to server and call ajax requests to store
//other event data on success
function uploadEventWithImageToServer(){
	$('#ev-image').on('submit', function(e){			
			e.preventDefault();
			var formData = new FormData(this);			
			showModalLoader("Saving Image");
			$.ajax({
				url: "php/uploadImage.php", 
				type: "POST",             
				data: formData, 
				contentType: false,       
				cache: false,             
				processData:false,        
				success: function(data)
				{
					closeModal();
					if(data === "success"){
						//run next function after successful image upload
						$('#title_head').text("Saving Event Data");
						var eventData = createNewEventObject();
						ajaxPostData(eventData,"php/addEvent.php", null );
					}else{
						//display error message after unseccessful image upload
						openModal("Message", data, "ok",closeModal, null );
					}				
				},
				error: function(data)
				{
				openModal("Error", data, "ok",closeModal, null );
				}
				
			});// end of ajax function
	});//end of submit function
}


/////////////////////////////////////////////////////////////////////
//HTML code for modal box and buttons to add event schedule this////
//code will be displayed then can be manipulated when loading an////
//event that is already created.                                ////
////////////////////////////////////////////////////////////////////

//content for modal events
var event_modal_body_html = '<table id="event_scheduler">' +
			    		'<tr><td>Recurring Event?</td>' +
						'<td><input id="r1" class="radio" type="radio" name="choice" value="Yes">Yes'+
						'<input id="r2" class="radio" type="radio" name="choice" value="No" checked="checked">No'+
						'</td></tr>' +				
						'<tr><td>Event Time:</td>' +
						'<td><input style="width: 130px;" type="Time" name="ev_time"></td></tr>' +
						'<tr><td>Date</td>' +
						'<td><input style="width: 130px;" type="Date" name="ev_time"></td></tr>' +				
						'<tr class="rpt_input"><td>Frequency:</td>' +
						'<td><select id="freq_sel" style="width: 144px;">' +
						'<option value="daily">Daily</option>' +
						'<option value="weekly">Weekly</option>' +
						'<option value="monthly">Monthly</option>' +
						'</select></td></tr>' +
						'<tr class="wday_input"><td>Which Day?</td>' +
						'<td><select id="wDays" style="width: 144px;">' +
						'<option value="1">Mondays</option>' +
						'<option value="2">Tuesdays</option>' +
						'<option value="3">Wednesdays</option>' +
						'<option value="4">Thursdays</option>' +
						'<option value="5">Fridays</option>' +
						'<option value="6">Saturdays</option>' +
						'<option value="7">Sundays</option>' +
						'</select></td></tr>' +
						'<tr class="rpt_input"><td>Til When:</td>' +
						'<td>' +
						'<input id="end_date" style="width: 130px;" type="Date" name="end_date">' +
						'</td></tr>' +
						'<tr class="rpt_input"><td></td>' +
						'<td><div>' +
						'<input style="display: inline; width: 15%;" type="checkbox" id="chk_box" value="first_checkbox">' +		
						'<label style="display: inline; font-size: 0.8em; vertical-align: top;" for="chk_box">Does not end...</label>' +
						'</div></td></tr>' +
						'</table> ';

var event_modal_footer_html = '<button id="add_meta_data" onclick="closeModal();">Add</button>' +
			    			  '&nbsp;&nbsp;<button onclick="closeModal();" id="cancel_meta_data">Cancel</button>';



