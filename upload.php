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
  ?>

    
        

<div class="container">
<center><p>Upload Document</p></center>
  <form action="/action_page.php">
    <div class="row">
      <div class="col-25">
        <label for="Doc-name">Document Name</label>
      </div>
      <div class="col-75">
        <input type="text" placeholder="Enter your document name here...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Doc-type">Document Type</label>
      </div>
      <div class="col-75">
        <input type="text" placeholder="Document type">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="criticality">Criticality</label>
      </div>
      <div class="col-75">
        <select  name="criticality level">
          <option value="doc-type-1">Document Type 1</option>
          <option value="doc-type-2">Document Type 2</option>
          <option value="doc-type-3">Document Type 3</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="File"> File</label>
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