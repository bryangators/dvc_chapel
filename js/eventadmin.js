var temp_event = new Array();
var temp_meta = new Array();
var flag = new Array();
var db_events = new Array();
var event_meta = new Array();

// Click functions for modal on doc load
$(document).ready(function(){

	//loads data and fills page
	loadData(fillEventAdminPage);

	//activates add event click handlers
	$('#add_event_meta').on('click' , function(){
		showMetaEditor(null);	    	
	});	

	//save event submit button
    $('#save_ev').click(function(e){
   		e.stopImmediatePropagation();

   		var errorMsg = validate_event()

   		if (errorMsg != ''){   			
   			openModal("Warning", errorMsg, "ok_cancel", function(){
   				$('#ev-image').submit();   				
   				$('#ok_btn').text('OK');
   			}, function(){
   				closeModal(false);
   			});
   			$('#ok_btn').text('Save Anyways');   			
   		}else{
   			$('#ev-image').submit();
   		}   		
   });	


   uploadEventWithImageToServer();

});//end of document ready function

////////////////////////////////////////////////////////////////////
//Function will fill event admin page and make boxes for already //
//created events. Calls ajax for meta and events used.           //
///////////////////////////////////////////////////////////////////
function fillEventAdminPage(){
	$('.ev-container').remove();
	var makeContainer = '<div class="ev-container flex flex-wrap flex-row">' +
						'<div id="new-event-box" onclick="openEvEditor();" class="page ev-box shadow-box">' +
						'<span>New	Event<br><i class="fa fa-plus" aria-hidden="true"></i></span>' +
						'</div></div>';
	$('#ev-main-page').html(makeContainer);

	for(var i=0; i<db_events.length;i++){
       	makeEventBox(db_events[i]);  
    }   
}

//function to make event boxes on admin page
function makeEventBox(event){
	var box_html = '<div class="page ev-box shadow-box">' +
					'<span class="event-box-title" >' + event.title + '</span>' +
					'<br>' +
					'<div class="flex flex-row flex-wrap ev-box-btns">' +
					'<span onclick="editEvent(' + event.id +');">' +
					'<i class="fa fa-pencil" title="Edit" aria-hidden="true"></i>' +
					'<br>Edit</span>' +
					'<span onclick="viewEvent(' + event.id +');">' +
					'<i class="fa fa-eye" title="Preview" aria-hidden="true"></i>' +
					'<br>Preview</span>' +
					'<span onclick="deleteEvent(' + event.id +');">' +
					'<i class="fa fa-trash" title="Delete" aria-hidden="true"></i>' +
					'<br>Delete</span>' +
					'</div>' +
					'</div>';
	$('.ev-container').append(box_html);
}

//delete event function
function deleteEvent(id){
	//function will delete event from database
	var ev_img_url = "../" + getEventByID(id).img_url;

	openModal("Delete Event", 
			  "Are you sure you want to delete " + getEventByID(id).title + " event?",
			  "ok_cancel",function(){			  	
			  ajaxDeleteEvent(id, ev_img_url);
			  } ,closeModal);	
}

//fills event preview window
function viewEvent(id){
	var event = getEventByID(id);
	$('#event_title').text(event.title);
	$('#imgLink').attr('href', event.img_url);
	$('#dispImg').attr('src', event.img_url);
	$('#about').text(event.summary);
	$('#speaker').text(event.speaker);
	openEvPreview();
}

//opens event preview window
function openEvPreview(){
	$('#ev-main-page').fadeOut(200, function(){
		$('#preview_box').fadeIn();
	});
}

//closes event preview window
function closeEvPreview(){
	$('#preview_box').fadeOut(200, function(){
		$('#ev-main-page').fadeIn();
	});
}

///////////////////////////////////////////////////////////////////
//Ajax functions to call when sending event data to the server////
//////////////////////////////////////////////////////////////////

