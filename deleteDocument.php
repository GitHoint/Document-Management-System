<?php

require_once "includes/config.php";
session_start();

if (!isset($_SESSION["loggedin"])) {
  header('location: index.php');
}

$docId = $_POST['id'];

$query = "SELECT * FROM document WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $docId);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows <= 0) {
  header("Location: search.php");
}
$obj = $result->fetch_object();

$file_path = 'documents/' . $obj->filePath;
if (unlink($file_path)) {
  $deleteQuery = "DELETE FROM document WHERE id = ?";
  $stmt = $mysqli->prepare($deleteQuery);
  $stmt->bind_param('i', $docId);
  $stmt->execute();
  echo "File deleted successfully.";
  header("location: search.php");
} else {
  echo "Error deleting file.";
}

?>