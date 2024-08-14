<?php 
require 'lib/utils.php';  // Include utility functions for additional functionality

// Check if POST or FILES data is empty and terminate if true
if(empty($_POST) && empty($_FILES)) 
    die('There was a problem uploading the file (probably too large)');

// Extract image data and type from the uploaded file
[
    'data' => $imageData,  // Binary data of the uploaded image
    'type' => $imageType   // MIME type of the uploaded image (e.g., image/jpeg)
] = uploadedImageData($_FILES['image']);  // Function to handle file upload and extraction

// Retrieve other form data
$service = $_POST['service']; // ID of the service associated with the image
$alt = $_POST['alt'];         // Alt text for the image

// Connect to the database
$db = connectToDB();

// SQL query to insert a new image record into the service_images table
$query = 'INSERT INTO service_images
          (`service`, image_type, image_data, alt)
          VALUES (?,?,?,?)';

try {
    // Prepare the SQL statement
    $stmt = $db->prepare($query);
    
    // Execute the statement with form data
    $stmt->execute([$service, $imageType, $imageData, $alt]);
} catch (PDOException $e) {
    // Log error message and terminate script if there is an exception
    consoleLog($e->getMessage(), 'service image Add', ERROR);
    die('There was an error adding new service image to database');
}

// Redirect to the homepage after successfully adding the service image
header('Location: index.php');
?>