//gets event and meta data from database and sets flags when retrieved
function ajaxDataFromDB(url, dataType){        
  $.ajax({
      type: "POST",
      url: url,
      dataType: 'json',
      success: function(data)
      {      	
        if (dataType == 'events'){        	
        	var newEvents = new Array();
          	for(var i = 0; i < data.length; i++){
      			db_events[i] = jQuery.extend(new Event(), data[i]);       			
      		}
      		flag[1] = true;
      	}      
        if (dataType == 'event_meta'){
        	var newMeta = new Array();
          	for(var i = 0; i < data.length; i++){
      			event_meta[i] = jQuery.extend(new Event_meta(), data[i]);      			 	
      		} 
      		flag[0] = true;   
      	}      
    } //end of success
  }); 
};

function ajaxPostData(objectData, url, successFunc){	
	$.ajax({
		 type: "POST",
		 url: url,
		 data: {myString:JSON.stringify(objectData)},
			 
		 success: function(data) 
		 {		 	
		 	closeModal(false);
		 	
		 	if (successFunc != null) {
		 		successFunc(data); // calls function in params
		 	}
		 },
		 error: function(data)
		 {		 	
		 	closeModal(false);
		 	openModal("Error", data + "error", "ok",function(){
		 		closeModal(false)}, null );
		 }
	});
}

function ajaxDeleteEvent(id, ev_img_url){
	url = 'php/deleteEvent.php';
	$.post( url,{event_id: id, img_url: ev_img_url}, function( data ) {
  		openModal("Message", data , "ok",refreshPage, null );
	});
}

//This function is activated with document ready and will 
//upload image to server and call ajax requests to store
//other event data on success
function uploadEventWithImageToServer(){
	$('#ev-image').on('submit', function(e){
		if ($('#fileToUpload').val() == '') {
			e.preventDefault();
			showModalLoader("Saving Event");
			var eventData = createNewEventObject();
			eventData.img_url = "images/event_images/logo1000.png";
			$.post( "php/addEvent.php",{myString:JSON.stringify(eventData)}, function( data ) {
				closeModal(false);
				uploadMetaToDB(data);
			});	
	}else{			
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
					closeModal(false);
					if(data === "success"){
						
						var eventData = createNewEventObject();
						$.post( "php/addEvent.php",{myString:JSON.stringify(eventData)}, function( data ) {
							uploadMetaToDB(data);
						});
					}else{
						//display error message after unseccessful image upload
						openModal("Message", data, "ok",function(){
							closeModal(false);
						}, null );					}				
				},
				error: function(data)
				{
				openModal("Error", data, "ok",function(){
					closeModal(false);
				}, null );
				}				
			});// end of ajax function
		}//end of else	
	});//end of submit function
}

//uploads new image, deletes old image and changes img_url and event
function replaceImage(){
	$('#edit-image').on('submit', function(e){	
			e.preventDefault();
			var formData = new FormData(this);			
			$.ajax({
				url: "php/uploadImage.php", 
				type: "POST",             
				data: formData, 
				contentType: false,       
				cache: false,             
				processData:false,        
				success: function(data)
				{
					closeModal(false);
					if(data === "success"){
						$.post( 'php/deletePhoto.php',{'photo':"../" + temp_event.img_url}, function(data) {
							temp_event.img_url = "images/event_images/" + $('#newFileToUpload').val().replace(/C:\\fakepath\\/i, '');
				   			$.post( "php/editEvent.php", {'event':JSON.stringify(temp_event)}, function(){
				   				openModal("Success", "Image was successfully updated.", "ok", function(){
				   					refreshEvEditor(temp_event.id);
				   				}, null);
				   			});						
						});
					}else{
						//display error message after unseccessful image upload
						openModal("Message", "Something went wrong.", "ok",function(){
							refreshEvEditor(temp_event.id);
						}, null );
					}				
				},
				error: function(data)
				{
				openModal("Error", "Something went wrong please contact administrator.", "ok",function(){
					refreshEvEditor(temp_event.id);
				}, null );
				}				
			});// end of ajax function
	});//end of submit function
}


function uploadMetaToDB(id){
	var url = "php/addEventMeta.php";
	if (temp_meta.length > 0) {
		for(var i = 0; i < temp_meta.length; i++){
			temp_meta[i].event_id = id;
			
			if (i == temp_meta.length - 1) {
				$.post( url,{myString:JSON.stringify(temp_meta[i])}, function(){
					openModal("Success", "Event was successfully created.", "ok", function(){
						refreshPage();
					}, null);
				});
			}else{
				$.post( url,{myString:JSON.stringify(temp_meta[i])});
			}			
		}		
	}else{
		// alert('here');
		openModal("Success", "Event was successfully created.<br><br><b>Note:</b> You did not schedule this event. The event will not display on the calendar until you schedule it.", "ok", function(){
			refreshPage();
		}, null);
	}
}

