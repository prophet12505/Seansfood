<?php

session_start();
if(!isset($_SESSION['userid'])){
    require('inc/loginfuncitons.php');
    redirect_user();//by default, go to login.php
}
//cancel the session
$_SESSION=array();
else {

}
?>