//Script for media page containing images


$(window).on("load", function() {

	if (window.matchMedia('(min-width: 790px)').matches) {
       //runs event handlers only on non-mobile screens
       $(".expand").hide();
       hover_img_handlers();
    }else{
    	$(".expand").show();
    }

    window.onresize = function(){
    	if (window.matchMedia('(min-width: 790px)').matches) {
	       //runs event handlers only on non-mobile screens
	       $(".expand").hide();
	       hover_img_handlers();
    	}else{
    		$(".expand").show();
    	}
    }
});


function hover_img_handlers(){
	$('#gallery1').on('click', function(){
		
		openGallery('<iframe src="http://albumizr.com/a/pBQ" scrolling="no" frameborder="0" allowfullscreen width="100%" height="100%"></iframe>');
	});

	$('#gallery2').on('click', function(){
		openGallery('<iframe src="http://albumizr.com/a/eXOi" scrolling="no" frameborder="0" allowfullscreen width="100%" height="100%"></iframe>');
	});

	$(".picture").on({
    mouseover: function() {
       $(this).find(".expand").stop().show();
    },

    mouseout: function() {
        $(this).find(".expand").stop().hide();
    }
	});
}