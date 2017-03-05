<!-- Media page for Deltona Victory Chapel -->

<!DOCTYPE html>
<html>
<head>
<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/mediaStyles.css">

<!-- java script files -->
<script src="resources/jquery-3.1.1.min.js"></script>
<script src="js/mediaScript.js"></script>
</head>

<body>
<!-- Wrapper used to position footer and header on page -->
	<div id="wrapper">
		
		<!-- Navigation Bar included from php -->
		<?php
		$thisPage = 'media';
		include_once('navbar.php');
		?>
		<!-- End of Navigation bar -->
		<div style="height: 40px;"></div>
		<section>
			<div style="width: 80%" class="page center shadow-box flex flex-wrap flex-row">
			<span class="title">Photo Gallery Title</span>
				<div class="picture shadow-box">
				<a href="images/media_images2/church0.jpg">
					<img src="images/media_images2/church0.jpg" alt="Image">
				</a>
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church1.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church2.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church3.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church4.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church5.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church6.jpg">
				</div>	
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church7.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church8.jpg">
				</div>
							
			</div>
			<div style="height: 40px;"></div>
			<div style="width: 80%" class="page center shadow-box flex flex-wrap flex-row">
			<span class="title">Photo Gallery Title</span>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church10.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church11.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church12.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church13.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church14.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church15.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church16.jpg">
				</div>	
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church17.jpg">
				</div>
				<div class="picture shadow-box">
					<img class="myImg" src="images/media_images2/church18.jpg">
				</div>


							
		</section>		
		
	
		<div style="height: 40px;"></div>	

		<!-- Modal for opening larger pictures -->
		<!-- The Modal -->
		<div id="myModal" class="modal">

		  <!-- The Close Button -->
		  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

		  <!-- Modal Content (The Image) -->
		  <img class="modal-content" id="img01">

		  <!-- Modal Caption (Image Text) -->
		  <div id="caption"></div>
		</div>



		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>

</body>

</html>