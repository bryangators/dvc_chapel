<?php
//login protection will redirect to login screen if user is not logged in
include('../../dvc_private/loginProtect.php');
include('php/uploadImage.php');
?>


<!DOCTYPE html>
<html>
<head>
<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/eventadminStyles.css">

<!-- java script files -->
<script src="resources/jquery-3.1.1.min.js"></script>
<script src="js/eventadmin.js"></script>
</head>

<body>
<!-- Wrapper used to position footer and header on page -->
	<div id="wrapper">
		
		<!-- Navigation Bar included from php -->
		<?php
		$thisPage = 'eventadmin';
		include_once('navbar.php');
		?>
		<!-- End of Navigation bar -->


		<!-- ///////////////////////////////////////////////////
		////All content will go inside the content div below////
		///Use sections and flex_parent class to align content//
		/////////////////////////////////////////////////////// -->

		<!-- Use sections -->
		<div class="mobile_show" style="height: 40px"></div>
		<section >
			<div class="page center shadow-box admin_page">			
			<div id="table_wrap" class="center">
			<span class="admin_title">New Event</span>
			<br>
			<form action="" method="post" class="center" id="event" enctype="multipart/form-data">
			<table id="add_event" >
			<tr>
				<td>
				<label>Event Title:</label>
				</td>				
			</tr>
			<tr>
				<td>
				<input id="ev_title" type="text" name="event_title">
				</td>
			</tr>
			<tr>
				<td>
				<label>Image:</label>
				</td>				
			</tr>
			<tr>
				<td>
					<input type="file" name="fileToUpload" class="inputfile" id="fileToUpload">
					
				</td>
			</tr>
			<tr>
				<td>
				<label>Description:</label>
				</td>				
			</tr>
			<tr>
				<td>
				<textarea id="ev_desc" name="desc1" rows="6"></textarea>
				</td>				
			</tr>
			<tr>
				<td>
				<label>Speaker(s):</label>
				</td>								
			</tr>
			<tr>
				<td>
				<input id="ev_spk1" type="text" name="event_title">
				</td>
			</tr>
			<!-- Event schedule section  -->
			</table>
			<div class="event_times">
				<span class="admin_title">Scheduled Occurrences</span>
				<br>
				<button id="add_event_meta">Schedule Event</button>
				<br>
				<div id="empty_msg">*Currently no scheduled times exist.</div>							
			</div>
			<span style="text-align: center;" class="form_btns">
				<input id="save_event" type="submit" name="submit" value="Save">
				<br>
				<b><?php echo $msg; ?></b>	
			</span>
			</form>
			</div>
			
			</div>
		</section>
		<div style="height: 40px"></div>
		
		<?php
		include_once('modal.php');
		?>	

			



		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		

	
	</div><!-- #wrapper -->
	
</body>



</html>