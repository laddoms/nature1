<div id="wrapper">
	<div id="laurieform">
		<?php include('header.inc.php'); ?>
		
		<?php include('nav.inc.php'); 
		if((isset($_GET['content']))&& ($_GET['content']=='tryagain'))  //this means the get var was passed from portfolio.php and the image did not upload properly
			{
				echo'<p class="error">Your image did not upload properly. Please upload a JPEG, jpg, jpeg, gif, or png type image.
					Or check your file size. Maximum file size allowed is 500kb</p>';
			}
		if((isset($_GET['content']))&& ($_GET['content']=='failure'))  //this means the get var was passed from portfolio.php and the image did not upload properly
			{
				echo'<p class="error">Your submission did not post. Please try entering it again. Ensure all fields are filled in.</p>';
			}
		if((isset($_GET['content'])) && ($_GET['content']=='success'))
			{
				echo"<script type=\"text/javascript\">alert(\"Laurie, your form submission was successful.\")</script>";
													
			}
	?>
		<div id="shareform">
			<form method="post" enctype="multipart/form-data" action="sharersform.php" name="insertshareform" id="insertshareform" onsubmit="return validateSubmitAnActivity()">
				 <fieldset>
					<legend><h3>Insert a Shared Activity:</h3></legend>	
					<p>Activity Submitted by:</p>
						<input type="text" name="username" id="username" size="35" placeholder="enter the user's name" />
					<p>Name of Activity:</p>
						<input type="text" name="activity"   id="activity" placeholder="enter the activity name"/>
					<p>Description:</p>
						<textarea rows="10" cols="45" name="description"   id="description"></textarea>
					<p>Image:(maximum file size is 500kb)</p>
						<input type="file" name="image" id="image" >
						<input type="hidden" name="MAX_FILE_SIZE" value="500000" />
						<p><input type="submit" name="submit" value="Insert Activity" ></p>
				</fieldset>
			</form>
		</div>

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
</html>	