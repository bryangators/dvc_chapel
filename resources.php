<!-- Resources page for Deltona Victory Chapel -->

<!DOCTYPE html>
<html>
<head>
<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/resourcesStyles.css">

<!-- java script files -->
<script src="resources/jquery-3.1.1.min.js"></script>
<script src="js/resources.js"></script>




</head>

<body>
<!-- Wrapper used to position footer and header on page -->
	<div id="wrapper">
		
		<!-- Navigation Bar included from php -->
		<?php
		$thisPage = 'resources';
		include_once('navbar.php');
		?>
		<!-- End of Navigation bar -->
		<div style="height: 40px;"></div>

		<section>
			<div class="resource-wrap center page shadow-box" style="min-height: 400px;">
				<span class="title">Resources</span>
			
			
			</div>
		</section>

		<div style="height: 20px;"></div>

		<section>
			<div style="text-align: center;" class="resource-wrap page center shadow-box">
				<span class="title">Christian Fellowship Ministries Map</span>
				<span class="mobile_hidden map-hint">(click to use map)</span>
				<span class="mobile_show map-hint">(click to open map)</span>
				<div class="maps" id="cfmmap">
				<iframe class="mobile_hidden" src="http://www.cfmmap.org/" width="100%" height="800"></iframe>	
				<a class="mobile_show" href="http://www.cfmmap.org/" target="new">
					<img src="images/cfmmap.png">
				</a>
				</div>
			</div>
			
		</section>

		<div style="height: 20px;"></div>		
		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>

</body>

</html>