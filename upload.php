<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document Upload | Document Management</title>
  <link rel="stylesheet" href="css/desktop.css" />
</head>

<body>
  <?php
  include("includes/header.php");
  require_once("includes/config.php");
  $obj = null;
  if (isset($_SESSION["ld_id"])) {
    $docId = $_SESSION["ld_id"];
    $stmt = $mysqli->prepare("SELECT d.*, o.username AS owner, o.department FROM document d JOIN employee o ON d.ownerId = o.id WHERE d.id = ?;");
    $stmt->bind_param('i', $docId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows <= 0) {
      header("Location: search.php");
    }
    $obj = $result->fetch_object();
    $_SESSION["ld_id"] = null;
  }
  ?>

  <div class="container">
    <center>
      <p>
        <?php
        echo $obj == null ? "Upload Document" : "Edit Document";

      ?></p>
    </center>
    <form method="post" enctype="multipart/form-data" action="uploadDocument.php">
      <div class="row">
        <div class="col-25">
          <label for="Doc-name">Document Name</label>
        </div>
        <div class="col-75">
          <!-- <input name="document_name" type="text" placeholder="Enter your document name here..."/> -->
          <?php
            $nameValue = $obj == null ? "" : $obj->name;
            echo "<input value=\"{$nameValue}\" name=\"document_name\" type=\"text\" placeholder=\"Enter your document name here\"/>"
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="Doc-type">Document Type</label>
        </div>
        <div class="col-75">
        <?php
            $typeValue = $obj == null ? "" : $obj->type;
            echo "<input value=\"{$typeValue}\" name=\"type\" type=\"text\" placeholder=\"Document type\"/>"
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="criticality">Criticality</label>
        </div>
        <div class="col-75">
          <select name="criticality">
            <?php
              $critValue = $obj == null ? "" : trim($obj->criticality);
              echo $critValue;
              echo $critValue == "low" ? "<option value=\"low\" selected >low</option>" : "<option value=\"low\">low</option>";
              echo $critValue == "medium" ? "<option value=\"medium\" selected >medium</option>" : "<option value=\"medium\">medium</option>";
              echo $critValue == "high" ? "<option value=\"high\" selected >high</option>" : "<option value=\"high\">high</option>";
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="File">File</label>
        </div>
        <div class="col-75">
          <input type="file" id="#" name="filename">
        </div>
      </div>
      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>


</body>

</html>