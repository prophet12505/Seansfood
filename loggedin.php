
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


// unset($_SESSION['userid']);
// unset($_SESSION['agent']);
// $_SESSION=array();
// session_destroy();
// setcookie("P")
    
?>