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

        <label for='admin'>admin</label>
        <input type='checkbox' name='admin' id='admin'>
        <div id="admin-login">
            <p>e</p>
        </div>
            <label for="menu"><img src="images/download.png"></label>
            <input type='checkbox' name='menu' id='menu'>
            <ul class="menu-options">
                <li><a href="booking_form.php">Booking</a></li>
                <li><a href="admin_forms.php">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
            </ul>
    </div>
    </header>

    <main>


