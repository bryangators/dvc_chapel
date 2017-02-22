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
<link rel="stylesheet" type="text/css" href="css/eventsStyles.css">

<!-- java script files -->
<script src="resources/modernizr-1.5.js"></script>
<script src="resources/jquery-3.1.1.min.js"></script>
<script src="js/eventScript.js"></script>
</head>

<body>
<!-- Wrapper used to position footer and header on page -->
	<div id="wrapper">
		
		<!-- Navigation Bar included from php -->
		<?php
		$thisPage = 'events';
		include_once('navbar.php');
		?>
		<!-- End of Navigation bar -->


		<!-- ///////////////////////////////////////////////////
		////All content will go inside the content div below////
		///Use sections and flex_parent class to align content//
		/////////////////////////////////////////////////////// -->
		<!-- Spacer -->
		<div style="height: 40px;"></div>

		<section>
			<div class="page center shadow-box event-container">
				<span class="title">Events</span>
				<p class="text center">
					At Deltona Victory Chapel we offer a variety of ministries and events. Please have a look below to discover any events you might be interested in. Also have a look at our weekly calendar to keep up with scheduled events.
				</p>
			</div>
		</section>

		

		<!-- Spacer -->
		


		<!-- Use sections -->
		<section id="event_section">
			<!-- Event box with event details -->
				
			
		</section>
		
		
		

		
		<div style="height: 40px;"></div>
		<section class="page_section mobile_hidden">
		<!-- Weekly Events Calendar -->
		<?php
		//cal width needs to be specified for width of calendar
		$calWidth = '80%';
		include_once('calendar.php');
		?>
		</section>
		<!-- End Calendar -->
		</div><!-- end of page content -->


		
		<div style="height: 40px;"></div>
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>


</html>