<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Add User | Document Management</title>
	<link rel="stylesheet" href="css/desktop.css" />
	<script>
		function validateForm() {
			let password = document.getElementById("password").value;
			let confirm_password = document.getElementById("confirm-password").value;

			if (password != confirm_password) {
				alert("Password and confirm password do not match");
				return false;
			}
			return true;
		}
	</script>
</head>

<body>
	<?php
	include("includes/header.php");
	if (!(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")) {
		header("location: index.php");
	}
	?>
	<main class="page-container">
		<h1 style="text-align: center; margin-top: 50px;">Register User</h1>
		<form id="register-form" class="register-form" method="post" action="userAdded.php"
			onsubmit="return validateForm()">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" minlength="5" maxlength="40" required>
			<label for="email">Email</label>
			<input type="email" id="email" name="email" minlength="10" maxlength="100" required>
			<label for="department">Department</label>
			<input type="text" id="department" name="department" minlength="3" maxlength="100" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" minlength="8" maxlength="40" required>
			<label for="confirm-password">Confirm password</label>
			<input type="password" id="confirm-password" name="confirm-password" minlength="8" maxlength="40" required>
			<input type="submit" value="Register">
		</form>
	</main>
</body>

</html>