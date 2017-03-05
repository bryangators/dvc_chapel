// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementsByClassName('myImg');

var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  alert('found');
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// When the user clicks on <span> (x), close the modal
$(document).ready(function(){
span.onclick = function() { 
  modal.style.display = "none";
}

})


