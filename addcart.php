<?php
    //notice : you don't need to login to add to cart 
    $page_title="added to cart";
    require("header.php");
    require("footer.php");
    require("./inc/dbconnect.php");
    

    echo "<div class='w3-container w3-teal'><h1>".$page_title."
<a href='viewcart.php'><i class='fas fa-shopping-cart' id='caticon' 
title='View Cart'></i></a></h1></div> 
<div= 'container'><p class='indent'>You have added , 
";
$prod_id=$_GET['prod_id'];
echo "the product id is $prod_id, yeah it worked";



?>