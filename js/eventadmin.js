// Click functions for modal on doc load
$(document).ready(function(){

	// When the user clicks anywhere outside of the modal, close it
	$(window).click(function(event) {	
	    if (event.target.id == $('#myModal').attr('id')) {
	        closeAndClearModal();
	    }
	});

	$('.close').click(function(){
		closeAndClearModal();
	});

	$('#add_event_meta').click(function(){
		$('#myModal').show();
	    $(':input').not('#myModal :input').attr('disabled', true);
	});

	$("input[name='choice']:radio").click(function(){
		showHideRptInputs();
	});

	$("#chk_box").change(function(){
		endDateCheckBoxFunction();
	}); 

	$("#freq_sel").change(function(){
		handleFrequencySelect();
	});

});

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

//closes modal
function closeAndClearModal(){
	$('#myModal').hide();
    $(':input').not('#myModal :input').attr('disabled', false);
    $('#r2').prop('checked',true);
    $('.rpt_input').hide();
    $('#end_date').prop('disabled',false);
	$('.wday_input').hide();
	$('.rpt_hide').show();
	$('#event_form')[0].reset();
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
