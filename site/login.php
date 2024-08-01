<?php 
require 'lib/utils.php'; 

session_name('bemartinGeoSolutions');
session_start();
consoleLog($_SESSION);

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

consoleLog($credentials);

if ($credentials['admin'] == $username && $credentials['password'] == $password) {
    $_SESSION['user']['loggedIn'] = true;
    header('location: admin.php');
}
else {
    header('location: adminlogin.php?error=Incorrect password or username');
}


?>