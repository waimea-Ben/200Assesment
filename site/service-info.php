<?php 
// Include utility functions and top part of the webpage
require 'lib/utils.php'; 
include 'partials/top.php'; 

// Connect to the database
$db = connectToDB(); 

// Retrieve the service ID from the query string
$id = $_GET['id'] ?? null;

// Query to get details of the specific service by ID
$query = 'SELECT id, `name`, `description` FROM services WHERE id=?';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    // Fetch the service details
    $services = $stmt->fetch();
} catch (PDOException $e) {
    // Log error and stop script execution
    consoleLog($e->getMessage(), ERROR);
    die();
}

// Log the fetched service details (for debugging)
consoleLog($services);

// Query to get images associated with the service
$query = 'SELECT `service`, id, alt FROM service_images WHERE `service`=?';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    // Fetch all service images
    $service_images = $stmt->fetchAll();
} catch (PDOException $e) {
    // Log error and stop script execution
    consoleLog($e->getMessage(), ERROR);
    die();
}

// Display the main service image and title
echo '<div id="service_hero_image">'; 
echo '<img src="load-main-service-image.php?id=' . htmlspecialchars($services['id']) . '">';
echo '<div id="service_hero_text">';
echo '<h1>' . htmlspecialchars($services['name']) . '</h1>';
echo '</div>';
echo '</div>';

// Display the service description
echo '<section id="service_info">';
echo '<p>' . htmlspecialchars($services['description']) . '</p>';
echo '</section>';

// Display examples of service images
echo '<section id="service_images">';
echo '<h2>Examples</h2>';
echo '<div class="row">';
foreach ($service_images as $images) {
    echo '<div class="excolumn">';   
    echo '<img src="load-service-image.php?id=' . htmlspecialchars($images['id']) . '" alt="' . htmlspecialchars($images['alt']) . '" style="width:100%" onclick="myFunction(this);">';      
    echo '</div>';       
}
?>
    </div>
</section>

<!-- Modal to display the expanded image -->
<div class="fullimage">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" style="width:100%">
  <div id="imgtext"></div>
</div>

<!-- JavaScript for handling image expansion -->
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
// Include the bottom part of the webpage
include 'partials/bottom.php'; 
?>
