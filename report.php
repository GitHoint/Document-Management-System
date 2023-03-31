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
  <script>
    function onSelect(dateValue) {
      dates = dateValue.split("-");
      window.location.href = `/document-management/report.php?month=${dates[0]}&year=${dates[1]}`;
    }
  </script>
</head>

<body>
  <?php
  include("includes/header.php");
  ?>
  <div class="page-container">
    <h1 class="report-title">Monthly Report</h1>
    <div class="report-date">
      <select onchange="onSelect(this.value)">
        <?php
        $monthQuery = $_GET['month'] ?? null;
        $yearQuery = $_GET['year'] ?? null;
        $dateValue = null;
        if ($monthQuery != null && $yearQuery != null) {
          $dateValue = $monthQuery . "-" . $yearQuery;
        }
        $datesQuery = $mysqli->query("SELECT DISTINCT DATE_FORMAT(uploadDate, '%M %Y') as month_year FROM document ORDER BY ABS(DATEDIFF(NOW(), uploadDate)), month_year ASC;");
        while ($dateObj = $datesQuery->fetch_object()) {
          $timestamp = strtotime($dateObj->month_year);
          $formatted_date_str = date('m-Y', $timestamp);
          echo $dateValue != null && $dateValue == $formatted_date_str ? "<option value=\"$formatted_date_str\" selected >" . $dateObj->month_year . '</option>' :
            "<option value=\"$formatted_date_str\" >" . $dateObj->month_year . '</option>';
        }
        ?>
      </select>
    </div>
    <?php
    if ($monthQuery == null | $yearQuery == null) {
      $monthQuery = date('m');
      $yearQuery = date('Y');
    }
    $stmt = $mysqli->prepare("SELECT d.*, o.username AS owner, o.department FROM document d JOIN employee o ON d.ownerId = o.id WHERE MONTH(d.uploadDate) = ? AND YEAR(d.uploadDate) = ?;");
    $stmt->bind_param('ss', $monthQuery, $yearQuery);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      include("includes/monthlyReport.php");
    }
    ?>
  </div>
</body>

</html>