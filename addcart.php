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
    $prod_id=$_GET['prod_id'];
    // get the product id 
    //$prod_id=$_GET['prod_id'];
    echo "the product id is $prod_id, yeah it worked";
}
else{
    echo '<div class="w3-container w3-red"><h1>Oh No!</h1>
    <p class="indent"> THis page has been accessed in error.</p></div>
    ';
}




?>