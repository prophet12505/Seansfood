<?php
	// needed for the session variables
	session_start();
	// change title and include header
	$self = basename($_SERVER['PHP_SELF']);
	$page_title = "Welcome to Sean's Foods | By Sean";
	include 'inc/header.php';
?>
	<video autoplay muted loop id="introVideo">
		<source src="img/site/intro_video.mp4" type="video/mp4">
		<p>Your browser does not support HTML5 video.</p>
	</video>

	<div class="content">
		<h1>Welcome to Sean's Foods</h1>
		<p>Here you will find the best food prepared fresh and delicious every day!</p>
	</div>
<?php
	// include the footer
	include 'inc/footer.php';
?>