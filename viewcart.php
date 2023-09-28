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
    if($_SESSION['cart']){
        require("./inc/dbconnect.php");
        $sql="SELECT prod_id, prod_name, prod_price, prod_img from seansfoods_products WHERE prod_id IN (";
        foreach($_SESSION['cart'] as $prod_id => $val){
            $sql.=" $prod_id,";
        }
        $sql=substr($sql,0,-1);//strip last comma
        $sql.=") ORDER BY prod_name ASC";
        echo $sql;
        
    }

    include("./inc/footer.php");

    ?>