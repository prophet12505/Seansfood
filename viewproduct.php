<?php
	// needed for the session variables
    session_start();
	// change title and include header
	$self = basename($_SERVER['PHP_SELF']);
	$page_title = "Tasty Food | By Sean";
	include 'inc/header.php';
	
	// display page title and shopping cart icon
	echo '<div class="w3-container w3-teal"><h1>' . $page_title . '<a href="viewcart.php"><i class="fas fa-shopping-cart" id="carticon" title="View Cart"></i></a></h1></div>';
	
	// check for one valid product ID in URL
    if (isset ($_GET['prod_id']) && filter_var($_GET['prod_id'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) {

		// get and set product ID
		$prod_id = $_GET['prod_id'];  

	    // connect to the DB with connection file
		require 'inc/dbconnect.php';

	    // select everything from prodcuts table for this product ID
	    $sql = "SELECT * FROM seansfoods_products WHERE prod_id=$prod_id";

	    // run the query
			$result = mysqli_query($dbc, $sql); 

		// check to see if we found the product in the DB
		if (mysqli_num_rows($result) == 1) {

			// fetch the information into an array
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			// check for an image
			if($row['prod_img'] == NULL) {
				$row['prod_img'] = "img/products/product_placeholder.png";
			}

			// set star rating
			$product_rating = $row['prod_rate'];
			switch ($product_rating) {
				case '1':
					$star_out = '<span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
					break;
				case '2':
					$star_out = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
					break;
				case '3':
					$star_out = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
					break;
				case '4':
					$star_out = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span>';
					break;
				case '5':
					$star_out = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
					break;
				default:
					$star_out = '<span class="norating">No Rating</span>';
					break;
			}
	    // start the single product listing	        
			echo "<div class='singleproduct'><h3>" . ucfirst($row['prod_cat']) . " <i class='fas fa-caret-right'></i> " . $row['prod_name'] ."</h3>";

			// display content in a card layout
			echo "<div class='singlecard'><img src='" . $row['prod_img'] . "' alt='" . htmlspecialchars($row['prod_meta'], ENT_QUOTES) . "' title='" . htmlspecialchars($row['prod_meta'], ENT_QUOTES) . "'>";
			echo "<h2>" . $row['prod_name'] . "</h2>";
			echo "<p class='price'>$" . $row['prod_price'] . "</p>";
			echo "<p class='singledesc'>" . $row['prod_desc'] . "</p>";
			echo "<p>$star_out</p>";
			echo "<a href='addcart.php?prod_id=$prod_id'><button>Add to Cart</button></a></div></div>";
		}

	    // free the resultset so that if database table is changed it is reflected when page reloads
		mysqli_free_result($result);

		// close the connection to the DB
	mysqli_close($dbc);

	} else {
		
		// display error message
		echo "<div class='w3-container w3-red'><h1>Oh Snap!</h1>";
		echo "<p class='indent'>We are so sorry.<br>";
		echo "It looks like there was a problem accessing that product. Please try again.</p></div>";
	}

	// include the footer
	include 'inc/footer.php';
?>