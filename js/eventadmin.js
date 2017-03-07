

// Click functions for modal on doc load
$(document).ready(function(){

	$('#add_event_meta').on('click' , function(){
		openModal("Event Scheduler", event_modal_body_html, event_modal_footer_html);
	    activateEventModalHandlers();
	 	
	});	

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

});

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
	
	var allowedFileTypes = ["jpg", "jpeg", "png"];

	
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

//content for modal events
var event_modal_body_html = '<form id="event_form">' +
			    	    '<table id="event_scheduler">' +
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
						'</table></form>';

var event_modal_footer_html = '<button id="add_meta_data" onclick="closeModal();">Add</button>' +
			    			  '&nbsp;&nbsp;<button onclick="closeModal();" id="cancel_meta_data">Cancel</button>';