<?php
	// needed for the session variables
	session_start();
	// change title and include header
	$self = basename($_SERVER['PHP_SELF']);
	$page_title = "About Sean's Foods | By Sean";
	include 'inc/header.php';
	echo "<div class='w3-container w3-teal'><h1>".$page_title."
<a href='viewcart.php'><i class='fas fa-shopping-cart' id='caticon' 
title='View Cart'></i></a></h1></div> ";
?>
	<!-- big background images -->
	<div class="bg-image img1"></div>
	<div class="bg-image img2"></div>
	<div class="bg-image img3"></div>
	<div class="bg-image img4"></div>
	<div class="bg-image img5"></div>
	<div class="bg-image img6"></div>

	<!-- page text -->
	<div class="bg-text"><h2>Making it right</h2><p id="intro">If it's worth making then it's worth making right!</p><p> If you’ve got a passion for food, especially fast food, smoothies and healthy sides, Sean's Foods is your dream feed! Sean shows you how exciting food can be, moving away from the quick and dull options people often resort to, instead he shows you all the fun, beautiful, and tasty ways you can liven up your day. I mean, why not make it fun when it’s the most important thing of the day, right?</p></div>
		
<?php
	// include the footer
	include 'inc/footer.php';
?>