<?php require 'lib/utils.php'; 
include 'partials/top.php';
// Connect to the database 
$db = connectToDB(); 
$id = $_GET['id'] ?? null;
// Setup a query to get all company info 
$query = 'SELECT id, `name`, `description` FROM services WHERE id=?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $services = $stmt->fetch();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), ERROR);
    die();
}
consoleLog($services);

$query = 'SELECT `service`, id FROM service_images WHERE `service`=?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $service_images = $stmt->fetchall();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), ERROR);
    die();
}
consoleLog($service_images);



echo    '<section id="hero_image">';
echo    '<img src="load-main-service-image.php?id=' . $services['id'] . '">';      
echo       '<h1>' . $services['name'] . '</h1>';
echo    '</section>';

echo   '<section id="service_info">';
echo       '<h2>' . $services['name'] . '</h2>';
echo       '<p>' . $services['description'] . '</p>';
echo   '</section>';

echo    '<section id="service_images">';
foreach($service_images as $images) {
    echo    '<div id="serviceimg">';   
    echo    '<img src="load-service-image.php?id=' . $images['id'] . '">';      
    echo    '</div>';       
}
echo    '</section>';



 include 'partials/bottom.php'; 
 ?>