function loadData(callback){
	flag[0] = false;
	flag[1] = false;
	db_events = [];
	event_meta = [];
	ajaxDataFromDB('php/grabEvents.php', 'events');
	ajaxDataFromDB('php/grabEventMeta.php', 'event_meta');
	setTimeout(function(){
		checkLoadStatus(function(){
			callback();
		});
	}, 200);
}

//refreshes page by reloading data from db
function refreshPage(){
	closeEvEditor();
	closeModal(false);
	loadData(fillEventAdminPage);
	$('html, body').animate({scrollTop: 0}, 1000);
}


//waits to load page until all data is loaded
function checkLoadStatus(callback){
	if(flag[0] && flag[1]){
		callback();
	}else{
		checkLoadStatus(callback);		
	}
}

/////////////////////////////////////////////////////////
//              Event Editor script                    //
/////////////////////////////////////////////////////////

function openEvEditor(){

	$('#ev-main-page').fadeOut(200, function(){
		$('#ev-editor').fadeIn();
		checkIfImgExists();

	});
}

function refreshEvEditor(id){
	closeModal(true);
	loadData(function(){
		editEvent(id);		
	});	
}

function closeEvEditor(){	
	temp_event = [];
	temp_meta = [];
	$('#ev-editor').fadeOut(200, function(){
		clearImage();
		$('#ev-editor').find('input:text').val('');
		$("#current_img").text('');
		$('#meta_schedule').text('');
		$("#ev_desc").val('');
		$('#sched_title').text('Schedule');
		$("#fileToUpload").show();
		$('#ev-main-page').fadeIn();
		$('.edit').hide();
		$('#save_ev').show();
		$('#add_event').find('input, textarea').removeAttr('disabled');
		$('#ev_main_title').text("New Event");
		$('html, body').animate({scrollTop: 0}, 1000);
	});
}

//opens event editor for event by id
function editEvent(id){
	temp_event = getEventByID(id);
	getAttachedMeta(temp_event.id);
	$('#meta_schedule').empty();
	$('.edit').show();
	$('#save_ev').hide();
	$('#add_event').find('input, textarea').attr('disabled', 'disabled');

	for (var i = 0; i < temp_meta.length; i++){
		insertMetaInEditor(temp_meta[i], i+1);
	}	

	$('#ev_main_title').text(temp_event.title);
	$("#ev_title").val(temp_event.title);
	$("#fileToUpload").hide();
	$("#current_img").text(temp_event.img_url.substring(20));
	$("#ev_desc").val(temp_event.summary);
	$("#ev_spk").val(temp_event.speaker);
	$('#sched_title').text(temp_event.title + ' Schedule');
	$('.edit').on('click', function(){
		editEventBox(this.title);
	})
	openEvEditor();
}

//opens dialog to edit field in event and post it to db
function editEventBox(field){	
	var body = '';
	if (field == "image") {
		body = '<form action="" method="post" class="center" id="edit-image" enctype="multipart/form-data">'+
				  '<input type="file" name="fileToUpload" class="inputfile" id="newFileToUpload"></form>';
		openModal("Change Image", body, "ok_cancel", null, function(){
			closeModal(true);			
		});
		
		$('#ok_btn').click(function(e){
			   		e.stopImmediatePropagation();
			   		//this will only be done if image is being uploaded
			   		$('#edit-image').submit();
		});
		replaceImage();
		checkIfImgExists();
		 //binds image validation to image editor
	}else{
		if (field == "summary") {
			body = '<br><b>New ' + field +  ':</b><br><textarea id="edit_box_val" rows="6"></textarea>';
		}else{
			body = '<br><b>New ' + field +  ':</b><br><input id="edit_box_val" type="text">';
		}
		openModal("Edit " + field, body, "ok_cancel", 
				function(){//function to ajax changes to db on save
			  		temp_event[field] = $('#edit_box_val').val();
			  		$.post( "php/editEvent.php", {'event':JSON.stringify(temp_event)} , function( data ) {			 		
						openModal("Message", data, "ok", function(){refreshEvEditor(temp_event.id);}, null);
					});
				  }, 
				  function(){//cancel function
				  	closeModal(true);
				  });
	}
	$('#edit_box_val').val(temp_event[field]);
	$('#ok_btn').text("Save Changes");
}

