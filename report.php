<?php
require_once("includes/config.php");

session_start();
if (!isset($_SESSION["loggedin"])) {
  header("location: index.php");
}
session_write_close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    Monthly Report | Document Management
  </title>
  <link rel="stylesheet" href="css/desktop.css" />
</head>

<body>
  <?php
  include("includes/header.php");
  ?>
  <div class="page-container">
    <h1 class="report-title">Monthly Report</h1>
    <?php
    $stmt = $mysqli->query("SELECT d.*, o.username AS owner, o.department FROM document d JOIN employee o ON d.ownerId = o.id WHERE d.uploadDate BETWEEN DATE_FORMAT(NOW(), '%Y-%m-01') AND LAST_DAY(NOW());");
    if ($stmt->num_rows > 0) {
      include("includes/monthlyReport.php");
    }
    ?>
  </div>
</body>

</html>