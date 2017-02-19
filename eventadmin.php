<!-- ///////////////////////////////////////////////////////
//This is a template page to get started when making new  //
//pages thoughout the site. Copy this code then edit copy //
////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////
//*********DO NOT MAKE CHANGES TO THIS FILE**************//
////////////////////////////////////////////////////////// -->

<!DOCTYPE html>
<html>
<head>
<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/eventadminStyles.css">

<!-- java script files -->
<script src="resources/modernizr-1.5.js"></script>
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
					<input type="file" name="file" id="file" class="inputfile" />
					
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
				<button>Save</button>			
			</span>
			</div>
			
			</div>
		</section>
		<div style="height: 40px"></div>
			

			<!-- The Modal -->
			<div id="myModal" class="modal">

			
			  <!-- Modal content -->
			  <div class="modal-content">
			   <!-- Modal header -->
			  	<div class="modal-header">
			    <span class="close">&times;</span>
			    <h3>Event Scheduler</h3>
		  		</div>

		  		<!-- Modal Body -->
		  		<div class="modal-body">
		  		<form id="event_form">
			    <table id="event_scheduler">
			    <tr>
					<td>
					Recurring Event?
					</td>
					<td>
					<input id="r1" class="radio" type="radio" name="choice" value="Yes">Yes
					<input id="r2" class="radio" type="radio" name="choice" value="No" checked="checked">No
					</td>
				</tr>
				
				<tr>
					<td>
					Event Time:
					</td>
					<td>
					<input style="width: 130px;" type="Time" name="ev_time">
					</td>
				</tr>

				<tr>
					<td>
					Date
					</td>
					<td>
					<input style="width: 130px;" type="Date" name="ev_time">
					</td>
				</tr>
				
				<tr class="rpt_input">
					<td>
					Frequency:
					</td>
					<td>
					<select id="freq_sel" style="width: 144px;">
						<option value="daily">Daily</option>
						<option value="weekly">Weekly</option>
						<option value="monthly">Monthly</option>
					</select>
					</td>
				</tr>

				<tr class="wday_input">
					<td>
					Which Day?
					</td>
					<td>
					<select id="wDays" style="width: 144px;">
						<option value="1">Mondays</option>
						<option value="2">Tuesdays</option>
						<option value="3">Wednesdays</option>
						<option value="4">Thursdays</option>
						<option value="5">Fridays</option>
						<option value="6">Saturdays</option>
						<option value="7">Sundays</option>
					</select>
					</td>
				</tr>

				<tr class="rpt_input">
					<td>
						Til When:
					</td>
					<td>
						<input id="end_date" style="width: 130px;" type="Date" name="end_date">
					</td>					
				</tr>
				<tr class="rpt_input">
					<td></td>			
					<td>	
						<div>
						<input style="display: inline; width: 15%;" type="checkbox" id="chk_box" value="first_checkbox">			
						<label style="display: inline; font-size: 0.8em; vertical-align: top;" for="chk_box">Does not end...</label>
						</div>	
					</td>
				</tr>
				</table>
				</form>
				</div>
				<!-- end of modal body -->

				<!-- modal footer -->
				<div class="modal-footer">
			    	<span class="modal_buttons">
			    		<button id="add_meta_data">Add</button>
			    		<button onclick="closeAndClearModal();" id="cancel_meta_data">Cancel</button>
			    	</span>
			  	</div> 
			  	<!-- end of modal footer -->
			  </div>

			</div>
			<!-- End of Modal -->



		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		

	
	</div><!-- #wrapper -->
	
</body>



</html>