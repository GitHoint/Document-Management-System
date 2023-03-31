<?php
require_once("includes/config.php");

session_start();
if (!isset($_SESSION["loggedin"])) {
  header("location: index.php");
}

$docId = $_GET['documentId'] ?? null;
$userType = $_SESSION["user_type"];
$employeeId = $_SESSION["id"];

session_write_close();

$stmt = $mysqli->prepare("SELECT d.*, o.username AS owner, o.department FROM document d JOIN employee o ON d.ownerId = o.id WHERE d.id = ?;");
$stmt->bind_param('s', $docId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows <= 0) {
  header("Location: search.php");
}

$obj = $result->fetch_object();

if ($userType == "employee" && $employeeId != $obj->ownerId) {
  $docAccessQuery = "INSERT INTO documentaccess (employeeId, documentId, action) VALUES (?, ?, 'view');";
  $queryPrep = $mysqli->prepare($docAccessQuery);
  $queryPrep->bind_param('ss', $employeeId, $docId);
  $queryPrep->execute();

  //Sending Email
  require_once("includes/email-function.php");
  $adminQuery = "SELECT email FROM admin";
  $adminResult = $mysqli->query($adminQuery);
  $row = mysqli_fetch_assoc($adminResult);
  $username = $_SESSION["username"];
  $email = $row['email'];
  $subject= "Document Access";
  $message = "<h2>A document has been accessed.</h2>
              <h3>Here are the details:</h3>
              <br>
              <p>Document Name: $obj->name</p> 
              <p>Criticality: $obj->criticality</p>
              <p>Owner: $obj->department, $obj->owner</p>
              <p>Uploaded On: $obj->uploadDate</p>
              <br>
              <p>Accessed By: $username</p>
              <p>Access Date: " . date('Y/m/d') . "</p>
              <p>Access Time: " . date('H:i') . "</p>";
  DocEmail($email, $subject, $message);

}

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
  <link rel="stylesheet" href="pdfjs/web/viewer.css">
  <script src="pdfjs/build/pdf.js"></script>
  <script>

    const pdfUrl = '<?php echo "documents/" . $obj->filePath ?>';

    pdfjsLib.getDocument(pdfUrl).promise.then(function (pdfDoc) {
      pdfDoc.getPage(1).then(function (page) {
        const scale = 0.6;

        const viewport = page.getViewport({ scale: scale });

        const canvas = document.createElement('canvas');
        canvas.id = 'pdfCanvas';
        canvas.width = viewport.width;
        canvas.height = viewport.height;

        const pdfViewer = document.getElementById('pdfViewer');
        pdfViewer.appendChild(canvas);

        const ctx = canvas.getContext('2d');
        const renderContext = {
          canvasContext: ctx,
          viewport: viewport
        };
        page.render(renderContext);
      });
    });
    
  </script>
</head>

<body>
  <?php
  include("includes/header.php");
  ?>
  <div class="page-container">
    <?php
    $username = $_SESSION['username'] == $obj->owner ? "owner" : '';

    echo "<script>";
    echo "const userStatus = '{$username}';";
    echo "const docId = {$obj->id}";
    echo "</script>";
    ?>
    <div class="document-page-wrap">
      <div>
        <?php
        echo "<div class=\"document-container\">";
        echo '<div id="pdfViewer"></div>';
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
          echo "<a class=\"type-submit\" href=\"download.php?id={$docId}\">Download</a>"
            ?>
        </div>
      </div>
      <div class="recent-activity">
        <?php
        if ($username == "owner" || $userType == "admin") {
          $ral_list = $mysqli->query("SELECT da.*, e.username FROM documentaccess da JOIN employee e ON da.employeeId = e.id WHERE documentId = $docId ORDER BY da.accessDate DESC LIMIT 10;");
          if ($ral_list->num_rows > 0) {
            include("includes/recentActivity.php");
          }
        }
        ?>
      </div>
    </div>
  </div>
  <script src="js/document-buttons.js"></script>
</body>

</html>