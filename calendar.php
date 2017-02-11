
<!-- calendar -->
<div id="calBox" class="flex center flex-wrap calendarDiv shadow-box mobile_hidden">
	<div style="width: 100%;"  class="mobile_hidden ">
	<span class="cal_title center">Weekly Events</span> 
	
	<table class="center" id="week" >	

	<tr class="calHead">
	<!-- Back button -->
	<td style="text-align: left;">
	<i id="back" class="fa fa-step-backward fa-2x calBtn" aria-hidden="true"></i>
	</td>
	<!-- Week Name -->
	<td colspan="5" style="border:none; text-align: center;">
	<span id="weekName"></span>
	</td>
	<!-- forward button -->
	<td style="text-align: right;">
	<i id="fwd" class="fa fa-step-forward fa-2x calBtn" aria-hidden="true"></i>
	</td>
	</tr>
	<tr style="height: 15px;"></tr>
	<tr id="daysHead">
		<th>Monday</th>
		<th>Tuesday</th>
		<th>Wednesday</th>
		<th>Thursday</th>
		<th>Friday</th>
		<th>Saturday</th>
		<th>Sunday</th>
	</tr>
	<tr id="weekRow">
		<!-- Monday -->
		<td>
		<span id="day_1" class="day"></span>
		<ul id="event_sec_1" class="events">
		</ul>
		</td>
		<!-- Tuesday -->
		<td>
		<span id='day_2' class="day"></span>
		<ul id="event_sec_2" class="events">						
		</ul>
		</td>
		<!-- Wednesday -->
		<td>
		<span id="day_3" class="day"></span>
		<ul id="event_sec_3" class="events">						
		</ul>
		</td>
		<!-- Thursday -->
		<td>
		<span id="day_4" class="day"></span>
		<ul id="event_sec_4" class="events">
		</ul>
		</td>
		<!-- Friday -->
		<td>
		<span id="day_5" class="day"></span>
		<ul id="event_sec_5" class="events">
		</ul>
		</td>
		<!-- Saturday -->
		<td>
		<span id="day_6" class="day"></span>
		<ul id="event_sec_6" class="events">					
		</ul>
		</td>
		<!-- Sunday -->
		<td>
		<span id="day_7" class="day"></span>
		<ul id="event_sec_7" class="events">
		</ul>					
		</td>

	</tr>				
	</table>
	</div>	
	<!-- Event box with event details -->
	<div style="text-align: center; clear: both;" class="mobile_column">
		<!-- spacer -->
		<div id="event_top" style="height: 40px;"></div>


		<div id="event_box">
	
		<div id="event_img">
			<a id="imgLink" target="_blank" >
			<img id="dispImg" src="images/originalFlyer.png">
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



<!-- Calendar files -->
<!-- Javascript files -->
<script src="resources/moment.js"></script>
<script src="js/displayCalendar.js"></script>
<!-- style sheet -->
<link rel="stylesheet" type="text/css" href="css/calendarStyles.css?ver=1.0">