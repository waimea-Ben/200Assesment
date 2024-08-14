<?php 
require 'lib/utils.php';  // Include utility functions for additional functionalities

// Check if POST or FILES data is empty and terminate if true
if(empty($_POST) && empty($_FILES)) 
    die('There was a problem uploading the file (probably too large)');


// Extract image data and type from the uploaded file
[
    'data' => $imageData,  // Binary data of the uploaded image
    'type' => $imageType   // MIME type of the uploaded image (e.g., image/jpeg)
] = uploadedImageData($_FILES['image']);  // Function to handle file upload and extraction

// Retrieve form data
$name = $_POST['name'];          // Name of the staff member
$email = $_POST['email'];        // Email of the staff member
$description = $_POST['description']; // Description for the staff member

// Connect to the database
$db = connectToDB();

// SQL query to insert a new staff record into the staff table
$query = 'INSERT INTO staff 
          (`name`, `email`, `description`, image_type, image_data)
          VALUES (?,?,?,?,?)';

try {
    // Prepare the SQL statement
    $stmt = $db->prepare($query);
    
    // Execute the statement with form data
    $stmt->execute([$name, $email, $description, $imageType, $imageData]);
} catch (PDOException $e) {
    // Log error message and terminate script if there is an exception
    consoleLog($e->getMessage(), 'Staff Add', ERROR);
    die('There was an error adding new staff to the database');
}

// Redirect to the homepage after successfully adding the staff member
header('Location: index.php');
?>
