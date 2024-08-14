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
//////////////////////////////////////////////////////////////////////////////

// Query to fetch all staff members
$query = 'SELECT * FROM staff';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute();
    // Fetch all results
    $staff = $stmt->fetchAll();
} catch (PDOException $e) {
    // Log error and display a user-friendly message
    consoleLog($e->getMessage(), 'DB List fetch', ERROR);
    die('There was an error getting data from the database');
}
//////////////////////////////////////////////////////////////////////////////

// Query to fetch all reviews
$query = 'SELECT * FROM Reviews';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute();
    // Fetch all results
    $reviews = $stmt->fetchAll();
} catch (PDOException $e) {
    // Log error and display a user-friendly message
    consoleLog($e->getMessage(), 'DB List fetch', ERROR);
    die('There was an error getting data from the database');
}
//////////////////////////////////////////////////////////////////////////////

// Query to fetch service images
$query = 'SELECT `service`, id, alt FROM service_images';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute();
    // Fetch all results
    $service_images = $stmt->fetchAll();
} catch (PDOException $e) {
    // Log error and stop script execution on failure
    consoleLog($e->getMessage(), ERROR);
    die();
}
////////////////////////////////////////////////////////////////////////////////////
?>

<!-- Delete Staff Section -->
<h2>Delete Staff</h2>
<form method="post" action="delete-staff.php">
    <label>Staff Member</label>
    <select name="id">
        <?php
        // Generate a dropdown list of staff members
        foreach ($staff as $staffmem) {
            echo '<option value="' . htmlspecialchars($staffmem['id']) . '">' . htmlspecialchars($staffmem['Name']) . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>

<!-- Delete Service Section -->
<h2>Delete Service</h2>
<form method="post" action="delete-service.php">
    <label>Service</label>
    <select name="id">
        <?php
        // Generate a dropdown list of services
        foreach ($services as $service) {
            echo '<option value="' . htmlspecialchars($service['id']) . '">' . htmlspecialchars($service['name']) . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>

<!-- Delete Service Example Section -->
<h2>Delete Service Example</h2>
<form method="post" action="delete-service-example.php">
    <label>Example</label>
    <select name="id">
        <?php
        // Generate a dropdown list of service images
        foreach ($service_images as $service_ex) {
            echo '<option value="' . htmlspecialchars($service_ex['id']) . '">' . htmlspecialchars($service_ex['id']) . '. ' . htmlspecialchars($service_ex['alt']) . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>

<!-- Delete Review Section -->
<h2>Delete Review</h2>
<form method="post" action="delete-review.php">
    <label>Review Title</label>
    <select name="id">
        <?php
        // Generate a dropdown list of reviews
        foreach ($reviews as $review) {
            echo '<option value="' . htmlspecialchars($review['id']) . '">' . htmlspecialchars($review['title']) . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>

<?php 
// Include the bottom part of the webpage
include 'partials/bottom.php'; 
?>
