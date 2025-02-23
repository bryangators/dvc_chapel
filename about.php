<!-- About page for Deltona Victory Chapel -->

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
<link rel="stylesheet" type="text/css" href="css/aboutStyles.css?v=<?php echo $version; ?>">

<!-- java script files -->
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

		<section id="about_sec">
			<div id="stats" class="about_wrap center shadow-box page">
				<span class="title">Christian Fellowship Ministries</span>
				<ul >
					<li class="first">
					<div class="number">2400+</div>
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
				<div style="height: 20px;"></div>
			</div>

			<div style="height: 40px;"></div>

			<div class="about_wrap center shadow-box page">
				<div style="height: 20px;"></div>
				<span class="title">Our History</span>
				<br>
				<p>
					In 1970 Wayman and Nelda Mitchell moved to Prescott to take over a small, struggling congregation. Shortly after arriving, God saved a number of young hippies who were very different than anyone in the church. But as they were welcomed, God began to pour out His Spirit on the congregation.  As Pastor Mitchell sought to reach young people, they saw the possibilities of the “coffee-house” concert ministry. At the first concert they ever tried as an evangelistic tool, more than 200 young people attended, with many saved. Out of this a regular concert ministry was birthed. 2 nights a week, bands played, testimonies of salvation were given and the Gospel was preached, with many being saved each night.
		 		</p>
		 		<br>
		 		<p>
					From the beginning, Pastor Mitchell understood that  concert ministry was to be a training ground of ministry development; It was run by young people who were committed to Jesus and His church.  From the beginning, people who had been radically converted sought to share with others what God had done in them. Personal evangelism began to be one of the basic foundations of the church.  Then came impact teams: Groups of people that would travel to other nearby cities to help people there experience what God was doing here. Over time, God began to reveal His plan of discipleship: Training young couples for ministry within a local church.  In 1973 the first couple was launched directly into the ministry – and God blessed them!  Churches then began to be planted throughout the Southwestern United States, and then further across America as converts prayed for the Gospel to be preached in their hometowns.
				</p>
				<br>
		 		<p>
					In 1978 the first couple was planted into another nation – Australia; and we discovered the Gospel worked there, just like it did here.  After that, churches were planted in Mexico, Holland and Germany then as we came to understand God’s global mission more and more, churches began to be planted throughout the world. To date, there are over 2100 churches in 44 US states, and 117 nations of the world.
				</p>
				<br>
				<div style="height: 20px;"></div>
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
