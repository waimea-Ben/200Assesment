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

$query = 'SELECT `service`, id, alt FROM service_images WHERE `service`=?';

try{
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $service_images = $stmt->fetchall();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), ERROR);
    die();
}



echo    '<div id="service_hero_image">'; 
echo        '<img src="load-main-service-image.php?id=' . $services['id'] . '">';
echo    '<div id="service_hero_text">';
echo        '<h1>' . $services['name'] . '</h1>';
echo    '</div>';
echo    '</div>';

echo   '<section id="service_info">';
echo       '<p>' . $services['description'] . '</p>';
echo   '</section>';

echo    '<section id="service_images">';
echo    '<h2>Examples</h2>';
echo    '<div class="row">';
foreach($service_images as $images) {
    echo    '<div class="excolumn">';   
    echo    '<img src="load-service-image.php?id=' . $images['id'] . '"alt="' . $images['alt'] . '" style="width:100%" onclick="myFunction(this);">';      
    echo    '</div>';       
}
?>
    </div>
</section>

<div class="fullimage">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" style="width:100%">
  <div id="imgtext"></div>
</div>


<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>

<?php
 include 'partials/bottom.php'; 
 ?>