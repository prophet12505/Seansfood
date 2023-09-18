<?php

	// select the fields and records from the products table that we need
	$sql = "SELECT prod_id, prod_name, prod_price, prod_desc, prod_img, prod_meta, prod_rate from seansfoods_products";
	if ($category != "all") {
		$sql .= " where prod_cat='$category'";
	}

	// run the query against the database
	$result = mysqli_query($dbc,$sql);


	// product listing
	echo '<section>';
	// check to see if any records were found and if so echo out what we want users to see or show error message if no records found
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$prod_id = $row['prod_id']; //set a short variable for the product id taken from the DB
			if($row['prod_img'] == NULL) {
				$row['prod_img'] = "img/products/product_placeholder.png";
			}

			// check star rating
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
			
			// output product information
			echo "<div class='card'><a href='viewproduct.php?prod_id=$prod_id'><img src='" . $row['prod_img'] . "' alt='" . htmlspecialchars($row['prod_meta'], ENT_QUOTES) . "' title='" . htmlspecialchars($row['prod_meta'], ENT_QUOTES) . "'></a>" . "<h3>" . $row['prod_name'] . "</h3><p class='price'>$" . $row['prod_price'] . "</p><p class='desc'>" . $row['prod_desc'] . "</p><p>$star_out</p><a href='viewproduct.php?prod_id=$prod_id'>See Product</a><a href='addcart.php?prod_id=$prod_id'><button>Add to Cart</button></a></div>";
		}
	} else {
		// nothing found in the DB
		echo 'Sorry no products were found!';
	}

	echo '</section>';

	// free the resultset so that if database table is changed it is reflected when page reloads
	mysqli_free_result($result);

	// close the connection to the DB
	mysqli_close($dbc);
?>