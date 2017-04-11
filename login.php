<?php 
session_start();
require_once 'php/authorize.php';
$userid = null;
$userPassword = null;
$msg = '';

if(isset($_POST['userid']) && isset($_POST['userPassword'])){

	$userid = $_POST['userid'];
	$userPassword = $_POST['userPassword'];
   	
	//boolean value for authorized user
	$authorizedUser = authorized($userid, $userPassword);
	
		
	if ($authorizedUser == true){
		header("Location: admin.php");		
	}else{
		$msg = "The email/password combination entered were incorrect.";
	}
}
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
<link href="css/loginStyles.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">

<!-- java script files -->
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

		<div style="height: 70px;"></div>
	
	
		<form name="frmregister"action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
			<table id="loginForm" class="shadow-box center page" border="0">
				<tr>
				<td colspan="2" style="font-size: 2em;text-align: center;">Admin Login</td>	
				</tr>
				<tr style="height: 10px;">
				<td></td>
				<td></td>
				</tr> 
				
				<tr>
					<th><label for="name"><strong>Username:</strong></label></th>
					<td><input class="inp-text" name="userid" id="userid" type="text" size="50" /></td>
				</tr>
				<tr>
					<th><label for="name"><strong>Password:</strong></label></th>
					<td><input class="inp-text" name="userPassword" id="userPassword" type="password" size="50" /></td>
				</tr>
				<tr>
				
					<td colspan="3" class="submit-button-right">
					<input class="send_btn btn" type="submit" value="Submit" alt="Submit" title="Submit" />
					
					<input class="send_btn btn" type="reset" value="Reset" alt="Reset" title="Reset" />
					</td>
					
				</tr>
				<tr>
				<td id="errorMsg" colspan="3">
					<?php echo $msg; ?>					
				</td>
				</tr>
			</table>
		</form>
	
	
		<div style="height: 20px;"></div>		
		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>

</body>

</html>