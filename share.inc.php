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
	<div id="sharewrapper">
		<?php include('header.inc.php'); ?>	
		<div id="logo">
			<img src="images/logo.png" alt="western mass children in nature project">
		</div>
		<div id="bikeimg">
			<img src="images/bike.jpg" alt="family on bikes photo">
		</div>
		<div id="skatingimg">
			<img src="images/skating.jpg" alt="girl rollerblading image">
		</div>
	<?php include('nav.inc.php'); ?>
	
		<?php if(isset($_GET['content']) && ($_GET['content']=='success'))
				{
					echo"<script type=text/javascript>alert(\"Thank you for submitting a hike. It will be sent to Eva for approval.\")</script>"; 
				}
		?>
		
			<form method="post" enctype="multipart/form-data" action="share.inc.php" name="shareForm" id="shareForm" onsubmit="return validateSubmitShare()" >
				<fieldset style="width:500px;">
						<legend><h3>Submit Your Own Favorite Activities</h3></legend>	
						<p>Name:
							<input type="text" autofocus size="35" name="name" id="name" placeholder="Enter Your Name" value="<?php if(isset($_POST['name']))echo $_POST['name'];?>">
						</p>
						<p>Email:
							<input type="text" size="40" name="shareemail" id="shareemail" placeholder="Enter Your Email Address" value="<?php if(isset($_POST['shareemail']))echo $_POST['shareemail'];?>">
						<p>Activity:
							<input type="text" size="40" name="activity" id="activity" placeholder="Enter the Name of Your Activity" value="<?php if(isset($_POST['activity']))echo $_POST['activity'];?>">
						</p>
						<p>Short Description:</p>
						<textarea rows="8" cols="55" name="description" id="description"></textarea>
						<input type="hidden" name="MAX_FILE_SIZE" value="500000" />
						<h3>Image:(maximum file size is 500kb) <input type="file" name="image" id="image" ></h3>
						<p><input type="submit" name="submit" value="Submit" ></p>
						<input type="hidden" name="contact" value="Submit">  
					</fieldset>
			</form>
			<script src="jsfunctions.js"></script> 
			<?php
				require('PHPMailer.php');
				require('Exception.php');
				use PHPMailer\PHPMailer\PHPMailer;
				use PHPMailer\PHPMailer\Exception;


							/////get all the information from the POST/////


				if($_SERVER['REQUEST_METHOD'] == 'POST') 
					{
						$shareemail=$_POST['shareemail'];
						$name=$_POST['name'];
						$error=1;   //declare flag var now and set it to 1 meaning an error exists
						$getname='';  //intialize the var here so you dont get an undefined var error message
						if(isset($_FILES['image']))   ///check to see if reader uploaded something
							{
								$allowed=array('image/JPEG', 'image/JPG', 'image/PNG', 'image/png', 'image/jpeg', 'image/gif', 'image/jpg');  //the allowed file types
								if(in_array($_FILES['image']['type'], $allowed))  //validates file type
									{
										if(move_uploaded_file($_FILES['image']['tmp_name'], "./images/sharesubmissions/{$_FILES['image']['name']}"))  
											//../ brings file into current directory. this has to be changed on the live site to a folder
											//that exists. Remember to create the new folders on the live site (sharesubmissions and shareimages).
											//Moves the file to the sharesubmissions folder inside the images folder. sharesubmissions is only a holding folder until I approve the submission
											{
												if($_FILES['image']['error']>0)  //check for error codes. A 0 error code indicates no error
													{
														echo'<p class="error">The file could not be uploaded. Please try again.</p>';
														$error=1;   ///flag as error
													}
												else
													{
														rename("./images/sharesubmissions/{$_FILES['image']['name']}", "./images/sharesubmissions/$name.{$_FILES['image']['name']}");
																//function rename returns boolean
														$getname="./images/sharesubmissions/$name.{$_FILES['image']['name']}";
														//$error=0;  //flag as no error
														if(filter_var($shareemail, FILTER_VALIDATE_EMAIL)) 
															{
																$validatedshareemail = $_POST['shareemail'];  ///store the share email address is a var called validatedsharesemail
																$error=0;   ////flag as no error
															}
														else
															{
																echo("<p class=\"error\">$shareemail is not a valid email address. Please enter a valid email address.</p>");
																$error=1;   ///flag as error;
															}
													}
											} 
									}
								else  //if the file is not an approved image type
									{
										echo'<p class="error">Your image did not upload properly. Please upload a JPEG, jpg, jpeg, gif, or png type image.
											 Or check your file size. Maximum file size allowed is 500kb</p>';
											$error=1;  ///flag as error
									}
							}
						if(file_exists($_FILES['image']['tmp_name']) && is_file($_FILES['image']['tmp_name']))
							{
								unlink($_FILES['image']['tmp_name']);  //delete the temp file
							}
								
											/////set up the email send ///////////

						$name=$_POST['name'];
						$description=$_POST['description'];
						$activity=$_POST['activity'];
						$description=htmlspecialchars($description);
						if($error===0)  ///if no errors from above exist send the email to Eva
							{
								$email = new PHPMailer();  ///instantiate a new instance of the phpmailer class
								$email->From      = $validatedshareemail;   //this has to be in the form of an email address. Add a php email filter to validation.
								$email->FromName  = $name;   ///the from line is a submission from the share Pages
								$email->Subject   = 'Activity Submitted from a Nature Exploration User';   ///subject of the email
								$email->Body      = $description . $activity;           //this is ok as a variable
								$email->AddAddress( 'addoms@comcast.net' );  //this is the 'to' address. Remember to change this to evas email address!
										//remember to change email address above after uploading this page to the live site
								$file_to_attach = $getname;   ////this has to be path to image. see this var above.
								$email->AddAttachment( $file_to_attach , 'Users\'s Image Submission' );   ///1st arg is the file. 2nd arg is the file name
								if( $email->Send())   ////sends the email
									{
										echo"<script type=\"text/javascript\">alert(\"Your activity submission was successful. It will be sent to Laurie for approval.\")</script>";
										$_POST=array();
										var_dump($_POST);
										header("Location:share.inc.php?content=success");
									}
								else
									{
										echo'<p class="error">Message failed to send. Please try again.</p>';
									}
							}
						else	
							{
								echo'<p class="error">Please retry sending.</p>';
							}
					}
	
										/////Display the images and figcaption/////


					/*this whole piece of code captures the text file data containing the reader's name and content of the image. And then displays it as a figure		
					caption for each image in the folder. */

					$txtfiles=glob("./images/shareimages/*.txt"); //create array of all the text files in the folder. The folder 'shareimages' is used to store already approved submissions. Not yet approved submissions are stored in the folder 'sharesubmissions'. Laurie must first approve of the image then insert it into the sharesimages folder via laurieform.php
					$imagefiles=glob("./images/shareimages/*.{jpg,gif,png,jpeg,JPG,JPEG}", GLOB_BRACE);  //create an array of all the image files in the folder
								
					function getTextFileName(&$txtfiles)  //use & here so it works by reference and actually changes the values
						{
							$txtfiles=substr($txtfiles, 21);  //take off the 1st 21 chars which is the file path
							$dotposition=strpos($txtfiles, '.'); ///find the position of the dot
							$txtfiles=substr($txtfiles, 0, $dotposition);  //return the file name up to the dot
						}
							
					function getImageFileName(&$imagefiles)  //use & here so it works by reference and actually changes the values
						{
							$imagefiles=substr($imagefiles, 21);  //take off the 1st 21 chars which is the file path
							$dotposition=strpos($imagefiles, '.'); ///find the position of the dot
							$imagefiles=substr($imagefiles, 0, $dotposition);  //return the file name up to the dot
						}
								
					array_walk($txtfiles, 'getTextFileName');  //array walk applies the getTextFileName function to each element of the array and returns the new array
					array_walk($imagefiles, 'getImageFileName');
					foreach(glob("./images/shareimages/*.{jpg,gif,png,jpeg,JPG,JPEG}", GLOB_BRACE) as $file)  //this changes each image file in the folder to jpgs
						{
							$new_extension='jpg';  //the new extension
							$newfile=substr($file, 0, -strlen(pathinfo($file, PATHINFO_EXTENSION))).$new_extension;  //get the current extension change it to the new extension (jpg). Save it to var newfile
							rename($file, $newfile);  //now rename it to the new filename
						}
		
		
		echo"<div id=\"sharedactivities\">";
			echo"<h2>Local User Submitted Activities</h2>";
			foreach($imagefiles as $image)   ////go through the imagefiles array. For each image do...
				{
					$key=array_search($image, $txtfiles);   //this goes through the text files array and searches for the matching image file name. It returns the key to that file. 
					$textfile="./images/shareimages/$txtfiles[$key].txt";  //this assigns the path and filename to the variable 'textfile'
					if(in_array($image, $txtfiles))  //if a recipe exists for this image
									{
										$figcaption=file_get_contents($textfile);  //this reads the textfile above and stores the data in figcaption variable
										//$figcaption=str_replace('-', '<li>', $figcaption );  //this takes the dash mark - in the txt file and replaces it with a list item. 
										echo"<figure><img src=\"./images/shareimages/$image.jpg\"><figcaption>$figcaption</figcaption></figure>";  //the figcaption is the data from the text file read in line 32. This displays the text file with the matching image file
									}
								else
									{
										echo"<figure><img src=\"./images/shareimages/$image.jpg\"><figcaption>$image</figcaption></figure>";
									}
					//$figcaption=ucwords($txtfiles[$key]);
					//echo"<figure><img src=\"./images/shareimages/$image.jpg\" width=\"290\" height=\"180\"><figcaption>$figcaption</figcaption></figure></a>";  
						//this is how you can go through the folder and display the image using the variable from the truncated array.
						//the figcaption is the data from the text file read in line 32. This displays the text file with the matching image file
				}
				?>
			</div>
		

</div>

</body>

	<?php include('footer.inc.php'); ?>

<script src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-1.11.2.min.js"></script>
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
