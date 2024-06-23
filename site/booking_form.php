
<?php 
require 'lib/utils.php';
include 'partials/top.php'; 

$db = connectToDB();

$query = 'SELECT * 
          FROM services';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $services = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List fetch', ERROR);
    die('there was an error getting data from the database');
}

consolelog($services);
?>

<h1> New Booking </h1>

 <form method="post" action="add-booking.php">

    <label>Name</label>
    <input type="text" 
           name="name"  
           required 
           placeholder="Enter your name">

    <label>Email</label>
    <input type="email" 
           name="email" 
           placeholder="Enter your email">

    <label>Phone Number</label>
    <input type="tel" 
           name="phone" 
           required 
           placeholder="Enter Your Phone number">

    <label>Date</label>
    <input type="date" 
           name="date" 
           required 
           placeholder="DD/MM/YYYY">

    <label>Service</label>
    <select name="service" required>
<?php
    foreach($services as $service) {
    echo    '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
}?>
    </select>
    <label>site address</label>
    <input type="text" 
           name="address" 
           required 
           placeholder="Enter the Site address">

    <label>Preliminary site plan</label>
    <input type="file" 
           name="siteplan"
           accept=".png, .jpg, .jpeg" 
           required 
           placeholder="upload file">

    <input id='add' type="submit" value="Add">
</form>




<?php 

include 'partials/bottom.php'; 
?>