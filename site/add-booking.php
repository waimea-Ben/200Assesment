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
$phone = $_POST['phone'];
$date = $_POST['date'];
$service = $_POST['service'];
$address = $_POST['address'];


$db = connectToDB();

$query = 'INSERT INTO bookings 
          (`name`, `email`, `phone`, `date`, `service`, `address`, image_type, image_data)
          VALUES (?,?,?,?,?,?,?,?)';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $email, $phone, $date, $service, $address, $imageType, $imageData]);
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'Booking Add', ERROR);
    die('there was an error Adding booking to Database');
}

header('location: index.php');
?>