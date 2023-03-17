<?php
require_once "includes/config.php";
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values submitted from the form
    $document_name = $_POST["document_name"];
    $type = $_POST["type"];
    $criticality = $_POST["criticality"];
    
    // Check if a file was uploaded
    if ($_FILES["filename"]["error"] == UPLOAD_ERR_OK) {
        // Get the file details
        $file_name = basename($_FILES["filename"]["name"]);
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $file_size = $_FILES["filename"]["size"];
        
        // Check if the file type is allowed
        $allowed_types = array("pdf", "doc", "docx");
        if (!in_array($file_type, $allowed_types)) {
            die("Error: Only PDF, DOC and DOCX files are allowed.");
        }
        
        // Check if the file size is less than 10 MB
        if ($file_size > 10 * 1024 * 1024) {
            die("Error: The file size must be less than 10 MB.");
        }
        
        // Generate a unique filename for the uploaded file
        $new_file_name = uniqid() . "." . $file_type;
        
        // Upload the file to the server
        move_uploaded_file($_FILES["filename"]["tmp_name"], "documents/" . $new_file_name);
        $owenerId = $_SESSION["id"];
        // Prepare the SQL statement
        $sql = "INSERT INTO document (name, ownerId, type, criticality, filePath) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssss", $document_name, $owenerId, $type, $criticality, $new_file_name);
        
        // Execute the SQL statement
        if ($stmt->execute()) {
            echo "File uploaded successfully.";
            header("location: search.php");
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
        
        // Close the database connection
        $stmt->close();
        $mysqli->close();
    } else {
        die("Error: " . $_FILES["filename"]["error"]);
    }
}
?>
