<?php
    // needed for the session variables
    session_start();
	// change title and include header
	$self = basename($_SERVER['PHP_SELF']);
	$page_title = "Contact Sean's Food | By Sean";
	include 'inc/header.php';

	echo "<div class='w3-container w3-teal'><h1>".$page_title."
	<a href='viewcart.php'><i class='fas fa-shopping-cart' id='caticon' 
	title='View Cart'></i></a></h1></div>";

	// check if form has been submitted
	$displayForm = TRUE; //flag to check if we need to show the form
	$fullName = ""; //name
    $email = ""; // email
    $subject = ""; // subject
    
	// function to send form data and santize the data retrieved from W3Schools PHP tutorial
	function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

    // check to see if form has been submitted
    if (isset($_POST['Submit'])) {
    	// make sure all form inputs are not empty and setup short variables
        if (!empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['email']) && !empty($_POST['subject'])) {
         	$fullName = clean_input($_POST['fName']) . " " . clean_input($_POST['lName']);
         	$fName = clean_input($_POST['fName']);
         	$email = clean_input($_POST['email']);
         	$subject = clean_input($_POST['subject']);
         	$displayForm = FALSE; //turn form off
         } else {
         	// user needs to enter numeric values in all fields
            echo "<p><span style='color:red;font-weight:bold;'>You need to enter values in the form below.</span></p>\n";
            $DisplayForm = TRUE;
         }
    }

    // display sticky form if needed
    if ($displayForm) {
		// include the contact form
		include 'inc/contactform.php';
	} else {
    	$to = "contact@seansfoods.ca"; //change to your email address to test
    	$emailSubject = "Contact from Sean's Foods Web Site";
        $header = "From: ". $fullName . " <" . $email . ">\r\n"; //optional headerfields
        $result = @mail($to, $emailSubject, $subject, $header,"-f $email"); //-f stops it sending via an alternate domain so that it doesn't act like spam
        if ($result) {
            //if mail is sent then display a success message
            $timeStamp = time(); // creates a timestamp
            $outTime = @date('g:i:s A', $timeStamp);
            $outDate = @date('m/d/Y', $timeStamp);
            // success message for user
    		echo "<div class='w3-container w3-teal'><div class='indentdiv'><h1>Success!</h1>";
    		echo "<p class='indent'>Thank you $fullName for contacting us. A real person will reply to you real soon. Please be patient or give us a call at 204.555.5555 or 800.999.8888!<br>";
            echo "The time was <span style='color:rgb(237,92,75);font-weight:bold;'>$outTime</span> on <span style='color:rgb(237,92,75);font-weight:bold;'>$outDate</span> when you contacted us!</p></div<</div>";

       } else {
            // error message
            echo "<div class='w3-container w3-red'><h1>Oh Snap!</h1>";
    		echo "<p class='indent'>We are so sorry.<br>";
    		echo "It looks like there was a problem sending your message. Please try again or give us a call at (204)555-5555 or 800.999.8888 and we would be happy to chat with you.</p></div>";
    	}
    }

	// include the footer
	include 'inc/footer.php';
?>