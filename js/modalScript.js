// Script for modal box

//opens modal box with title, body_content takes html code
//the footer content takes html code as well, binding and fucntions
//will be handled in the file calling modal by binding onclick func
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

function closeModal(){
	$('#myModal').hide();
    enableScreen();
}

function enableScreen(){
	$(':input').not('#myModal :input').attr('disabled', false);
}

function disableScreen(){
	$(':input').not('#myModal :input').attr('disabled', true);
}