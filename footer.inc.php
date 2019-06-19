<footer>
	<div id="footerleft"><br /><br /><br /><br /><br />
		<img src="images/jump.jpg" alt="boy jumping">
		<br /><br />
		<p><a href="mailto:laurie@westernmassexplorenatureproject.com/"></p>
		<p><B>Contact Us via Email at </p>
		<p>laurie@westernmassexplorenatureproject.com/</p></B></a>
		<p>Or via the form on the right</p><br />
		<p style="font-size:.9em;"><b><a href="share.inc.php">Share your Nature Activities Here</p></b></a>
	</div>
	<?php
		//require('PHPMailer.php');
		//require('Exception.php');
		//use PHPMailer\PHPMailer\PHPMailer;
		//use PHPMailer\PHPMailer\Exception;
		if($_SERVER['REQUEST_METHOD']=='POST')
			{
				if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['comments']))
					{
						$email=$_POST['email'];
						$firstname=$_POST['firstname'];	
						$lastname=$_POST['lastname'];
						$message=$_POST['message'];
						$emailmessage="NAME:$firstname . ' ' .$lastname\n\nMessage:$message";
						htmlspecialchars($emailmessage, ENT_QUOTES);
						$message=wordwrap($emailmessage, 70, "\r\n");
						$subject='Contact Form Submission';
						$headers = 'From: Western Mass Nature Exploration' . "\r\n";
						if(mail('addoms@comcast.net', $subject, $emailmessage, $headers))
							{
								echo"<div id='contactForm'><p><em>Message sent successfully.</p>
									<p>Thank you for submitting the contact form.</p></em></div>";
							}
						else
							{
								echo"<div id='contactForm'>Message failed to send. Please try again.</div>";
							}
						$_POST=array();  //clear out the variables
					}
			}
	?>		
	<form method="post" name="footerForm" id="footerForm" onsubmit="return validateSubmit()">
			<div id="footercenter">
				<p>First Name:</p>
				<p>
					<input type="text" size="22" name="firstname" id="firstname" placeholder="Enter your first name">
				</p>
				<p>Last Name:</p>
				<p>
					<input type="text" size="22" name="lastname" id="lastname" placeholder="Enter your last name">
				</p>
				<p>Email Address:</p>
				<p>
					<input type="text" name="email" size="30" id="email" placeholder="Enter your email address">
				</p>
				<p>Message:</p>
				<p>
					<textarea rows="5" cols="27" name="message" id="message" placeholder="Enter your message"></textarea>
					<input type="submit" name="submit" value="Contact Us" >
				</p>
				<input type="hidden" name="contact" value="contactus">  
			</div>
		</form>
		<script src="js/jsfunctions.js"></script> 
	<div id="footerright">
			<p style="margin-left:3px;"><b>SITE MAP</p></b>
			<p><a href="index.php">Home</a></p>
			<p><a href="about.php">About Us</a></p>
			<p><a href="activities.php">Activities for Kids</a></p>
			<p><a href="share.inc.php">Share an Activity</a></p>
			<p><a href="aboutndd.php">Learn About NDD</a></p>
			<p><a href="naturenews.php">Nature News</a></p>
			<p><a href="events.php">Upcoming Fun Events</p></a>
			<p><a href="contact.inc.php">Contact Us</a></p>
			<br /><br /><br />
			<p style="line-height:1.2em;">&copy;2019 Western Massachusetts Children's Nature Exploration Project</p>
			<br />
			
	</div>
	
</footer>