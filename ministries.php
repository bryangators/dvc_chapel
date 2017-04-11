<!-- ///////////////////////////////////////////////////////
//This is a template page to get started when making new  //
//pages thoughout the site. Copy this code then edit copy //
////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////
//*********DO NOT MAKE CHANGES TO THIS FILE**************//
////////////////////////////////////////////////////////// -->

<!-- Version for caching -->
<?php
include('php/site_version.php')
?>

<!DOCTYPE html>
<html>
<head>

<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="images/favicon/manifest.json">
<link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="images/favicon/favicon.ico">
<meta name="msapplication-config" content="images/favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">

<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/ministriesStyles.css?v=<?php echo $version; ?>">

<!-- java script files -->
<script src="resources/jquery-3.1.1.min.js"></script>
</head>

<body>
<!-- Wrapper used to position footer and header on page -->
	<div id="wrapper">
		
		<!-- Navigation Bar included from php -->
		<?php
		$thisPage = 'ministries';
		include_once('navbar.php');
		?>
		<!-- End of Navigation bar -->


		<!-- ///////////////////////////////////////////////////
		////All content will go inside the content div below////
		///Use sections and flex_parent class to align content//
		/////////////////////////////////////////////////////// -->

		<!-- Use sections -->
		
	
				
		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>

</body>

</html>