<?php
//login protection will redirect to login screen if user is not logged in
include('php/loginProtect.php')
?>

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
<link href="css/adminStyles.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">

<!-- java script files -->
<script src="resources/jquery-3.1.1.min.js"></script>
</head>

<body>
<!-- Wrapper used to position footer and header on page -->
	<div id="wrapper">

		<!-- Navigation Bar included from php -->
		<?php
		$thisPage = 'admin';
		include_once('navbar.php');
		?>
		<!-- End of Navigation bar -->

		<!-- Navigation bar for admin pages -->
		<div id="under-bar" >
					<a href="logout.php">
					Logout
					</a>
		</div>
		<!-- End of admin nav -->
		<div style="height: 30px"></div>
		<span class="title">Welcome to the administrator page!</span>
		<div style="height: 20px"></div>

		<section>

			<div class="link-container flex">
			<a href="eventadmin.php">
			<div class="page link-box shadow-box">
					<span>
					Event Creator
					</span>
			</div>
			</a>
			<br>

			<a href="logout.php">
			<div class="page link-box shadow-box">
					<span>
					Logout
					</span>
			</div>
			</a>
			</div>

		</section>

		</div><!-- end of page content -->

		<?php
		include_once('footer.php');
		?>

	</div><!-- #wrapper -->

</body>

</body>

</html>
