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
    <link rel="stylesheet" href="pico.conditional.lime.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h2><a href="index.php"><?= SITE_NAME ?></a></h2>
        <a href="admin.php">Admin</a>
        <div class="dropdown" style="float:right;">
        <button class="dropbtn"><img src="download.png"></button>
        <div class="dropdown-content">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
        </div> 
    </div>
    </header>

    <main>



