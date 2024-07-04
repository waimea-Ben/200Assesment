<?php 
require 'lib/utils.php'; 


$username =$_POST['username'];
$password = $_POST['password'];


$db = connectToDB();


$query = "SELECT * FROM admin_creds";

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $credentials = $stmt->fetch();   // Will only be one record
}


catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB service Add', ERROR);
    die('there was an error Adding service to Database');
}


if ($credentials['username'] == $username && $credentials['password'] == $password) {
    header('location: admin.php');
}

if ($credentials['username'] != $username && $credentials['password'] == $password) {
    header('location: admin.php');
}

if ($credentials['username'] == $username && $credentials['password'] != $password) {
    header('location: adminlogin.php?error=Incorrect Password');
}

if ($credentials['username'] != $username && $credentials['password'] != $password) {
    header('location: adminlogin.php?error=Incorrect password and username');
}

?>