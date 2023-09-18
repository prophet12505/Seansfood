	</div>

	<div id="regModal" class="modal">
		<form class="modal-content" action="registration.php" method="post" autocomplete="on" novalidate>
			<div class="modalcontainer">
				<span onclick="document.getElementById('regModal').style.display='none'" class="close" title="Close Modal">&times;</span>
				<h1>Register</h1>
				<p>Please fill in this form to create an account.</p>
				<hr>

				<label for="firstName"><b>First Name</b></label>
				<input type="text" id="firstName" placeholder="Enter First Name" name="firstName" maxlength="60" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>" required>

				<label for="lastName"><b>Last Name</b></label>
				<input type="text" id="lastName" placeholder="Enter Last Name" name="lastName" maxlength="60" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>" required>

				<label for="email"><b>Email</b></label>
				<input type="text" id="email" placeholder="Enter Email" name="email" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required autocomplete="on">

				<label for="psw"><b>Password</b></label>
				<input type="password" id="psw" placeholder="Enter Password" name="psw" required>

				<label for="psw-repeat"><b>Repeat Password</b></label>
				<input type="password" id="psw-repeat" placeholder="Repeat Password" name="psw-repeat" required>
				

				<label>
					<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
				</label>

				<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

				<div class="clearfix">
					<button type="submit" class="signupbtn">Register</button>
					<button type="button" onclick="document.getElementById('regModal').style.display='none'" class="cancelbtn">Cancel</button>
				</div>
			</div>
		</form>
	</div>

	<footer class="w3-container w3-teal w3-opacity-min">Copyright <?= date('Y'); ?> | Sean Taylor</footer>
	<script src="js/toggle.js"></script>
</body>
</html>