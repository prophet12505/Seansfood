<!DOCTYPE html>
<html lang=en>
<head>
  <meta charset=utf-8>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title; ?></title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-camo.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-food.css">
  <!-- font awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://kit.fontawesome.com/ae87cba280.js" crossorigin="anonymous"></script>
  <link rel="icon" href="img/site/seanslogo.png" type="image/x-icon"> 
  <link rel="shortcut icon" href="img/site/seanslogo.png" type="image/x-icon"> 
</head>
<body>
	<div class="navbar">
		<!-- "Hamburger menu" to toggle the navigation links at mobile size -->
		<a href="javascript:void(0);" class="icon" onclick="toggleLinks()"><i class="fa fa-bars"></i></a>

		<a href="index.php" class="logo"><img src="img/site/seanslogo.png" alt="Sean's Foods Logo"> Sean's Foods</a>
		<div id="navLinks">
			<a href="products.php" <?php if($self=="products.php") echo 'class="active"' ?>>Products</a>
			<a href="beverages.php" <?php if($self=="beverages.php") echo 'class="active"' ?>>Beverages</a>
			<a href="food.php" <?php if($self=="food.php") echo 'class="active"' ?>>Food</a>
			<a href="sides.php" <?php if($self=="sides.php") echo 'class="active"' ?>>Sides</a>
			<a href="about.php" <?php if($self=="about.php") echo 'class="active"' ?>>About Us</a>
			<a href="contact.php" <?php if($self=="contact.php") echo 'class="active"' ?>>Contact Us</a>
			<a href="#" id="reg" title="Click to open registration form">Register</a>
			<div class="login-container">
				<?php // create a logout button if logged in or login form if not:
					if (isset($_SESSION['agent']) && isset($_SESSION['userid'])) {
						echo '<a href="edituser.php"><i class="fas fa-user-edit"></i></a><a href="logout.php" id="logoutlink"><i class="fas fa-sign-out-alt"></i></a>';
					} else {
						echo '<form name="loginform" action="login.php" method="post">
									<input type="text" placeholder="Email" name="email" required autocomplete="on">
									<input type="password" placeholder="Password" name="password" required>
									<button type="submit">Login</button>
									</form>';
					}
				?>
			</div>
		</div>
	</div>
	<div class="main">