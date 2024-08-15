<?php 
require 'lib/utils.php';  // Include utility functions

// Retrieve and sanitize the service ID from the POST data
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

// Connect to the database
$db = connectToDB();

// SQL query to delete a record from the services table
$query = 'DELETE FROM services WHERE id = ?';

try {
    // Prepare the SQL statement
    $stmt = $db->prepare($query);
    
    // Execute the statement with the service ID
    $stmt->execute([$id]);
} catch (PDOException $e) {
    // Handle the exception if an error occurs
    die('There was an error removing the service from the database');
}

// Redirect to the admin-delete-forms.php page after successful deletion
header('Location: admin-delete-forms.php');
exit;
?>
