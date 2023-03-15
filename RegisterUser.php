<!DOCTYPE html>
<html>
<head>
	<title>Register User</title>
	<style>
		body {
			background-color: white;
			color: black;
			font-family: 'Comic Sans MS', sans-serif;
			margin: 0;
		}
		.navbar {
			background-color: darkgreen;
			color: white;
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
		}
		.navbar ul {
			list-style: none;
			margin: 0;
			padding: 0;
			display: flex;
			align-items: center;
		}
		.navbar ul li {
			margin-right: 20px;
			font-weight: bold;
			font-size: 20px;
			font-family: 'Comic Sans MS', sans-serif;
		}
		.register-form {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			align-items: center;
			margin-top: 80px;
			padding: 20px;
			border: 2px solid black;
			border-radius: 10px;
			width: 80%;
			margin-left: auto;
			margin-right: auto;
		}
		.register-form label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
			font-size: 16px;
			font-family: 'Comic Sans MS', sans-serif;
		}
		.register-form input[type="text"], .register-form input[type="email"], .register-form input[type="password"] {
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: 1px solid black;
			width: 100%;
			box-sizing: border-box;
			font-size: 16px;
			font-family: 'Comic Sans MS', sans-serif;
		}
		.register-form input[type="submit"] {
			background-color: darkgreen;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			font-size: 18px;
			cursor: pointer;
			transition: all 0.3s ease;
			font-family: 'Comic Sans MS', sans-serif;
		}
		.register-form input[type="submit"]:hover {
			background-color: #006400;
		}
	</style>
</head>
<body>
	<header>
		<nav class="navbar">
			<ul>
				<li>Search</li>
				<li>Users</li>
				<li>Add User</li>
			</ul>
			<ul>
				<li>AdminName</li>
				<li>Logout</li>
			</ul>
		</nav>
	</header>
	<main>
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
