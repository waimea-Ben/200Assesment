<?php require 'lib/utils.php'; 
include 'partials/top.php';

session_name('bemartinGeoSolutions');
session_start();
consoleLog($_SESSION);
$loggedIn = $_SESSION['user']['loggedIn'] ?? false;
if ($loggedIn == true) header('location:admin.php');

?>
<form method="post" action="login.php">
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

        <label>Username</label>
        <input type="text" 
            name="username"  
            required>
        
        <label>Password</label>
        <input type="password" 
            name="password"
            required id="myInput">

            <input type="checkbox" onclick="myFunction()">Show Password
            <script>
                function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } 
                else {
                    x.type = "password";
                }
                }
            </script>

        <input id='add' type="submit" value="Login">
</form>
<?php include 'partials/bottom.php'; ?>