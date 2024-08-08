<?php require_once '_config.php'; ?>

<?php

$page = basename($_SERVER['SCRIPT_NAME']);

?>
<!DOCTYPE html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= SITE_NAME ?></title>
        <link rel="icon" href="/images/geoico.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <header>
            <h1><a href="index.php" id="title">Geosolutions</a></h1>
            <a href="index.php"><img src="images/geoicon.png" id="title-img" alt="Geosolutions Logo"></a>
            <nav>
                    <div id="LSmenu">
                        <a href="booking-form.php">Booking</a>
                        <a href="adminlogin.php">Admin</a>
                        <a href="form-review.php">Review</a>
                    </div>
                    
                    <div id="menudiv">
                        <label for="menu">☰</label>
                        <input type='checkbox' name='menu' id='menu'>
                        <ul class="menu-options">
                            <li><a href="booking-form.php">Booking</a></li>
                            <li><a href="adminlogin.php">Admin</a></li>
                            <li><a href="form-review.php">Review</a></li>
                        </ul>
                </div>
            </nav>
        </header>

        <main>


