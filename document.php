<?php
require_once("includes/config.php");
// query to get film by filmID
$docId = $_GET['documentId'] ?? null;
$stmt = $mysqli->prepare("SELECT d.*, o.username AS owner, o.department FROM document d JOIN employee o ON d.ownerId = o.id WHERE d.id = ?;");
$stmt->bind_param('i', $docId);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows <= 0) {
  header("Location: search.php");
}
$obj = $result->fetch_object();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php echo $obj->name ?> | Document Management
  </title>
  <link rel="stylesheet" href="css/desktop.css" />
</head>

<body>
  <?php
  include("includes/header.php");
  ?>
  <div class="page-container">
    <?php
    $username = $_SESSION['username'] == $obj->owner ? "owner" :  '';
  
    echo "<script>";
    echo "const userStatus = '{$username}';";
    echo "</script>";


    echo "<div href=\"document.php?documentId={$obj->id}\" class=\"document-container\">";
    echo "<span class=\"document-card-name\">{$obj->name}</span>";
    echo "<ul class=\"document-card-details\">";
    echo "<li>Type: {$obj->type}</li>";
    echo "<li>Criticality: <span class=\"{$obj->criticality}\">{$obj->criticality}</span></li>";
    echo '<li>Owner: ' . $obj->department . ', ' . $obj->owner . '</li>';
    echo "<li>Date: {$obj->uploadDate}</li>";
    echo "</ul>";
    echo "</div>";
    ?>
    <div class="buttons-wrap">
      <?php
      echo "<a class=\"button\" href=\"download.php?id={$docId}\">Download</a>"
      ?>
    </div>
  </div>
  <script src="js/document-buttons.js"></script>
</body>

</html>