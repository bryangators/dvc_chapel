//////////////////////////////////////////////////////////////////
//This script is for modal to display messages to user, a loader//
//is also include. Each function is described below///////////////
//////////////////////////////////////////////////////////////////

//opens modal with specified content and button functions
//title- title of modal
//body_content - message or html code to be displayed
//footer content is custom buttons or default ok or ok/cancel
//functions are passed to ok and cancel button, custom buttons
//need to have functions attached to them in html onclick
function openModal(title, body_content, footer_content, okFunction, cancelFunction){
	disableScreen();
	//title
	$('#title_head').text(title);
	//body
	$('.modal-body').html(body_content);
	//footer and buttons logic
	var ok_button = '<button id="ok_btn">OK</button>';
	var cancel_button = '<button id="cancel_btn">Cancel</button>';

	if(footer_content === "ok"){
		//if only ok button
		$('.modal_buttons').html(ok_button);
		$('#ok_btn').click(okFunction);
	}else if(footer_content === "ok_cancel"){
		//if ok and cancel buttons
		$('.modal_buttons').html(ok_button + "&nbsp;&nbsp;" + cancel_button);
		$('#ok_btn').click(okFunction);
		$('#cancel_btn').click(cancelFunction);
	}else{
		//custom buttons
		$('.modal_buttons').html(footer_content);
	}

	//shows modal
	$('#myModal').show();
}

//Loading message modal with title input
function showModalLoader(title){
	disableScreen();
	$('#title_head').text(title);
	var bodyMsg = "<div style='text-align:center;'><br><br><img style='width:120px;' src='images/loading.gif'></div>";
	$('.modal-body').html(bodyMsg);
	$('#myModal').show();
}

//closes modal and enables screen
function closeModal(){
	$('#myModal').hide();
    enableScreen();
}

/////////////////////////////////////////////////////
///Save button was included in the not selector due//
///to the button being enabled and disabled in app//
///////////////////////////////////////////////////

//enables screen elements
function enableScreen(){
	$(':input').not('#myModal :input, #save_ev').attr('disabled', false);
}

//enables screen elements
function disableScreen(){
	$(':input').not('#myModal :input, #save_ev').attr('disabled', true);
}
