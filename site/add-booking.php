<?php 
require 'lib/utils.php';  // Include utility functions

// Check if POST or FILES data is empty, likely due to a file upload error (e.g., file too large)
if (empty($_POST) && empty($_FILES)) die('There was a problem uploading the file (probably too large)');


// Retrieve image data and type from the uploaded file
[
    'data' => $imageData,
    'type' => $imageType
] = uploadedImageData($_FILES['image']);  // Function to process uploaded image

// Get other form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$service = $_POST['service'];
$address = $_POST['address'];

// Connect to the database
$db = connectToDB();

// SQL query to insert booking information into the database
$query = 'INSERT INTO bookings 
          (`name`, `email`, `phone`, `date`, `service`, `address`, image_type, image_data)
          VALUES (?,?,?,?,?,?,?,?)';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $email, $phone, $date, $service, $address, $imageType, $imageData]);
} catch (PDOException $e) {
    // Log and display error if the query fails
    consoleLog($e->getMessage(), 'Booking Add', ERROR);
    die('There was an error adding booking to Database');
}

// Redirect to the homepage after successful insertion
header('Location: index.php');
?>