function insertMetaInEditor(meta, num){
	var identifier;
	if (meta.id == null) {identifier = num - 1;}
	else{identifier = meta.id};
	
	$('#meta_schedule').append("<div class='meta_desc'><b>Schedule " + (num) + ":<b><br>");
		$('#meta_schedule').append(meta.stringDescription() + "<br>");	
		$('#meta_schedule').append('<span onclick="editMeta(' + identifier +');">' +
								   '<i class="fa fa-pencil fa-lg" title="Edit" aria-hidden="true"></i></span>' +
								   '&nbsp;&nbsp;&nbsp;&nbsp;<span onclick="deleteMeta(' + identifier +');">' +
								   '<i class="fa fa-trash fa-lg" title="Delete" aria-hidden="true"></i></span></div><br><br>');
}

function deleteMeta(id){
	//deletes from temp meta only for new events
	if (temp_event.id == null) {
		temp_meta.splice(id, 1);
		$('#meta_schedule').empty();
		for(var i = 0; i < temp_meta.length; i++){
			insertMetaInEditor(temp_meta[i], i + 1);
		}
	}else{//deletes from db since already saved
		openModal("Delete Schedule", "Are you sure you want to delete this schedule permamently?", "ok_cancel",
			 function (){
			 	$.post( "php/deleteEventMeta.php", {'meta_id':id} , function( data ) {
			 		
					openModal("Message", data, "ok", function(){
						refreshEvEditor(temp_event.id);
					}, null);
				});
			 }, function(){
			 	closeModal(false);
			 });
	}
	
}

function editMeta(id){

	var meta;
	if (temp_event.id != null) {meta = getMetaByID(id);}
	else{meta = temp_meta[id]}; 	
	console.log(meta);
	showMetaEditor(id);	
	fillMetaEditor(meta);	
}

function saveMetaEdits(id){
	alert(id);
	var eventID = null;	
	if(temp_event.id != null){eventID = temp_event.id;}

	var errorMsg = validateMeta();
	var new_meta = createNewEventMetaObject(id, eventID);
	if (errorMsg.length > 0) {
		openModal("Error", errorMsg, "ok", function(){
			closeModal(false);
			showMetaEditor(null);	
			fillMetaEditor(new_meta);//fix this to show same meta object again...
		},null);
	}else{
		if (eventID != null) {
			var meta = createNewEventMetaObject(id, eventID);
			var url = "php/editEventMeta.php";
			$.post( url,{myString:JSON.stringify(meta)}, function( data ) {
				openModal("Message", data, "ok", function(){
					refreshEvEditor(temp_event.id);
				}, null );
			});
		}else{
			closeModal(false);
			var meta = createNewEventMetaObject(null, eventID);
			temp_meta[id] = meta;
			$('#meta_schedule').empty();
			for(var i = 0; i < temp_meta.length; i++){
				insertMetaInEditor(temp_meta[i], i + 1);
			}
		}
	}
}

function addMeta(){
	var eventID = null;
	
	if(temp_event.id != null){eventID = temp_event.id;}

	var new_meta = createNewEventMetaObject(null, eventID);
	var errorMsg = validateMeta();
	if (errorMsg.length > 0) {
		openModal("Error", errorMsg, "ok", function(){
			closeModal(false);
			showMetaEditor(null);	
			fillMetaEditor(new_meta);
		},null);
	}else{
		//adds meta if valid
		if(temp_event.id == null){
		//for new events
		temp_meta.push(new_meta);
		console.log(new_meta);
		var currentCount = $('.meta_desc').length + 1;
		insertMetaInEditor(new_meta, currentCount);	
		closeModal(false);	
		}else{
			//add to database...then refresh
			var url = "php/addEventMeta.php";
			$.post( url,{myString:JSON.stringify(new_meta)}, function( data ) {
				openModal("Message", data, "ok", function(){
					refreshEvEditor(temp_event.id);
				}, null );
			});		
		}
	}	
}

