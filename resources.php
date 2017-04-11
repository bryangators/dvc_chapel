<!-- Resources page for Deltona Victory Chapel -->

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
<link rel="stylesheet" type="text/css" href="css/resourcesStyles.css?v=<?php echo $version; ?>">

<!-- java script files -->
<script src="resources/jquery-3.1.1.min.js"></script>
<script src="js/resources.js?v=<?php echo $version; ?>"></script>




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
			<div class="resource-wrap center page shadow-box">
				<span class="title">Resources</span>
				<div id="link-container" class="flex">
					<div><a target="new" href="http://www.worldcfm.com/">
						<img src="images/worldcfm.png">
					</a></div>

					<div><a target="new" href="http://www.prescottpottershouse.com/">
						<img src="images/prescott.png">
					</a></div>
				</div>
			
			</div>
		</section>

		<div style="height: 20px;"></div>

		<section>
			<div style="text-align: center;" class="resource-wrap page center shadow-box">
				<span class="title">Christian Fellowship Ministries Map</span>
				<p>Below is an interactive map of all of our churches around the world.</p>
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