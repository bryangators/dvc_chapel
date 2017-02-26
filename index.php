<!DOCTYPE html>
<html>
<head>
<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/indexStyles.css?ver=1.0">
<!-- java script files -->
<script src="resources/jquery-3.1.1.min.js"></script>

<!-- script for daily bible verse -->
<script>
$(document).ready(function(){
$.ajax({
url:'https://dailyverses.net/getdailyverse.ashx?language=kjv&isdirect=1&url=' + window.location.hostname,
dataType: 'JSONP',
success:function(json){	
	$(".loading-div").hide();
	$(".dailyVersesWrapper").prepend(json.html);
}
});
});
</script>
<!-- daily bible verse script -->

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


		<!-- /////////////////////////////////////////////////
		/////////////All content will go ow////////////////////////
		///////////////////////////////////////////////////// -->

		
		
		<!-- Section 1 with prayer image -->
		<section style="background-color: #f4f4f4;">

			<div class="bgImage">	
			<img class="mobile_hidden" src="images/prayer1111.png">
			<img class="mobile_show mob_img" src="images/prayer1mob.png">

			</div>	

		</section>
		
		<section class="page_section">
			<div class="flex flex-row flex-wrap center quote_wrap">
			
			<!-- bible verse api -->	
			<span class="title">Verse of the Day</span>
			<div class="quote_box box">		
			<div class="loading-div" style="text-align: center;">
				<img src="images/loading.gif" alt="Loading">
			</div>
			<div class="dailyVersesWrapper center">
			<div class="dailyVerses linkToWebsite"></div>
			</div>
			</div>
			
			</div>
		</section>

		<section class="page_section">
		<!-- Weekly Events Calendar -->
		<div style="height: 40px;"></div>
		
		<?php
		//calwidth needs to be specified
		$calWidth = '90%';
		include_once('calendar.php');
		?>
		<div style="height: 20px;"></div>
		</section>
		<!-- End Calendar -->

		<section class="page_section mobile_hidden" id="vid-section">
			<div class="center video-wrap" style="width: 100%; height: 555px;">
				<iframe src="https://player.vimeo.com/video/114940044?loop=1&color=b53737&title=0&byline=0&portrait=0" width="100%" height="70%" frameborder="0" ></iframe>
				
			</div>				
		</section>

		<section class="page_section">
			<div style="height: 40px;"></div>
			<div class="flex flex-row flex-wrap center">
				
				<div class="text_box box">				
				<img src="images/child.png">				
					<h2>Changing Lives</h2>
					<p>
						CHANGE! Jesus told a prostitute, "Go and sin no more," Paul told the Romans to reckon themselves dead unto sin and not to let sin reign in their mortal bodies. Though you are still able to sin, you no longer need to. You don't need to spend years picking at your sins, just believe God and change your way of living based on the power of what Christ has done. It is our goal as a church to learn and live the truths of Scripture. We live in the last days and an hour when the most exciting challenge in life is to be a disciple of Jesus Christ.
					</p>				
				</div>

				<div class="text_box box">				
				<img src="images/cross.png">			
					<h2>Making Disciples</h2>
					<p>
					Discipleship is the shaping of an individual's destiny. Each church in the New Testament copied Jesus' method of calling those whom God had chosen and training them through example and release. The book of Acts demonstrates the powerful impact that is possible to those who take Jesus' command and pattern seriously. Our vision is the restoration of the Biblical pattern of church growth. We believe that honest, direct and anointed preaching has always been used by God to shake the nations.			
					</p>				
				</div>
				<div class="text_box box">
				
				<img src="images/crowd.png">	
					<h2>Reaching the World</h2>
					<p>
					The Bible is the guidebook of the Christian life and preaching is Gods method of bringing it to the hearts of God's people. We believe that honest, direct and anointed preaching has always been used by God to shake the nations. In an age of low commitment, many seek to hear a watered-down message, but it is our firm belief that God is raising up a people hungry for the meat of the word. That is why our order of worship is centered around the preaching of the gospel.	
					</p>		
				</div>

			</div>			
		</section>		
	
				
		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>



</html>

