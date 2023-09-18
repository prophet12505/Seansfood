<?php

session_start();
if(!isset($_SESSION['userid'])){
    require('inc/loginfuncitons.php');
    redirect_user();//by default, go to login.php
}
//cancel the session
$_SESSION=array();

session_destroy();
setcookie('PHPSESSID','',time()-3600,'/','',0,0);//setcookie back in to the pass so cookie can't be used 
$self=basename(($_SERVER['PHP_SELF']));
$page_title="Logged out | Sean";
include('inc/header.php');

echo "<div class='w3-container w3-teal'><h1>".$page_title."<a href='viewcart.php'>
<i class='fas fa-shopping-cart' id='carticon' title='View Cart'></i></a></h1></div>
<div class='container'><p>You are now logged out ! Have a great day.</p></div>";
?>