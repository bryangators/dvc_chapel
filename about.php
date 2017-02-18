<!DOCTYPE html>
<html>
<head>
<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/aboutStyles.css">

<!-- java script files -->
<script src="resources/modernizr-1.5.js"></script>
<script src="resources/jquery-3.1.1.min.js"></script>
</head>

<body>
<!-- Wrapper used to position footer and header on page -->
	<div id="wrapper">
		
		<!-- Navigation Bar included from php -->
		<?php
		$thisPage = 'about';
		include_once('navbar.php');
		?>
		<!-- End of Navigation bar -->


		<!-- //////////////////////////////////////////////////////////
		////All content will go below the content div in the header////
		///Use sections and flex_parent class to align content/////////
		/////////////////////////////////////////////////////////// -->

		
		
		<section id="about_sec">
			<div id="stats" class="center shadow-box page">
				<span class="title">Christian Fellowship Ministries</span>
				<ul >
					<li class="first">
					<div class="number">2100</div>
					Churches
					</li>
					<li class="second">
					<div class="number">44</div>
					States
					</li>
					<li class="third">
					<div class="number">117</div>
					&nbsp;&nbsp;Nations
					</li>
				</ul>
			</div>
				
			<div class="about_wrap center shadow-box page">

				<span class="title">Our History</span>

				<p>
					In 1970 Wayman and Nelda Mitchell moved to Prescott to take over a small, struggling congregation. Shortly after arriving, God saved a number of young hippies who were very different than anyone in the church. But as they were welcomed, God began to pour out His Spirit on the congregation.  As Pastor Mitchell sought to reach young people, they saw the possibilities of the “coffee-house” concert ministry. At the first concert they ever tried as an evangelistic tool, more than 200 young people attended, with many saved. Out of this a regular concert ministry was birthed. 2 nights a week, bands played, testimonies of salvation were given and the Gospel was preached, with many being saved each night.
		 		</p>
		 		<p>
					From the beginning, Pastor Mitchell understood that  concert ministry was to be a training ground of ministry development; It was run by young people who were committed to Jesus and His church.  From the beginning, people who had been radically converted sought to share with others what God had done in them. Personal evangelism began to be one of the basic foundations of the church.  Then came impact teams: Groups of people that would travel to other nearby cities to help people there experience what God was doing here. Over time, God began to reveal His plan of discipleship: Training young couples for ministry within a local church.  In 1973 the first couple was launched directly into the ministry – and God blessed them!  Churches then began to be planted throughout the Southwestern United States, and then further across America as converts prayed for the Gospel to be preached in their hometowns.
				</p>
		 		<p>			 
					In 1978 the first couple was planted into another nation – Australia; and we discovered the Gospel worked there, just like it did here.  After that, churches were planted in Mexico, Holland and Germany then as we came to understand God’s global mission more and more, churches began to be planted throughout the world. To date, there are over 2100 churches in 44 US states, and 117 nations of the world.
				</p>
			</div>


		<div style="height: 40px;"></div>
		</section>

		<!-- Page Content goes here -->
				
		
		
		<?php
		include_once('footer.php');
		?>
	</div><!-- end of page content -->	
	</div><!-- #wrapper -->
	
</body>

</body>

</html>