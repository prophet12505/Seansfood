<?php
	// needed for the session variables
	session_start();

	// change title and include header
	$self = basename($_SERVER['PHP_SELF']);
	$page_title = "Welcome to Sean's Foods | By Sean";
	include 'inc/header.php';

  // start container div
  echo '<div class="addcart">';

  // check to see if the form was posted from the reg form
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // sanatize the data from the form for DB entry
    function sanitize_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    // require DB connection
    require('inc/dbconnect.php');

    // sanitize form inputs and escape to secure DB from destruction
    $fn = mysqli_real_escape_string($dbc, sanitize_input($_POST['firstName']));
    $ln = mysqli_real_escape_string($dbc, sanitize_input($_POST['lastName']));
    $email = mysqli_real_escape_string($dbc, sanitize_input($_POST['email']));

    // check to make sure psw equal to psw-repeat
    if ($_POST['psw'] != $_POST['psw-repeat']) {
      echo "<div class='w3-container w3-red'><h1><i class='fas fa-exclamation-circle'></i> Oh Snap</h1><p class='indent'>Check repeat password matches password entered.</p><p class='indent'><a href='previous.html' onclick='showModal(); return false;'><button id='contbutton'>Try Again</button></a></div>";
				// include the footer and exit
				include 'inc/footer.php';
				exit();
    } else {
      $password = mysqli_real_escape_string($dbc, sanitize_input($_POST['psw']));
    }

    // setup sql statement
    $sql = "INSERT INTO seansfoods_users (firstname, lastname, email, password) VALUES ('$fn', '$ln', '$email', sha1('$password'))";

    // try to run the query and catch any errors
    try {
      $res=mysqli_query($dbc, $sql);
      echo($res);
    }
    catch(Exception $e) {
      echo "<div class='w3-container w3-red'><h1><i class='fas fa-exclamation-triangle'></i> Oh Noooo!</h1><p class='indent'>The email address you entered may already be registered OR there was an issue connecting to our database. Thank you for your patience and please try again.</p>";
      echo($e);
			echo '<p class="indent"><a href="previous.html" onclick="showModal(); return false;"><button id="contbutton">Go Back</button></a></p></div></div>';

      //close the DB connection
      mysqli_close($dbc);

      // include footer and exit
      include 'inc/footer.php';
			exit();
    }

    // get the userid that was just created with registration and store in session
    $_SESSION['userid'] = mysqli_insert_id($dbc);
    $_SESSION['firstname'] = $fn;
    $_SESSION['lastname'] = $ln;
    $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

    // success message
    echo "<div class='w3-container w3-teal'><h1><i class='fas fa-check'></i> Success!</h1><p>You have been registered into the Sean's Foods Family! We look forward to providing you with some great food.</p><p class='indent'><button id='autologinlink' onclick='redirectlogin(this)'>Auto Login</button><a href='products.php'><button id='contbutton'>View Products</button></a></p></div></div>";

    //close the DB connection
    mysqli_close($dbc);

  } else {
		// output message if page accessed in error
		echo "<div class='w3-container w3-red'><h1><i class='fas fa-exclamation-triangle'></i> Sorry!</h1><p class='indent'>You may have accessed this page in error. Please go to the Register tab at the top and fill out the form.</p>";
  }

  // include footer
  include('inc/footer.php');
?>