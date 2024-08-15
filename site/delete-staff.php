<?php 
require 'lib/utils.php';  // Include utility functions

// Retrieve and sanitize the staff ID from the POST data
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

// Connect to the database
$db = connectToDB();

// SQL query to delete a staff member based on the provided ID
$query = 'DELETE FROM staff WHERE id = ?';

try {
    // Prepare the SQL statement
    $stmt = $db->prepare($query);
    
    // Execute the statement with the staff ID
    $stmt->execute([$id]);
} catch (PDOException $e) {
    // Log the error message
    consoleLog($e->getMessage(), 'DB staff Remove', ERROR);
    
    // Display a user-friendly error message and terminate the script
    die('There was an error removing the staff member from the database');
}

// Redirect to the admin-delete-forms.php page after successful deletion
header('Location: admin-delete-forms.php');
exit;
?>
