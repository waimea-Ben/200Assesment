<?php
// Set the session name and start the session
session_name('bemartinGeoSolutions');
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the homepage or login page
header('Location: index.php'); // Adjust the location if needed
exit();
?>
