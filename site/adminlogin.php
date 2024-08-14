<?php 
// Include utility functions and the top part of the webpage
require 'lib/utils.php'; 
include 'partials/top.php';

// Start the session and set session name
session_name('bemartinGeoSolutions');
session_start();

// Log session data (for debugging purposes)
consoleLog($_SESSION);

// Check if the user is already logged in
$loggedIn = $_SESSION['user']['loggedIn'] ?? false;
if ($loggedIn) {
    // Redirect to admin page if user is logged in
    header('location:admin.php');
    exit(); // Ensure no further code is executed
}
?>

<!-- Login form for user authentication -->
<form method="post" action="login.php">
    <!-- Display error message if present in the query string -->
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php } ?>

    <!-- Input field for username -->
    <label>Username</label>
    <input type="text" 
           name="username"  
           required>
    
    <!-- Container for password input and eye icon -->
    <label>Password</label>
    <div class="password-container">
        <input type="password" 
               name="password"
               required id="myInput">
        <i id="eyeIcon" class="fas fa-eye" onclick="togglePassword()"></i>
    </div>

    <!-- JavaScript function to toggle password visibility -->
    <script>
        function togglePassword() {
            var x = document.getElementById("myInput");
            var eyeIcon = document.getElementById("eyeIcon");
            if (x.type === "password") {
                x.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                x.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>

    <!-- Submit button for the form -->
    <input id="add" type="submit" value="Login">
</form>



<?php 
// Include the bottom part of the webpage
include 'partials/bottom.php'; 
?>
