<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: search.php");
  exit;
}

require_once "includes/config.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = trim($_POST["username"]);
  $password = trim($_POST["password"]);


  $sql = "SELECT id, password, 'employee' AS user_type
  FROM employee
  WHERE username = ? AND active = 1
  UNION
  SELECT id, password, 'admin' AS user_type
  FROM admin
  WHERE username = ?";

  if ($stmt = $mysqli->prepare($sql)) {
    $param_username = $username;

    $stmt->bind_param('ss', $param_username, $param_username);

    if ($stmt->execute()) {
      $stmt->store_result();

      if ($stmt->num_rows > 0) {

        $stmt->bind_result($id, $hashed_password, $user_type);

        if ($stmt->fetch()) {

          if (password_verify($password, $hashed_password) || $password == $hashed_password) {
            
            session_start();

            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;
            $_SESSION["user_type"] = $user_type;
            
            //Email Stuff
            if ($user_type == "admin")
            {
              $emailQuery = "SELECT email FROM admin WHERE id = '$id'";
            }
            else
            {
              $emailQuery = "SELECT email FROM employee WHERE id = '$id'";
            }
            $emailResult = $mysqli->query($emailQuery);
            $row = mysqli_fetch_assoc($emailResult);
            $_SESSION["email"] = $row["email"];
            $code = rand(100000, 999999);
            $_SESSION["code"] = $code;
            $_SESSION["message"] = "<h2>There has been attempted access to your account.</h2> <br> <h3>use this code to login: $code</h3> <br> <p>If you didn't attempt to login, ignore this message and report this activity to you administrator.</p>";
            $_SESSION["subject"] = "Two Factor Authentication";
            $_SESSION["return"] = "2fa.php";

            header("location: send-email.php");
          } else {
            $login_err = "Invalid username or password.";
          }
        }
      } else {
        $login_err = "Invalid username or password";
      }
    } else {
      echo "Oops! Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($stmt);

  }

  mysqli_close($mysqli);
}
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
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="login-form">
    <h2>Log In</h2>
    <div class="login-tab">
      <label for="username">Username</label>
      <input type="text" placeholder="Enter Username" name="username" required>
      <span class="invalid-feedback">
        <?php echo $username_err; ?>
      </span>
    </div>
    <div class="login-tab">
      <label for="password">Password</label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <span class="invalid-feedback">
        <?php echo $password_err; ?>
      </span>
    </div>
    <?php
    if (!empty($login_err)) {
      echo '<div class="alert">' . $login_err . '</div>';
    }
    ?>
    <a href="forgottenpwd.php">
      <p class="forgot-password">Forgot your password?</p>
    </a>
    <br>
    <br>
    <button type="submit">Login</button>
  </form>
</body>

</html>