///////////////////////////////////////////////////////////////////////
//Event and event_meta object classes and functions. //////////////////
///////////////////////////////////////////////////////////////////////

//Event object constuctor
function Event(id, title, img_url, summary, speaker){
	this.id = id;
	this.title = title;
	this.img_url = img_url;
	this.summary = summary;
	this.speaker = speaker;
}

//returns event object by id
function getEventByID(id){
	for(var i = 0; i < db_events.length; i++){
		if(id == db_events[i].id){
			return db_events[i];
		}
	}
}

//function will create event object with data in event form
function createNewEventObject(){
	var title = $('#ev_title').val();	
	var upload_img_url = "images/event_images/" + $('#fileToUpload').val().replace(/C:\\fakepath\\/i, '');
	var summary = $('#ev_desc').val();
	var speaker = $('#ev_spk').val();
	var tmp_event = new Event(null, title, upload_img_url, summary, speaker);
	return tmp_event;
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

//fills meta editor with meta data of schedule
function fillMetaEditor(meta){
	$('#evTime').val(meta.time);
	$('#ev_start_date').val(meta.start_date);
	
	if (meta.repeating == 1) {
		$('#r1').prop('checked', true);	
		showHideRptInputs();
		if (meta.end_date == null) {
			$('#chk_box').prop('checked', true);
			endDateCheckBoxFunction();
		}else{
			$('#end_date').val(meta.end_date);
		}
		$('#freq_sel').val(meta.rpt_interval);
		handleFrequencySelect();
		if (meta.rpt_interval == 'Weekly') {
			$('#wDays').val(meta.week_day_num);
		}		
	}
}

//prints description of schedule in editor
Event_meta.prototype.stringDescription = function(){
	var result = "";
	var first_date = moment(this.start_date);
	var time = moment(this.time, 'h:mm a').format('h:mm a');
	var second_date = "indefinite";
	if(this.repeating == "1"){
		result += "Repeats " + this.rpt_interval;
		if (this.rpt_interval == "Weekly") {
			result += " on " + moment().day(this.week_day_num).format('dddd') + "s";
		}else if(this.rpt_interval == "Monthly"){
			result += " on the " + moment(this.start_date).format('Do') + " day of the month";
		}
		
		if (this.end_date != null) {
				second_date = moment(this.end_date).format('MMMM D, YYYY');
			}

		result += " from " + first_date.format('MMMM D, YYYY') + " to " + second_date;
	}else{
		result = first_date.format('dddd MMMM D, YYYY'); 
	}

	result += " @ " + time;
	
	return result;
}

//returns event meta by id
function getMetaByID(id){
	for(var i = 0; i < event_meta.length; i++){
		if(id == event_meta[i].id){
			return event_meta[i];
		}
	}
}

//returns array of meta attached with event
function getAttachedMeta(ev_id){
	temp_meta = [];

	for(var i = 0; i < event_meta.length; i++){
		if(ev_id == event_meta[i].event_id){
			temp_meta.push(event_meta[i]);
		}
	}

}

//this function will create event meta object. Will only have event_id if 
//information is known from global tmp_event variable that is only used when editing
//an event. Otherwise event id will be filled in when inserting a new event in db
function createNewEventMetaObject(id_meta, ev_id){
	var id = id_meta;
	var event_id = ev_id;
	var repeating = $("input[name='rpt_choice']:checked").val();
	var start_date = $('input[name="ev_start_date"]').val();	
	var time = document.getElementById("evTime").value;	
	if (time.length == 5) {
		time += ":00";
	}

	//vars for repeating events only
	var end_date = null;
	var week_day_num = moment(start_date).format('E');
	var rpt_interval = 'None';
	
	//logic for repeating events
	if (repeating == "1") {
		if(!$('#chk_box').is(':checked')){
			end_date = $('input[name="ev_end_date"]').val();
		}
		
		rpt_interval = $('#freq_sel').val();

		if(rpt_interval == 'Weekly'){
			week_day_num = $('#wDays').val(); //for weekly repeating
		}
	}

	var meta = new Event_meta(id, event_id, repeating, start_date, end_date, week_day_num, rpt_interval, time);
	 //this should be on add meta only
	return meta;
}

//shows repeating value inputs
function showHideRptInputs(){
	var rpt_val = $("input[name='rpt_choice']:checked").val(); 

	if(rpt_val == '1'){
		$('.rpt_input').show();
		$('.rpt_hide').hide();
		$('#startDateText').text('Start Date');
		handleFrequencySelect();
	}else{
		$('#startDateText').text('Date');
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
	if ($('#freq_sel').val() == 'Weekly'){
		$('.wday_input').show();
	}else{
		$('.wday_input').hide();
	}	
}

//activates various handlers when page is loaded
function activateEventModalHandlers(){
    $("input[name='rpt_choice']:radio").click(function(){    	
   	showHideRptInputs();
	});
	$("#chk_box").change(function(){
	endDateCheckBoxFunction();
	}); 
	$("#freq_sel").change(function(){
	handleFrequencySelect();
	});
}

////////////////////////////////////////////////
// Validation Functions for inputs and forms ///
////////////////////////////////////////////////

//checks server to ensure image is not duplicate
function checkIfImgExists(){
	//checks if image name already exists
	$('#fileToUpload, #newFileToUpload').bind('change', function() {		
		var file = this.files[0];			
		var request = $.ajax({
	    url:'images/event_images/' + file.name,
	    type:'HEAD'	    
		});
		request.done(function(){
			//if image already exists removes file chosen
			openModal("Error", "The image name: <b>" + file.name + "</b> is already taken.<br>Please rename your photo or choose another.", "ok", function(){
				if (temp_event.id == null
					) {
					closeModal(false);
				}else{
					refreshEvEditor(temp_event.id);
					editEventBox('image');					
				}
			}, null);	
			clearImage();			
		});
		request.fail(function(){
			//if image does not exist finishes validation						
			validate_img(file);			
		});
	 });
}

function validate_img(upload_file){
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

	if (errors.length > 0) {
		openModal("Error", errors, "ok", function(){
			if (temp_event.id == null) {
				disable = false;
			}else{
				disable = true;
			}
			closeModal(disable);
		}, null);
	}
}

function validate_event(){
	var errors = '';
	var first = false;
	var img = $('#fileToUpload').val();
	var title = $('#ev_title').val();
	var summary = $('#ev_desc').val();
	var speaker = $('#ev_spk').val();

	if (img == '') {
		if (!first) {errors += '<ul>';}
		first = true;
		errors += "<li>No image was chosen. If you do not choose an image the default logo will be displayed.</li><br>";
	}

	if (title == '') {
		if (!first) {errors += '<ul>';}
		first = true;
		errors += "<li>A title was not entered for this event.</li><br>";
	}

	if (summary == '') {
		if (!first) {errors += '<ul>';}
		first = true;
		errors += "<li>A summary was not entered for this event.</li><br>";
	}

	if (speaker == '') {
		if (!first) {errors += '<ul>';}
		first = true;
		errors += "<li>A speaker was not entered for this event.</li><br>";
	}

	if (temp_meta.length < 1) {
		if (!first) {errors += '<ul>';}
		first = true;
		errors += "<li>There were no schedules created for this event.</li><br>";
	}

	if (first) {
		errors += '</ul>';
	}

	return errors;
}

function validateMeta(){
	var errors = '';
	var firstError = false;
	var today = moment(new Date(), moment.ISO_8601).startOf('day');
	var repeating = $("input[name='rpt_choice']:checked").val();
	var start_date = $('input[name="ev_start_date"]').val();
	var time = document.getElementById("evTime").value;	

	//checks for empty time input
	if (time == '') {
		if (!firstError) {
					errors += '<ul>';
					firstError = true;
				}
		errors += '<li>You must enter a valid time.</li><br>';
	}

	if (!moment(start_date).isValid()) {
			if (!firstError) {
					errors += '<ul>';
					firstError = true;
				}
			errors += '<li>You must enter a valid start date.</li><br>';
 	}

	//for non repeating schedules
	if (repeating == '0') {
		//verifies a date exists
		if (moment(start_date).isValid()){
 			//verifies date is not previous day
 			if (today.isAfter(start_date, 'day')) {
				if (!firstError) {
					errors += '<ul>';
					firstError = true;
				}
			errors += '<li>Invalid date. The event was scheduled for a date that is already passed.</li><br>';
			}
 		}		
	}else{
		//check rest of fields for repeating events
		var end_date = $('input[name="ev_end_date"]').val();

		//checks end date if never ends box is not checked
		if(!$('#chk_box').is(':checked')){
			//verifies the end date
			if (!moment(end_date).isValid()) {
				if (!firstError) {
						errors += '<ul>';
						firstError = true;
					}
				errors += '<li>You must enter a valid end date or check does not end box.</li><br>';
	 		}

	 		//checks date range if valid dates
			if (moment(start_date).isValid() && moment(end_date).isValid()) {			
				if (moment(start_date).isAfter(end_date, 'day')) {
					if (!firstError) {
						errors += '<ul>';
						firstError = true;
					}
					errors += '<li>Invalid date range. The end date is after the start date.</li><br>';
				}
	 		}
		}
		
	}	

	if (firstError) {
		errors += '</ul>';
	}

	return errors;
}

function clearImage(){
	$('#fileToUpload').val("");	
}


/////////////////////////////////////////////////////////////////////
//HTML code for modal box and buttons to add event schedule this////
//code will be displayed then can be manipulated when loading an////
//event that is already created.                                ////
////////////////////////////////////////////////////////////////////

function showMetaEditor(id){
	if (id != null) {
		var meta_edit = getMetaByID(id);	
	}
	

	var event_modal_body_html = '<table id="event_scheduler">' +
				    		'<tr><td>Recurring Event?</td>' +
							'<td><input id="r1" class="radio" type="radio" name="rpt_choice" value="1">Yes'+
							'<input id="r2" class="radio" type="radio" name="rpt_choice" value="0" checked="checked">No'+
							'</td></tr>' +				
							'<tr><td>Event Time:</td>' +
							'<td><input style="width: 130px;" type="Time" id="evTime" name="ev_time"></td></tr>' +
							'<tr><td id="startDateText">Date</td>' +
							'<td><input id="ev_start_date" style="width: 130px;" type="Date" name="ev_start_date"></td></tr>' +				
							'<tr class="rpt_input"><td>Repeat Frequency:</td>' +
							'<td><select id="freq_sel" style="width: 144px;">' +
							'<option value="Daily">Daily</option>' +
							'<option value="Weekly">Weekly</option>' +
							'<option value="Monthly">Monthly</option>' +
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
							'<tr class="rpt_input"><td>End Date:</td>' +
							'<td>' +
							'<input id="end_date" style="width: 130px;" type="Date" name="ev_end_date">' +
							'</td></tr>' +
							'<tr class="rpt_input"><td></td>' +
							'<td><div>' +
							'<input style="display: inline; width: 15%;" type="checkbox" id="chk_box" value="first_checkbox">' +		
							'<label style="display: inline; font-size: 0.8em; vertical-align: top;" for="chk_box">Does not end...</label>' +
							'</div></td></tr>' + 
							'</table> ';

	var event_modal_footer_html = '<button id="add_meta_data" onclick="addMeta();">Add</button>' +
				    			  '&nbsp;&nbsp;<button id="cancel_meta_data">Cancel</button>';

	var edit_modal_footer_html = '<button id="add_meta_data" onclick="saveMetaEdits(' + id + ');">Save Changes</button>' +
			    			  '&nbsp;&nbsp;<button id="cancel_meta_data">Cancel</button>';

	if (id != null) {		    			  
		openModal("Event Scheduler", event_modal_body_html, edit_modal_footer_html);		
	}else{
		openModal("Event Scheduler", event_modal_body_html, event_modal_footer_html);		
	}

	if (temp_event.id == null) {
		$('#cancel_meta_data').click(function(){
			
			closeModal(false);
		});
	}else{
		$('#cancel_meta_data').click(function(){
			closeModal(true);
		});
	}
	activateEventModalHandlers();
}