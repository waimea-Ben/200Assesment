<?php 
require 'lib/utils.php';  // Include utility functions for additional functionality

// Retrieve form data from POST request
$title = $_POST['title'];    // Title of the review
$content = $_POST['content']; // Content of the review
$rate = $_POST['rate'];      // Rating given in the review

// Connect to the database
$db = connectToDB();

// SQL query to insert a new review into the database
$query = 'INSERT INTO Reviews 
          (`title`, `content`, `stars`)
          VALUES (?,?,?)';

try {
    // Prepare the SQL statement
    $stmt = $db->prepare($query);
    
    // Execute the statement with form data
    $stmt->execute([$title, $content, $rate]);
} catch (PDOException $e) {
    // Log error message and terminate script if there is an exception
    consoleLog($e->getMessage(), 'review Add', ERROR);
    die('There was an error adding review to the database');
}

// Redirect to the homepage after successfully adding the review
header('Location: index.php');
?>
