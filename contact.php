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
<link rel="stylesheet" type="text/css" href="css/contactStyles.css">

<!-- java script files -->
<script src="resources/modernizr-1.5.js"></script>
<script src="resources/jquery-3.1.1.min.js"></script>
</head>

<body>
<!-- Wrapper used to position footer and header on page -->
	<div id="wrapper">
		
		<!-- Navigation Bar included from php -->
		<?php
		$thisPage = 'contact';
		include_once('navbar.php');
		?>
		<!-- End of Navigation bar -->


		<!-- ///////////////////////////////////////////////////
		////All content will go inside the content div below////
		///Use sections and flex_parent class to align content//
		/////////////////////////////////////////////////////// -->

		<!-- Use sections -->
		<div style="height: 50px"></div>
		<section>
			<div class="page center shadow-box">
				<span class="title">Contact Information</span>
				<div id="contact-wrap">
				<div id="details">
					<table id="contact-info">
						<th>
							<h3 style="margin-top: 0px;">Address</h3>
						</th>
						<tr>
							<td>Deltona Victory Chapel</td>
						</tr>
						<tr>
							<td>1200 Deltona Blvd</td>
						</tr>
						<tr>
							<td>Deltona, Fl 32725</td>
						</tr>
						<th>
							<h3>Email</h3>
						</th>
						<tr>
							<td>pastor@deltonavictorychapel.com</td>
						</tr>
						<th><h3>Phone</h3></th>
						<tr>
							<td>407-803-1682</td>
						</tr>
					</table>
				</div>
				<div id="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3493.060228620361!2d-81.27422498576702!3d28.89655827883471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e71122277e0759%3A0x18386072c9cb3ee3!2s1200+Deltona+Blvd%2C+Deltona%2C+FL+32725!5e0!3m2!1sen!2sus!4v1487512716268" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
			</div>
		</section>
		
		<div style="height: 40px"></div>
		<section>
			<div class="page center shadow-box">
			<div id="contact-us">
				<span class="title">Contact Us</span>
				<form>
				<table id="contact-form">
					<tr>
						<td>Name</td>
					</tr>
					<tr>
					<td>
						<input type="name" name="name">
					</td>
					</tr>
					<tr>
						<td>Phone Number</td>
					</tr>
					<tr>
					<td>
						<input type="phoned" name="phone">
					</td>
					</tr>
					<tr>
						<td>Email</td>
					</tr>
					<tr>
					<td>
						<input type="email" name="email">
					</td>
					</tr>
					<tr>
						<td>Message</td>
					</tr>
					<tr>
						<td><textarea rows="10"></textarea></td>
					</tr>
					<tr>
					<td id="submit-td">
						<input id="send-btn" type="submit" value="Send Message">
					</td>
					</tr>
				</table>
				</form>
			</div>
			</div>
		</section>	
		<div style="height: 40px"></div>



		</div><!-- end of page content -->
		
		<?php
		include_once('footer.php');
		?>
		
	</div><!-- #wrapper -->
	
</body>

</body>

</html>