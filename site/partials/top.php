<?php require_once '_config.php'; ?>

<?php

$page = basename($_SERVER['SCRIPT_NAME']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?></title>
    <link rel="stylesheet" href="style.css">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
    
</head>

<body>

    <header>
        <h2><a href="index.php"><?= SITE_NAME ?></a></h2>
        <nav>
                <label for='admin'>admin</label>
                <input type='checkbox' name='admin' id='admin'>
                <div id="admin-login">
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
                                required>

                            <input id='add' type="submit" value="Login">
                    </form>
                </div>

                <div id="menudiv">
                    <label for="menu">☰</label>
                    <input type='checkbox' name='menu' id='menu'>
                    <ul class="menu-options">
                        <li><a href="booking_form.php">Booking</a></li>
                        <li><a href="admin_forms.php">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                    </ul>
            </div>
        </nav>
    </header>

    <main>


