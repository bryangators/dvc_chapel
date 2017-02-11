
$( document ).ready(function(){
	activateMenuBtn();
	var width = $(window).width();
	console.log(window);
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
