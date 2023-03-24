<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thank you | Document Management</title>
  <link rel="stylesheet" href="css/desktop.css" />
</head>

<body>
  <?php
  include("includes/header.php");
  require_once("includes/config.php");

  if (!isset($_SERVER['HTTP_REFERER'])) { // redirect if the page was accessed directly
    header("Location: search.php");
  }

  $adminId = $_SESSION["id"];
  $postQuery = "";
  if (count($_POST) > 1) {
    $adminId = $_SESSION["id"];
    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $department = $_REQUEST["department"];
    $password = password_hash($_REQUEST["password"], PASSWORD_DEFAULT);
    $postQuery = "INSERT INTO employee (adminId, username, email, department, password, active) 
    VALUES (?, ?, ?, ?, ?, 1);";
    $queryPrep = $mysqli->prepare($postQuery);
    $queryPrep->bind_param('sssss', $adminId, $username, $email, $department, $password);
  }
  ?>
  <div class="page-container">
    <main>
      <h2>Thank you!</h2>
      <section class="centre">
        <?php
        if (count($_POST) > 1 && $queryPrep->execute()) {
          echo "<h1>The user has been added to the database!</h1>";
        } else {
          echo "<h1>Something went wrong. Please go back and try again.</h1>";
        }
        ?>
      </section>
    </main>
  </div>
</body>

</html>