<!-- ///////////////////////////////////////////////////////
//This is a template page to get started when making new  //
//pages thoughout the site. Copy this code then edit copy //
////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////
//*********DO NOT MAKE CHANGES TO THIS FILE**************//
////////////////////////////////////////////////////////// -->

<!DOCTYPE html>
<html>
<head>
<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/linkYourCSSHere">

<!-- java script files -->
<script src="resources/modernizr-1.5.js"></script>
<script src="resources/jquery-3.1.1.min.js"></script>
</head>

<body>
<!-- Wrapper used to position footer and header on page -->
	<div id="wrapper">
		
		<!-- Navigation Bar included from php -->
		<?php
		$thisPage = 'home';
		include_once('navbar.php');
		?>
		<!-- End of Navigation bar -->


		<!-- ///////////////////////////////////////////////////
		////All content will go inside the content div below////
		///Use sections and flex_parent class to align content//
		/////////////////////////////////////////////////////// -->

		<!-- content -->
		<div id="content">
		
		<!-- Page Content goes here -->
				
		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>

</body>

</html>