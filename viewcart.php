<?php
//notice : you don't need to login to add to cart 
    //start the session and then include the header
    session_start();

    $page_title="Shopping cart | by Sean";
    $self=basename($_SERVER['PHP_SELF']);
    include("./inc/header.php");

    // display page title
	echo '<div class="w3-container w3-teal"><h1>' . $page_title . '<a href="viewcart.php"><i class="fas fa-shopping-cart" id="carticon" title="View Cart"></i></a></h1></div>';
	
    //display cart if not empty
    if($_SESSION['cart']) {
        
    }

    include("./inc/footer.php");

    ?>