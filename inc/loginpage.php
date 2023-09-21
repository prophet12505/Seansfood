<?php

$self=basename(($_SERVER['PHP_SELF']));
$page_title="Log in | by Sean";
include("header.php");
if(isset($errors) && !empty($errors)){
    echo('<div class="container"><h1>Hey wait a minute...</h1><p>you may have forgotten:</p><p class="w3-red">');
    foreach($errors as $msg){
        echo "- $msg<br>";
    }
    echo '</p><p>Let\'s try that again!</p>';

}
echo("You should see a login form here");

//display the login form
?>
<div class="indent">
    <h1>Login<h1>
    <p>Please fill in the form below:</p>
    <form name="loginform2" action="../login.php" method="post">
        <input type="text" placeholder="Email" name="email" required autocomplete="on" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>">
        <input type="password" placeholder="Password" name="password" required>
        <input type="submit" name="submit" value="login">
    </form>
</div>

<?php
include('footer.php');