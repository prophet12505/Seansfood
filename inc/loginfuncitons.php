<?php
//defines 2 functions used by the login/logout script

//redirect user function
    function redirect_user($page="login.php",){
        //use this to switch location
        header("Location: $page");
        exit();
    }


//check login
function check_login($dbc,$email="",$pass=''){
    $errors=array();
    //validate email 
    if(empty($email))
    {
        $errors[]='email';//The error is added to the array
    }
    else{
        $email=mysqli_real_escape_string($dbc,trim($email));
    }
    //validate password
    if(empty($pass))
    {
        $errors[]='password';
    }
    else{
        $pass=mysqli_escape_string($dbc,trim($pass));

    }

    if(empty($errors)){
        //retrieve the user id
        $sql="SELECT userid, firstname, lastname FROM seansfoods_users
        WHERE email='$email' AND password=SHA1('$pass')";
        $result=mysqli_query($dbc,$sql);

        //check the return
        if(mysqli_num_rows($result)==1)//have one result
        {
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);//retrieve result as an array

            //return true and the record
            return array(TRUE,$row);//return multiple results in an array form, success
        
        }
        else if(mysqli_num_rows($result)>=1){
            $errors[]="database error: multiple results for the same email, password pair";
        }
        else{
            $errors[]="the information you provided does not match what we have on file";
        }
        
     
    }
    //reuturn false and the errors
    return array(FALSE,$errors);

}
?>