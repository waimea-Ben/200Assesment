<?php 
require 'lib/utils.php';

$id = $_POST['id'];


$db = connectToDB();

$query = 'DELETE FROM staff 
          WHERE id= ?' ;

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB booking Remove', ERROR);
    die('there was an error Removing Staff from Database');
}

header('location: admin_delete_forms.php');
?>