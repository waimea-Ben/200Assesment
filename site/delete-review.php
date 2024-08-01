<?php 
require 'lib/utils.php';

$id = $_POST['id'];


$db = connectToDB();

$query = 'DELETE FROM Reviews
          WHERE id= ?' ;

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB booking Remove', ERROR);
    die('there was an error Removing Review from Database');
}

header('location: admin_delete_forms.php');
?>