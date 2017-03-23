<?php
//login protection will redirect to login screen if user is not logged in
include('../../dvc_private/loginProtect.php')
?>

<!DOCTYPE html>
<html>
<head>
<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/eventadminStyles.css">

<!-- java script files -->
<script src="resources/moment.js"></script>
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

		<!-- Navigation bar for admin pages -->
		<div id="under-bar" >
					<a href="admin.php">
					Home
					</a>
					<a href="logout.php">
					Logout
					</a>
		</div>
		<!-- End of admin nav -->
		<div style="height: 10px"></div>

		<section id="ev-main-page">
			<div class="ev-container flex flex-wrap flex-row">
			<div id="new-event-box" class=" ev-box shadow-box">
					<span>
					New	Event
					<br>
					<i class="fa fa-plus" aria-hidden="true"></i>
					</span>
			</div>
					
			</div>

		</section>


		<section id="ev-editor">
			<div class="page center shadow-box event_page">
			<span class="x-ev-box" style="float: right;">
			<i class="fa fa-times fa-2x" aria-hidden="true"></i>
			</span>	
			<div id="table_wrap" class="center">
			<span id="ev_main_title" class="admin_title">New Event</span>
			<br>
			
			<table id="add_event" >
			<tr>
				<td>
				<label>Event Title:</label>
				<span class="edit" title="title" ><i class="fa fa-pencil" title="Edit" aria-hidden="true"></i></span>	
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
				<span class="edit" title="image">
				<i class="fa fa-pencil" title="Edit" aria-hidden="true"></i>
				</span>
				</td>				
			</tr>
			<form action="" method="post" class="center" id="ev-image" enctype="multipart/form-data">
			<tr>
				<td>				
					<input type="file" name="fileToUpload" class="inputfile" id="fileToUpload">					
				</td>				
			</tr>
			</form>
			<tr>
				<td>
				<div style="font-weight: bold; display: inline;" id="current_img">
					<!-- current image will be displayed here -->
				</div>
				
				</td>

			</tr>
			<tr>
				<td>
				<label>Summary:</label>
				<span class="edit" title="summary">
				<i class="fa fa-pencil" title="Edit" aria-hidden="true"></i>
				</span>
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
				<span class="edit" title="speaker">
				<i class="fa fa-pencil" title="Edit" aria-hidden="true"></i>
				</span>
				</td>								
			</tr>
			<tr>
				<td>
				<input id="ev_spk" type="text" name="event_title">
				</td>
			</tr>
			
			</table>
			<!-- Event schedule section  -->
			<div class="event_times">
				<span id="sched_title" class="admin_title">Schedule</span>
				<br>
				<div id="meta_schedule">
					
				</div>
				
				<div id="add_event_meta"><span>
				<i class="fa fa-plus fa-lg" aria-hidden="true"></i> New Schedule</span>
				</div>

											
			</div>
			<br>
			<span style="text-align: center;" class="form_btns">
				<button id="save_ev">Save</button>
				<button onclick="closeEvEditor();" id="cancel_ev">Cancel</button>
				<br>					
			</span>
			
			</div>
			
			</div>
		</section>

	<section id="ev_preview">
			<!-- Event box with event details -->
	<div id="preview_box" style="text-align: center; clear: both;" class="mobile_column page center shadow-box">
		<!-- spacer -->
		<div id="event_box">
		<span class="x-ev-box" onclick="closeEvPreview();" style="float: right;">
		<i class="fa fa-times fa-2x" aria-hidden="true"></i>
		</span>
		<br>
		<div id="event_img">
			<a id="imgLink" target="_blank" >
			<img id="dispImg" src="">
			</a>
		</div>

		<table id="event_desc">		
		<tr>
		<td colspan="2" id="event_title">
			Worship Service
		</td>

		</tr>
		<tr>			
		<td >
			<b>When:</b> 
		</td>
		<td id="eventTime">	
		Preview Mode
		</td>
		</tr>
		<tr>
			<td>
				<b>About:</b>
			</td>
			<td colspan="1" id="about">						
			</td>
		</tr>

		<tr>
			<td>
				<b>Speaker(s):</b>
			</td>
			<td colspan="1" id="speaker">
				
			</td>
		</tr>
		</table>
			
			
		</div>	

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