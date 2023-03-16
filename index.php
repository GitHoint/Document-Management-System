<?php
include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | Document Management</title>
  <link rel="stylesheet" href="css/desktop.css" />
</head>

<body>
  <?php
  include("includes/header.php");
  ?>
  <form method="post" id="login-form">
    <h2>Log In</h2>
    <div class="login-tab">
      <label for="username">Username</label>
      <input type="text" placeholder="Enter Username" name="username" required>
    </div>
    <div class="login-tab">
      <label for="password">Password</label>
      <input type="password" placeholder="Enter Password" name="password" required>
    </div>
    <button type="submit">Login</button>
  </form>




</body>
</html>