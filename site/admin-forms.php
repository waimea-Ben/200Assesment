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

<!-- Form to add a new staff member -->
<h1>New Staff Member</h1>
<form method="post" action="add-staff.php" enctype="multipart/form-data">
    <label>Name</label>
    <input type="text" 
           name="name"  
           required 
           placeholder="Enter their name">

    <label>Email</label>
    <input type="email" 
           name="email" 
           placeholder="Enter their email">

    <label>Description</label>
    <input type="text" 
           name="description" 
           required 
           placeholder="Enter a Description">

    <label>Image file</label>
    <input type="file" 
           name="image"
           accept="image/*" 
           required>

    <input type="submit" value="Add">
</form>

<!-- Form to add a new service -->
<h1>New Service</h1>
<form method="post" action="add-service.php" enctype="multipart/form-data">
    <label>Service</label>
    <input type="text" 
           name="name"  
           required 
           placeholder="Enter the service name">

    <label>Description</label>
    <input type="text" 
           name="description" 
           required 
           placeholder="Enter a Description">

    <label>Main Image file</label>
    <input type="file" 
           name="image"
           accept="image/*" 
           required>

    <input type="submit" value="Add">
</form>

<!-- Form to add a new service image example -->
<h1>New Service Image Example</h1>
<form method="post" action="add-service-example.php" enctype="multipart/form-data">
    <label>Service</label>
    <select name="service">
        <?php
        // Generate a dropdown list of services
        foreach ($services as $service) {
            echo '<option value="' . htmlspecialchars($service['id']) . '">' . htmlspecialchars($service['name']) . '</option>';
        }
        ?>
    </select>

    <label>Image Description</label>
    <input type="text" 
           name="alt" 
           placeholder="E.G. Tree">

    <label>Example image</label>
    <input type="file" 
           name="image"
           accept="image/*" 
           required>

    <input type="submit" value="Add">
</form>

<?php 
// Include the bottom part of the webpage
include 'partials/bottom.php'; 
?>
