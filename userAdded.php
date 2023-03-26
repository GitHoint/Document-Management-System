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
    header("Location: index.php");
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
      <section class="centre">
        <?php
        try {
          if (!$queryPrep->execute()) {
            echo "<h1>Something went wrong. Please go back and try again.</h1>";
          } else {
            echo "<h1>The user has been added to the database!</h1>";
          }
      } catch (mysqli_sql_exception $e) {
          // Handle the duplicate key error
          if ($e->getCode() == 1062) { // Error code for duplicate key error
              // Display an error message to the user
              echo "Error: Username already exists. Please choose a different username.";
          } else {
              // Log the error for later analysis
              error_log("MySQL error: " . $e->getMessage());
              // Display a generic error message to the user
              echo "An error occurred. Please try again later.";
          }
      }
      
        ?>
      </section>
    </main>
  </div>
</body>

</html>