<!-- Media page for Deltona Victory Chapel -->

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
<link rel="stylesheet" type="text/css" href="css/mediaStyles.css?v=<?php echo $version; ?>">

<!-- java script files -->
<script src="resources/jquery-3.1.1.min.js"></script>
<script src="js/mediaScript.js?v=<?php echo $version; ?>"></script>
</head>

<body>
<!-- Wrapper used to position footer and header on page -->
	<div id="wrapper">
		
		<!-- Navigation Bar included from php -->
		<?php
		$thisPage = 'media';
		include_once('navbar.php');
		?>
		

		<section id="img_galleries">

			<div class="media-wrap page center shadow-box flex flex-wrap flex-row">
			<span class="title">Photo Galleries</span>
			<div id="gallery1" class="picture">
				<img src="https://c1.staticflickr.com/3/2823/33296490890_40571718be_c.jpg" alt="church5">			
				<span class="gallery-title">Baptism</span>
				<div class="expand">
					View Gallery
				</div>				
			</div>	

			<div id="gallery2" class="picture">
				<img src="https://c1.staticflickr.com/3/2923/33685748525_db322fc4c1_c.jpg" width="800" height="534" alt="church14">
				<span class="gallery-title">Fishing Trip</span>
				<div class="expand">
					View Gallery
				</div>
				
			</div>

			</div>
				<div style="height: 40px;"></div>
			<div class="media-wrap center shadow-box page">
				<div style="height: 20px;"></div>
				<span class="title">Reaching the World</span>
				<div style="height: 20px;"></div>
				<div class="img_wrap">
					<img src="images/leg.jpg">
				</div>

				<div style="height: 40px;"></div>
				
				<p id="heading" style="color: red;">
				Beechboro, Western Australia<br>
				The Potter’s House<br>
				Pastor Tom Payne<br>
				Corres: Jack Hobbs<br>
				Beecboro, Perth, Western Australia<br>
		 		</p>
		 		<br>
		 		<br>
		 		<p style="font-weight: bold; text-align: center;">			 
					Praise God for revival in Beechboro.
				</p>
				<br>				
		 		<p>
					In October, the church capitalised on Halloween by creating a House of Horrors. 16 victims at a time were transported on a motorized platform through 7 scenes. “The Devil” led them through his house of hellish horrors demonstrating his handiwork. Complete with stunning SFX that were sure to scare the Heck out of you. Held over three nights, we saw 350+ visitors and 110-recorded salvations.
				</p>
				<br>
		 		<p>			 
					Over our summer, the disciples set up concerts and movies in the parks. This has been a fruitful time of discipleship, raising up men and seeing souls saved! Disciples saw responses of up to 50 souls in one event! In the month of January alone, the collective effort of the church saw 200 souls saved. God is incredible.
				</p>
				<br>
				<p>			 
					In March, Pastor Mitchell demonstrated the power of Jesus Christ at our annual Miracle Healing crusade. Many nationalities were represented. There were at least 52 decisions for Christ, and 17 demonstrated miracles. 
				</p>
				<br>
				<p>			 
					Our annual Easter march continues to draw crowds in our city centre. Roman centurions crucify Jesus. With slight of hand a resurrected Jesus is then presented, followed by testimonies and an altar call. Hundreds of people heard the gospel and souls were saved.
				</p>
				<br>
				<p>			 
					Ps Mitchell then preached our Miracle Increase conference. In the last year the church has sent out four couples, two of which were international including a church into China.
				</p>
				<br>
				<p>			 
					In April, the church held an Anzac Day dawn service. The event honoured soldiers who shed their blood for our freedom and Jesus Christ who shed His blood for our salvation. An estimated 750 people attended, with 500 visitors. Preceding the dawn service, a traditional breakfast was held with a gospel presentation. A powerful testimony by an Army Captain from our fellowship resulted in 6 souls saved.
				</p>
				<br>
				<p>			 
					The church received a shot in the arm of the Holy Ghost as Ev. Kris Hart preached revival. God moved powerfully with 18 demonstrated miracles. One disciple had a short leg grow out and then was given a word that he would be involved in the supernatural. Ev. Kris Hart then asked that disciple to pray for a new convert who’s leg also then grew out! Many Visitors, 13 filled with the Holy Ghost and 8 people saved!
				</p>
				<br>
				<p style="font-weight: bold;text-align: center;">			 
					Please continue to pray for the Beechboro congregation.
				</p>
				<br>
				<div style="height: 40px;"></div>
				
			</div>

	
	
		</section>		
		
	
		<div style="height: 40px;"></div>	

		<?php
		include_once('modal.php');
		?>	

		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>

</body>

</html>