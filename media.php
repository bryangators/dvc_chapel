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
				
		<section id="place_holder">
			<!-- <div style="width: 80%" class="page center shadow-box flex flex-wrap flex-row">
			 	<div class="title">
			 	<div id="placeholder-title"></div>
			 	</div>

				<div class="placeholder-picture shadow-box">
					<span class="placeholder-img-cont"><i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i></span>
				</div>
				<div class="placeholder-picture shadow-box">
					<span class="placeholder-img-cont"><i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i></span>
				</div>
				<div class="placeholder-picture shadow-box">
					<span class="placeholder-img-cont"><i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i></span>
				</div>
				<div class="placeholder-picture shadow-box">
					<span class="placeholder-img-cont"><i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i></span>
				</div>	
				<div class="placeholder-picture shadow-box">
					<span class="placeholder-img-cont"><i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i></span>
				</div>
				<div class="placeholder-picture shadow-box">
					<span class="placeholder-img-cont"><i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i></span>
				</div> 
							
			</div> -->
		</section>

		<section id="img_galleries">
			<div style="width: 80%" class="page center shadow-box flex flex-wrap flex-row">
			 		<!-- Images will be dynamically loaded here -->
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