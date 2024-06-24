<?php 
require 'lib/utils.php';

if(empty($_POST) && empty($_FILES)) die ('There was a problem uploading the file (probably too large)');

// Get image data and type of uploaded file from the $_FILES super-global
consoleLog($_POST, 'POST');
consoleLog($_FILES, 'FILES');

[
    'data' => $imageData,
    'type' => $imageType
] = uploadedImageData($_FILES['image']);

$name = $_POST['name'];
$email = $_POST['email'];
$description = $_POST['description'];


$db = connectToDB();

$query = 'INSERT INTO staff 
          (`name`, `email`, `description`, image_type, image_data)
          VALUES (?,?,?,?,?)';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $email, $description, $imageType, $imageData]);
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'Booking Add', ERROR);
    die('there was an error Adding new staff to Database');
}

header('location: index.php');
?>