<!-- ///////////////////////////////////////////////////////////
//Navigation bar to be include throughout website/
//This file links javascript and css files associated 
//the navbar and footer as well as general styling and rules 
////////////////////////////////////////////////////////////// -->

<!--meta data -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<!-- CSS files -->
<link rel="stylesheet" type="text/css" href="css/headerFooterStyles.css?ver=1.0">
<link rel="stylesheet" type="text/css" href="css/generalPageStyles.css?ver=1.0">
<link rel="stylesheet" href="resources/fontawesome/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<!-- Favicon links for different devices -->
<link rel="apple-touch-icon" sizes="180x180" href="http://bryankristofferson.com/dvc_chapel/apple-touch-icon.png">
<link rel="icon" type="image/png" href="http://bryankristofferson.com/dvc_chapel/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="http://bryankristofferson.com/dvc_chapel/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="http://bryankristofferson.com/manifest.json">
<link rel="mask-icon" href="http://bryankristofferson.com/safari-pinned-tab.svg" color="#2d70ce">
<meta name="theme-color" content="#ffffff">
<!-- End of Favicon links -->

<title>Deltona Victory Chapel</title>

<!-- Header -->
		<div id="header">
			<header>
			<!-- Navigation Bar -->
			<!-- Logo Image -->
			<div id="navbar">
						
			<img id="logoImg" src="images/logo1.png" >
			<!-- Links for Nav Bar -->
			<span id="links" class="mobile_hidden">
			<ul>		
				<li>
				<a <?php if($thisPage == 'home') echo "id = 'currentPage'";?>
				href="index.php">Home</a>
				</li>	
				<li><a  ,<?php if($thisPage == 'about') echo "id = 'currentPage'";?> 
				href="about.php">About</a></li>
				<li><a <?php if($thisPage == 'ministries') echo "id = 'currentPage'";?> 
				href="ministries.php">Ministries</a></li>
				<li><a <?php if($thisPage == 'events') echo "id = 'currentPage'";?>
				href="events.php">Events</a></li>
				<li><a <?php if($thisPage == 'resources') echo "id = 'currentPage'";?>
				href="resources.php">Resources</a></li>
				<li><a <?php if($thisPage == 'media') echo "id = 'currentPage'";?>
				href="media.php">Media</a></li>
				<li><a <?php if($thisPage == 'contact') echo "id = 'currentPage'";?>
				href="contact.php">Contact</a></li>			
			</ul>			
			</span>
			<span id="menuBar" class="mobile_show">
				<i class="fa fa-bars fa-3x" aria-hidden="true"></i>
			</span>
			</div>
			
			</header>
		</div><!-- #header