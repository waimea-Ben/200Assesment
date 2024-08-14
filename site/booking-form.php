<?php 
// Include utility functions and top part of the webpage
require 'lib/utils.php';
include 'partials/top.php'; 

// Connect to the database
$db = connectToDB();

// Query to fetch all services
$query = 'SELECT * FROM services';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute();
    // Fetch all results
    $services = $stmt->fetchAll();
} catch (PDOException $e) {
    // Log error and display a user-friendly message
    consoleLog($e->getMessage(), 'DB List fetch', ERROR);
    die('There was an error getting data from the database');
}
?>

<!-- Form to add a new booking -->
<h1>New Booking</h1>
<form method="post" action="add-booking.php" enctype="multipart/form-data">
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
           placeholder="Enter your phone number">

    <label>Date</label>
    <input type="date" 
           name="date" 
           required>

    <label>Service</label>
    <select name="service">
        <?php
        // Generate a dropdown list of services
        foreach ($services as $service) {
            echo '<option value="' . htmlspecialchars($service['id']) . '">' . htmlspecialchars($service['name']) . '</option>';
        }
        ?>
    </select>

    <label>Site Address</label>
    <input type="text" 
           name="address" 
           required 
           placeholder="Enter the site address">

    <label>Preliminary Site Plan</label>
    <input type="file" 
           name="image"
           accept="image/*" 
           required>

    <input id="add" type="submit" value="Add">
</form>

<?php 
// Include the bottom part of the webpage
include 'partials/bottom.php'; 
?>
