<!-- ///////////////////////////////////////////////////////////
//Navigation bar to be include throughout website/
//This file links javascript and css files associated 
//the navbar and footer as well as general styling and rules 
////////////////////////////////////////////////////////////// -->

<!-- Version for caching -->
<?php
include('php/site_version.php')
?>

<!--meta data -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<!-- CSS files -->
<link rel="stylesheet" type="text/css" href="css/headerFooterStyles.css?v=<?php echo $version; ?>">
<link rel="stylesheet" type="text/css" href="css/generalPageStyles.css?v=<?php echo $version; ?>">
<link rel="stylesheet" href="resources/fontawesome/css/font-awesome.min.css">
<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<!-- Javascript file -->
<script src="js/navbar.js?v=<?php echo $version; ?>"></script>


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
			
			<!-- Links for Nav Bar -->
			
			
			<?php if ($thisPage != 'admin' and $thisPage != 'eventadmin') { ?>
				
				<span id="logoWrap">
				<a id="logoLink" href="index.php">
				<img id="logoImg" src="images/logo1.png" >
				</a>
				</span>
				<span id="links" class="mobile_hidden">		
				<ul>		
					<li >
					<a href="index.php">Home</a>
					</li>	
					
					<li <?php if($thisPage == 'about') echo "id = 'currentPage'";?> >
					<a href="about.php" >About</a>
					</li>
					

					<!-- this page is deleted until pastor gives teestimonials
					<li <?php // if($thisPage == 'ministries') echo "id = 'currentPage'";?> >
					<a href="ministries.php">Ministries</a>
					</li> -->


					<li class="dropdown" <?php if($thisPage == 'events') echo "id = 'currentPage'";?> >
					<a href="events.php" class="dropbtn">Events&nbsp;
					<i class="fa fa-caret-down" aria-hidden="true"></i>
					</a>
					<div id="event_links_wrap" class="dropdown-content">
						     				      
					</div>
					</li>

					<li <?php if($thisPage == 'resources') echo "id = 'currentPage'";?> >
					<a href="resources.php">Resources</a>
					</li>

					<li <?php if($thisPage == 'media') echo "id = 'currentPage'";?> >
					<a href="media.php">Media</a>
					</li>
					
					<li <?php if($thisPage == 'contact') echo "id = 'currentPage'";?> >
					<a href="contact.php">Contact</a>
					</li>			
				</ul>			
				</span>
				<span id="mobile_btn" class="mobile_show">
					<i id="menuBar" class="fa fa-bars fa-2x" aria-hidden="true"></i>
				</span>
			<?php }
				else{ ?>
				<br>
				<span style="font-size: 2em;" id="links" >
					
				<?php if ($thisPage == 'admin') {
					echo "Administrator Page";
					}else{
						echo "Event Creator";
					}
				?>	
						
				</span>
				<br><br>
				<?php }	?>
				
				</div>

				</header>
			</div>
			<!-- Spacer for normal screens-->
			<div class="mobile_show" style="height: 65px;"></div>
			<!-- Spacer for mobile screens-->	
			<div class="mobile_hidden" style="height: 85px;"></div>
		
		<!-- This starts page content -->
		<div id="content">

		<section>
		<div id="mobile_menu" class="mobile_show">					
			<ul>
				<a href="index.php">		
				<li>Home</li>
				</a>	
				
				<a href="about.php">
				<li>About</li>
				</a>

				<!-- <a href="ministries.php">
				<li >Ministries</li>
				</a> -->

				<a href="events.php">
				<li>Events</li>
				</a>
				
				<a href="resources.php">
				<li>Resources</li>
				</a>

				<a href="media.php">
				<li>Media</li>
				</a>
				
				<a href="contact.php">
				<li>Contact</li>	
				</a>

			</ul>				
		</div>
	</div> 
	</section>

