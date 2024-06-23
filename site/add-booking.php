<?php 
require 'lib/utils.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$service = $_POST['service'];
$address = $_POST['address'];
$siteplan = $_POST['siteplan'];


$db = connectToDB();

$query = 'INSERT INTO bookings 
          (`name`, `email`, `phone`, `date`, `service`, `address`, `siteplan`)
          VALUES (?,?,?,?,?,?,?)';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $email, $phone, $date, $service, $address, $siteplan]);
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'Booking Add', ERROR);
    die('there was an error Adding booking to Database');
}

header('location: index.php');
?>