<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Documents | Document Management</title>
  <link rel="stylesheet" href="css/desktop.css" />
</head>

<body>
  <?php
  require_once("includes/config.php");
  include("includes/header.php");

  $defaultQuery = "SELECT d.*, o.username AS owner, o.department FROM document d JOIN employee o ON d.ownerId = o.id LIMIT 20;";
  $defaultDocuments = $mysqli->query($defaultQuery);

  function echoDocumentCards(object $documents)
  {
    while ($obj = $documents->fetch_object()) {
      echo "<div class=\"document-card\">";
      echo "<span class=\"document-card-name\">{$obj->name}</span>";
      echo "<ul class=\"document-card-details\">";
      echo "<li>Type: {$obj->type}</li>";
      echo "<li>Criticality: <span class=\"{$obj->criticality}\">{$obj->criticality}</span></li>";
      echo '<li>Owner: ' . $obj->department . ', ' . $obj->owner . '</li>';
      echo "<li>Date: {$obj->uploadDate}</li>";
      echo "</ul>";
      echo "</div>";
    }
  }
  ?>

  <div class="page-container">
    <div>
      <label>Search</label>
      <form class="search-form" method="post">
        <input type="search" placeholder="Search for documents" />
        <button type="submit" class="submit-search"><svg fill="#000000" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 30 30" width="30px" height="30px">
            <path
              d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z" />
          </svg></button>
      </form>
    </div>
    <div class="search-container">
      <div class="search-results">
        <?php
        echoDocumentCards($defaultDocuments);
        ?>
      </div>
      <div class="search-filters">
        <div class="search-filters-head">Filters</div>
        <div class="search-filters-section">
          <label>Type</label>
          <ul class="type-filters">
            <li><input type="checkbox"/><span>document type 1</span></li>
            <li><input type="checkbox"/><span>document type 2</span></li>
            <li><input type="checkbox"/><span>document type 3</span></li>
            <li><input type="checkbox"/><span>document type 4</span></li>
          </ul>
        </div>
        <div class="search-filters-section">
          <label>Criticality</label>
          <div>
          <select id="criticality" name="criticality">
            <option disabled selected value> -- select an option -- </option>
            <option value="low">low</option>
            <option value="medium">medium</option>
            <option value="high">high</option>
          </select>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  // include("includes/footer.php");
  ?>
</body>

</html>