<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Add User | Document Management</title>
	<link rel="stylesheet" href="css/desktop.css" />
</head>

<body>
	<?php
	include("includes/header.php");
	?>
	<main class="page-container">
		<h1 style="text-align: center; margin-top: 50px;">Register User</h1>
		<form class="register-form" method="post" action="userAdded.php">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required>
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