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
		<div style="height: 40px;"></div>


		<!-- Use sections -->
		<section>
			<!-- Event box with event details -->
			<div class="event-container center page shadow-box">		

				<div id="event_page_box">			
					<div id="event_page_img">
						<a id="imgLink_page" target="_blank" >
						<img id="dispImg_page" src="images/originalFlyer.png">
						</a>
					</div>

					<table id="event_page_desc">		
					<tr>
					<td colspan="2" id="event_page_title">
						Worship Service
					</td>
					</tr>
					<tr>			
					<td >
						<b>When: </b>
					</td>
					<td id="eventTime_page">	
					Wednesdays at 7pm<br>Sundays at 11am and 7pm				
					</td>
					</tr>
					<tr>
					<td>
						<b>About:</b>
					</td>
					<td colspan="1" id="about_page">
					At Deltona Victory Chapel, our lively worship services are Pentecostal in nature, featuring music, praise, Bible-Based preaching, ministry and prayer for personal needs.						
					</td>
					</tr>
					<tr>
					<td>
						<b>Speaker(s):</b>
					</td>
					<td colspan="1" id="speaker_page">	
					Pastor Joshua Shapiro				
					</td>
					</tr>
					</table>					
				</div>
			</div>						
			
		</section>
		
		<div style="height: 40px;"></div>
		

		<section>
			<!-- Event box with event details -->
			<div class="event-container center page shadow-box">		

				<div id="event_page_box">			
					<div id="event_page_img">
						<a id="imgLink_page" target="_blank" >
						<img id="dispImg_page" src="images/choiceFlyer.png">
						</a>
					</div>

					<table id="event_page_desc">		
					<tr>
					<td colspan="2" id="event_page_title">
						The Choice
					</td>
					</tr>
					<tr>			
					<td >
						<b>When: </b>
					</td>
					<td id="eventTime_page">
					See Calendar for Scheduled Events				
					</td>
					</tr>
					<tr>
					<td>
						<b>About:</b>
					</td>
					<td colspan="1" id="about_page">						
					</td>
					</tr>
					<tr>
					<td>
						<b>Speaker(s):</b>
					</td>
					<td colspan="1" id="speaker_page">					
					</td>
					</tr>
					</table>					
				</div>
			</div>				
		
		</section>



		<section class="page_section mobile_hidden">
		<!-- Weekly Events Calendar -->
		<div style="height: 40px;"></div>
		
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

</body>

</html>