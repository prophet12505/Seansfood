<?php

$self=basename(($_SERVER['PHP_SELF']));
$page_title="Log in | by Sean";
include("inc/header.php");
if(isset($errors) && !empty($errors)){
    echo('<div class="container"><h1>')
}
echo("You should see a login form here");


?>
