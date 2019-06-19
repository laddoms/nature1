<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>	
		<html lang="en">
		<meta name="description" content="Western Massachusetts Children's Nature Exploration Project Images of nature, rocks, mountains, clouds, leaves, trees, fungi, shadows, and
		. Resources for parents and children. Ways to get back to nature. Outdoor activities for children" />
		<meta name="keywords" content="Nature, children in nature, parents in nature, childrens activities, western Massachusetts, hiking,
		climbing, exploration" />
		<meta name="author" content="Laurie Addoms">
		<!--meta name="google-site-verification" content="SgSoecd7wlU8s7ZpugWhIgYAJd5VMNL3RKI4zTEtUl8" /-->
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name=viewport content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet"> 
		<meta http-equiv="content-type" content="text/html;charset=uts-8" />
		<title>Western Massachusetts Children's Nature Exploration Project </title>
		<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    	<link href="styling.css" type="text/css" rel="stylesheet" />
</head>
<html>
	<link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet"> 
<body>
	<div id="contactwrapper">
		<?php include('header.inc.php'); ?>	
		<div id="logo">
			<img src="images/logo.png" alt="western mass children in nature project">
		</div>
		<div id="foximg">
			<img src="images/fox.jpg" alt="image of a fox">
		</div>
		<?php include('nav.inc.php'); ?>
		<div id="contactcontent">
			<div id="contact">
				<p><a href="mailto:laurie@westernmassnatureexploration.com"></p>
				<p><B>Contact Us via Email at </p>
				<p>Laurie@westernmassexplorenatureproject.com.</p></B></a>
				<p>Or via the form on the right</p><br />
			</div>
			<form method="post" action="contact.inc.php" name="contactform" id="contactform" onsubmit="return validateSubmit()">
				<fieldset><legend>Contact Us:</legend>
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
				</fieldset>
			</form>
		</div>
		
	</div>
	<?php
		require('PHPMailer.php');
		require('Exception.php');
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
	
		if($_SERVER['REQUEST_METHOD']=='POST')
			{
				if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['message']))
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
				else
					{
						echo"please fill in the form completely";
					}
			}
	?>		
	
		<script src="jsfunctions.js"></script> 
<?php include("footer.inc.php");?>
<script src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
	$(function(){
	  $('a').each(function() {
		if ($(this).prop('href') == window.location.href) {
		  $(this).addClass('current');
		}
	  });
	});
</script>
</body>
</html>	