//Script for media page containing images


$(window).on("load", function() {
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
})

});


