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
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
    <link rel="stylesheet" href="style.css">
    
</head>

<body>

    <header>
        <h1><a href="index.php"><?= SITE_NAME ?></a></h1>
        <nav>
                <div id="menudiv">
                    <label for="menu">☰</label>
                    <input type='checkbox' name='menu' id='menu'>
                    <ul class="menu-options">
                        <li><a href="booking_form.php">Booking</a></li>
                        <li><a href="adminlogin.php">login</a></li>
                        <li><a href="form-review.php">Review</a></li>
                    </ul>
            </div>
        </nav>
    </header>

    <main>


