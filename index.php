<!DOCTYPE html>
<html>
<head>
<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/indexStyles.css?ver=1.0">
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


		<!-- /////////////////////////////////////////////////
		////All content will go inside the content div below//
		///////////////////////////////////////////////////// -->

		<!-- content -->
		<div id="content">
		
		<!-- Section 1 with prayer image -->
		<section id="sec1" class="max_width">	
			<div class="bgImage max_width">	
			<img class="mobile_hidden" src="images/prayer111.png">
			<img class="mobile_show" src="images/prayer1mob.png">
			</div>	
		</section>
		<!-- End of First Sectiion -->

		<!-- Second Section of homepage with verse, calendar and text boxes -->
		<section id="sec2">
		<!-- prayer quote -->
			<div class="flex flex-row flex-wrap center quote_wrap">
			<div class="quote_box box">
				<p>
					He said to them, “Go into all the world and preach the gospel to all creation."
				</p>
				<span style="padding-right: 3em;">- Mark 16:15</span>
			</div>
			</div>

			<!-- spacer -->
			<div style="height: 40px;"></div>

			



			
			<div style="height: 40px;"></div>
			<div class="flex flex-row flex-wrap center">
				<div class="text_box box">
				<div class="img_container">
				<img src="images/child.png">
				</div>
				<div class="textDesc">
					<h2>Changing Lives</h2>
					<p>
						CHANGE! Jesus told a prostitute, "Go and sin no more," Paul told the Romans to reckon themselves dead unto sin and not to let sin reign in their mortal bodies. Though you are still able to sin, you no longer need to. You don't need to spend years picking at your sins, just believe God and change your way of living based on the power of what Christ has done. It is our goal as a church to learn and live the truths of Scripture. We live in the last days and an hour when the most exciting challenge in life is to be a disciple of Jesus Christ.
					</p>
				</div>
				</div>
				<div class="text_box box">
				<div class="img_container">
				<img src="images/worship.png">
				</div>
				<div class="textDesc">
					<h2>Disciples</h2>
					<p>
					Discipleship is the shaping of an individual's destiny. Each church in the New Testament copied Jesus' method of calling those whom God had chosen and training them through example and release. The book of Acts demonstrates the powerful impact that is possible to those who take Jesus' command and pattern seriously. Our vision is the restoration of the Biblical pattern of church growth. We believe that honest, direct and anointed preaching has always been used by God to shake the nations.			
					</p>
				</div>
				</div>
				<div class="text_box box">
				<div class="img_container">
				<img src="images/crowd.png">
				</div>
				<div class="textDesc">
					<h2>Reaching the World</h2>
					<p>
					The Bible is the guidebook of the Christian life and preaching is Gods method of bringing it to the hearts of God's people. We believe that honest, direct and anointed preaching has always been used by God to shake the nations. In an age of low commitment, many seek to hear a watered-down message, but it is our firm belief that God is raising up a people hungry for the meat of the word. That is why our order of worship is centered around the preaching of the gospel.	
					</p>
				</div>
				</div>
			</div>
			
		</section>

		<!-- Weekly Events Calendar -->
			<?php
			include_once('calendar.php');
			?>
			<!-- End Calendar -->
				
		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>

</body>

</html>

