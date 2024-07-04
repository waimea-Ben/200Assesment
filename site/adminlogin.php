<?php require 'lib/utils.php'; 
include 'partials/top.php';

$db = connectToDB();

$query = "SELECT * FROM admin_creds";

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $credentials = $stmt->fetch();   // Will only be one record
}


catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB service Add', ERROR);
    die('there was an error Adding service to Database');
}
consoleLog($credentials);
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