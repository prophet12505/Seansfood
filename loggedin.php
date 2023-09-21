
<?php

session_start();
if(!isset($_SESSION['userid']) && !isset($_SESSION['agent'])){
    require('inc/loginfuncitons.php');
    redirect_user();//by default, go to login.php
}


$cookie_name="firstname";
if(isset($_COOKIE[$cookie_name])){
    echo "cookie $cookie_name is set";
    echo "value is $_COOKIE[$cookie_name]";
    echo "Yeah you made it $_COOKIE[$cookie_name]";
}
else{
    echo "cookie $cookie_name hasn't been set";
}
//change title and include header

$self=basename($_SERVER['PHP_SELF']);
$page_title="Logged in | by SEAN";
require('inc/header.php');
// display a customized successful login message 
echo "<div class='w3-container w3-teal'><h1>".$page_title."
<a href='viewcart.php'><i class='fas fa-shopping-cart' id='caticon' 
title='View Cart'></i></a></h1></div> 
<div= 'container'><p class='indent'>You are now logged in, 
{$_SESSION['firstname']}!</p>
<div class='logout'><p><a href='products.php'><button id='updateuser'>
Let's go shopping</button></a><a href='logout.php' ><button>LOGOUT</button></a></p></div></div>";





// unset($_SESSION['userid']);
// unset($_SESSION['agent']);
// $_SESSION=array();
// session_destroy();
// setcookie("P")
require('inc/footer.php');
    
?>