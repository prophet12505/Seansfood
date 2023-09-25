<?php
    //notice : you don't need to login to add to cart 
    $page_title="added to cart";
    $self=basename($_SERVER['PHP_SELF']);
    require("./inc/header.php");
    require("./inc/footer.php");
    require("./inc/dbconnect.php");
    

    echo "<div class='w3-container w3-teal'><h1>".$page_title."
<a href='viewcart.php'><i class='fas fa-shopping-cart' id='caticon' 
title='View Cart'></i></a></h1></div> 

";


//check for one valid produc id
if(isset($_GET['prod_id']) && filter_var($_GET['prod_id'],FILTER_VALIDATE_INT,
array("options"=>array('min_range'=>1)))){
        // get the product id 
    $prod_id=$_GET['prod_id'];

    echo '<div class="addcart">';
    //check if cart already contains this product 
    if(isset($_SESSION['cart'][$prod_id])){
        $_SESSION['cart'][$prod_id]++; // add 1 ti the current quantity for this product
        //display confirmation message that another product quantity has been added
        
        echo '<div class="w3-container w3-teal"><h2>Add to Cart
        <a href="viewcart.php"><i class="fas fa-shopping-cart" id="caticon" title="View Cart"></i></a>
        </h2><p class="indent">Another item has been added to your shopping cart</p></div>';

    }
}
else{
    echo '<div class="w3-container w3-red"><h1>Oh No!</h1><p class="indent"> THis page has been accessed in error.</p></div>';
}

?>