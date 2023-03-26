<?php
require_once "includes/config.php";
$docId = $_GET['id'];

session_start();
if (!isset($_SESSION["loggedin"])) {
  header("location: index.php");
}
$employeeId = $_SESSION["id"];
$userType = $_SESSION["user_type"];
session_write_close();

// query the database to get the document information
$query = "SELECT filePath FROM document WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $docId);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows <= 0) {
  header("Location: search.php");
}
$obj = $result->fetch_object();

// set the appropriate headers to force the browser to download the file
$file_path = 'documents/' . $obj->filePath;
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($obj->filePath).'"');
header('Content-Length: ' . filesize($file_path));
readfile($file_path);

// add record to document access table'
if ($userType == "employee") {
  $docAccessQuery = "INSERT INTO documentaccess (employeeId, documentId, action) VALUES (?, ?, 'download');";
  $queryPrep = $mysqli->prepare($docAccessQuery);
  $queryPrep->bind_param('ss', $employeeId, $docId);
  $queryPrep->execute();
}
?>