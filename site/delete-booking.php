<?php 
require 'lib/utils.php';

$bookingid = $_GET['id'];


$db = connectToDB();

$query = 'DELETE FROM bookings 
          WHERE id= ?' ;

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$bookingid]);
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB booking Remove', ERROR);
    die('there was an error Removing Game from Database');
}

header('location: admin-delete-forms.php');
?>