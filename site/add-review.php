<?php 
require 'lib/utils.php';


$title = $_POST['title'];
$content = $_POST['content'];
$rate = $_POST['rate'];



$db = connectToDB();

$query = 'INSERT INTO Reviews 
          (`title`, `content`, `stars`)
          VALUES (?,?,?)';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$title, $content, $rate]);
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'review Add', ERROR);
    die('there was an error Adding review to Database');
}

header('location: index.php');
?>