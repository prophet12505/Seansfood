<?php
	// needed for the session variables
	session_start();
	// change title and include header
	$self = basename($_SERVER['PHP_SELF']);
	$page_title = "Food | By Sean";
	include 'inc/header.php';
	
	// display page title
	echo '<div class="w3-container w3-teal"><h1>' . $page_title . '<a href="viewcart.php"><i class="fas fa-shopping-cart" id="carticon" title="View Cart"></i></a></h1></div>';
	
	// select the category
	$category = "food";
	
	// connect to the DB with connection file
	require 'inc/dbconnect.php';

	// run the query and display the results
	require 'inc/query.php';

	// include the footer
	include 'inc/footer.php';
?>