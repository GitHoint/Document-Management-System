<?php
// retrieve the document ID from the query parameter
require_once "includes/config.php";
$docId = $_GET['id'];

// query the database to get the document information
// replace "your_db_table" with the actual name of your database table
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
$file_path = 'documents/' . $obj->filePath; // replace "file_path" with the actual name of your file path column
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($obj->filePath).'"');
header('Content-Length: ' . filesize($file_path));
readfile($file_path);
?>