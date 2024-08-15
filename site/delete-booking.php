<?php 
require 'lib/utils.php';  // Include utils

// Retrieve the booking ID from the query
$bookingid = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

// Connect to the database
$db = connectToDB();

// SQL query to delete a booking record from the bookings table
$query = 'DELETE FROM bookings WHERE id = ?';

try {
    // Prepare the SQL statement
    $stmt = $db->prepare($query);
    
    // Execute the statement with the booking ID
    $stmt->execute([$bookingid]);
} catch (PDOException $e) {
    // Handle the exception if an error occurs
    die('There was an error removing the booking from the database');
}

// Redirect to the admin-delete-forms.php page after successful deletion
header('Location: admin.php');
exit;
?>
