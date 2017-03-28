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
		<!-- 		
		<section id="place_holder">
			
		</section> -->

		<section id="img_galleries">

			<div style="width: 80%" class="page center shadow-box flex flex-wrap flex-row">
			<span class="title">Photo Galleries</span>
			<div id="gallery1" class="picture">
				<img src="https://c1.staticflickr.com/3/2823/33296490890_40571718be_c.jpg" alt="church5">			
				<p>Baptism</p>
				<div class="expand">
					<i class="fa fa-expand fa-3x" aria-hidden="true"></i>
				</div>
			</div>	

			<div id="gallery2" class="picture">
				<img src="https://c1.staticflickr.com/3/2923/33685748525_db322fc4c1_c.jpg" width="800" height="534" alt="church14">
				<p>Fishing Trip</p>
				<div class="expand">
					<i class="fa fa-expand fa-3x" aria-hidden="true"></i>
				</div>
			</div>

			<!--When adding an album fill out this template below
				!!!You must attach albumizer iframe code to handler for this gallery increment the id num each time
			<div id="gallery3" class="picture">
				<img src="your static image source goes here for the album cover photo">
				<p>Fishing Trip</p>
				<div class="expand">
					<i class="fa fa-expand fa-3x" aria-hidden="true"></i>
				</div>
			</div>   -->
		</section>		
		
	
		<div style="height: 40px;"></div>	

		<?php
		include_once('modal.php');
		?>	

		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>

</body>

</html>