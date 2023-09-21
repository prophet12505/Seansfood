Yeah you made it
<?php
$cookie_name="firstname";
if(isset($_COOKIE[$cookie_name])){
    echo "cookie $cookie_name is set";
    echo "value is $_COOKIE[$cookie_name]";
}
else{
    echo "cookie $cookie_name hasn't set";
}
    
?>