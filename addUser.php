<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Documents | Document Management</title>
	<link rel="stylesheet" href="css/desktop.css" />
</head>

<body>
	<?php
	include("includes/header.php");
	?>
	<main class="page-container">
		<h1 style="text-align: center; margin-top: 50px;">Register User</h1>
		<form class="register-form" method="post" action="register.php">
			<label for="first-name">First name</label>
			<input type="text" id="first-name" name="first-name" required>
			<label for="last-name">Last name</label>
			<input type="text" id="last-name" name="last-name" required>
			<label for="email">Email</label>
			<input type="email" id="email" name="email" required>
			<label for="department">Department</label>
			<input type="text" id="department" name="department" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<label for="confirm-password">Confirm password</label>
			<input type="password" id="confirm-password" name="confirm-password" required>
			<input type="submit" value="Register">
		</form>
	</main>
</body>

</html>