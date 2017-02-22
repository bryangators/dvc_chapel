$(document).ready(function(){

	$('#play-pause-btn').on('click', function(){
		playPause();
	});


})



//play and pause button toggle
function playPause() { 
	var myVideo = document.getElementById("homeVid"); 
	activateOverlayToggle();
	
    if (myVideo.paused){
        myVideo.play();
        $('#btn-container').hide();
        $('#play-btn').hide();      
        // $('#pause-btn').show();
		        
    }else{
        myVideo.pause();
        $('#pause-btn').hide();
		$('#play-btn').show();
    	$('#btn-container').fadeIn(600);
    }
} 


//allows play and pause button to be shown and hidden after
//user plays video
function activateOverlayToggle(){
	var myVideo = document.getElementById("homeVid"); 
	$('#play-pause-btn').mousemove(function(){
		if (!myVideo.paused){	
			$('#pause-btn').show();	
			$('#btn-container').fadeIn(600);
		}
	})
	
	$('#play-pause-btn').mouseleave(function(){
		if (!myVideo.paused){
			$('#btn-container').fadeOut(600);
		}
	});
	
}
