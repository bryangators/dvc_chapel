//Script for media page containing images

//global variables for image galleries and urls from database
var db_images = new Array();
var db_img_galleries = new Array();

$(document).ready(function(){
	createPlaceholderGalleries();
	loadGalleries();
});

$(window).on("load", function() {
	showImageGalleries();
});



function showImageGalleries(){
	$('.place_holder_container').fadeOut(100, function(){
		
	});
	$('.img_gallery_container').show();

}

//loads galleries to media page
function loadGalleries(){
	var galleries_html = '';
	for (var i=0; i < db_img_galleries.length; i++){
		galleries_html += insertInitialGallery(db_img_galleries[i]);
	}
	
	$('#img_galleries').append(galleries_html);
}

function createPlaceholderGalleries(){
	
	var place_holder_img = '<div class="placeholder-picture shadow-box"><span class="placeholder-img-cont">' +
						   '<i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i></span></div>';
	
	var placeholder_html = '<div class="place_holder_container">' +
						   '<div style="width: 80%" class="page center shadow-box flex flex-wrap flex-row">' +
						   '<div class="title"><div id="placeholder-title"></div></div>' + place_holder_img + 
						   	place_holder_img + place_holder_img + place_holder_img + place_holder_img + 
						   	place_holder_img + '</div></div>';

	$('#img_galleries').html(placeholder_html);
}

//creates html for initial gallery
function insertInitialGallery(img_gallery){	
	var gallery_images = getAssociatedImages(img_gallery.id);
	var begin_html = '';
	var images_html = '';
	var end_html = '';

	if (gallery_images.length > 0) {
		begin_html += '<div class="img_gallery_container">' +
					  '<div style="width: 80%" class="page center shadow-box flex flex-wrap flex-row">' +
				      '<span class="title">' + img_gallery.title + '</span>';
	}

	if (gallery_images.length <= 6) {
		for (var i = 0; i < gallery_images.length; i++){
			images_html += '<div class="picture shadow-box"><a href="images/media_images2/'+ img_gallery.id + '/'+ gallery_images[i].url +'">' +
					  '<img class="myImg" src="images/media_images2/'+ img_gallery.id + '/'+ gallery_images[i].url +'"></div></a>';
		}
		end_html = '</div></div>';
	}else{
		for (var i = 0; i < 6; i++){
			images_html += '<div class="picture shadow-box"><a href="images/media_images2/'+ img_gallery.id + '/'+ gallery_images[i].url +'">' +
					  '<img class="myImg" src="images/media_images2/'+ img_gallery.id + '/'+ gallery_images[i].url +'"></div></a>';
		}
		end_html = '</div></div>';
	}

	//exits and does not create gallery if no assoc images found

	return begin_html + images_html + end_html;
	
}	


//gallery info object
function image_gallery(id, title){
	this.id = id;
	this.title = title;
}

//image object
function image(id, url, gallery_id){
	this.id = id;
	this.url = url;
	this.gallery_id = gallery_id;
}

//function returns all associated images to gallery
function getAssociatedImages(id){
	var result_images = new Array();
	for (var i = 0; i < db_images.length; i++) {
		if (db_images[i].gallery_id == id) {
			result_images.push(db_images[i]);
		}
	}
	return result_images;
}


//example gallery and images objects
db_img_galleries[0] = new image_gallery(1, 'Baptism');
db_img_galleries[1] = new image_gallery(2, 'test');

db_images[0] = new image(0, 'church0.png', 1);
db_images[1] = new image(1, 'church1.png', 1);
db_images[2] = new image(2, 'church2.png', 1);
db_images[3] = new image(3, 'church3.png', 1);
db_images[4] = new image(4, 'church4.png', 1);
db_images[5] = new image(5, 'church5.png', 1);
db_images[6] = new image(6, 'church6.png', 1);
db_images[7] = new image(7, 'church7.png', 1);
db_images[8] = new image(8, 'church8.png', 1);
db_images[9] = new image(9, 'church9.png', 1);
