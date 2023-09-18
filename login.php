<?php


    // process the login form submission
    //check if form was submitted with post
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //require 2 helper files to connect to DB and login
        require('inc/loginfuncitons.php');
        require('inc/dbconnect.php');

        //check the login info
        //list: Assign variables as if they were an array
        //this function return 2 vriables
        list($check,$data)=check_login($dbc,$_POST['email'],$_POST['password']);

        // check if return value is true 
        if($check){
            session_start();
            $_SESSION['userid'] = $data['userid'];
            $_SESSION['firstname'] = $data['firstname'];
            $_SESSION['lastname'] = $data['lastname'];
            $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);
            //redirect user to a loggined page
            redirect_user('loggedin.php');
            session_destroy();
        }
        else{
            //assign data to errors
            $errors=$data;
           
        }
        mysql_close($dbc);
    }
    //load login page
    include('inc/loginpage.php');
?>