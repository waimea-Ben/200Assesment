<?php 
require 'lib/utils.php';

$id = $_POST['id'];


$db = connectToDB();

$query = 'DELETE FROM service_images
          WHERE id= ?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB booking Remove', ERROR);
    die('there was an error Removing Service from Database');
}

header('location: admin-delete-forms.php');
?>