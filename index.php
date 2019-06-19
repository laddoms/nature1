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
	<div id="wrapper">
		<?php include('header.inc.php'); ?>	
		<div id="logo">
			<img src="images/logo.png" alt="western mass children in nature project">
		</div>
		<div id="girlhikerimg">
			<img src="images/girlhiker.jpg" alt="girl hiking rock">
		</div>
		<div id="kidsinfieldimg">
			<img src="images/kidsinfield.jpg" alt="kids running in a green field">
		</div>
		<?php include('nav.inc.php'); ?>
		<aside>
			<h3><a href="events.php">Upcoming Fun Events</a></h3>
			<h3><a href="naturenews.php">Nature News</a></h3>
			<h3><a href="aboutndd.php">Learn about NDD</a></h3>
		</aside>
		<div id="indexcontent">
			<h1 style="text-align:center;">Western Massachusetts</h1>
			<h1 style="text-align:center;">Children's Nature Exploration Project</h1>
			
				<h3>Lets Go Play</h3>
				<p style="float:left; width:350px;">Get in on the action! Join the fun! Families can enjoy the many benefits of outdoor exploration and play. Time outdoors
				   reduces stress in children, makes them more resilient, fosters appreciation for nature, animals, and our environment. 
				</p>
				<img src="images/frog.jpg" alt="image of a frog under a leaf" style="float:right;">
				<blockquote cite="https://www.goodreads.com/author/quotes/5297.John_Muir" style="float:left; width:390px; font-style: italic;">
					“Climb the mountains and get their good tidings. Nature's peace will flow into you as sunshine flows into trees.
					The winds will blow their own freshness into you, and the storms their energy, while cares will drop away from you 
					like the leaves of Autumn.”― John Muir, The Mountains of California 
				</blockquote>
			<div id="heartrock">
				<img src="images/heartrock.jpg" alt="image of a heart in rocks">
			</div>
			<div id="indexinset">
				
				<h3>Nature Deficit Disorder</h3>
				<p>	
					In 2011 Richard Louv coined the term Nature Deficit Disorder. Nature Deficit Disorder is a serious 
					condition affecting millions of children. 
				</p>	
				<p>
					Nature Deficit Disorder is a condition that could cause obesity, Attention Deficit Disorder, higher rates of 
				   emotional and physical illness (depression), and reduced appreciation for the environment. 
				</p>
				<p>
					Children are suffering from NDD due to lack of unstructured play and exploration in nature. 
				    Richard Louv’s research has proven that children are more inclined to play indoors and with electronic 
				    devices. 
				</p>
			</div>

		</div>
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