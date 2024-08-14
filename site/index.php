<?php 
// Include utility functions and top part of the webpage
require 'lib/utils.php'; 
include 'partials/top.php';

// Connect to the database
$db = connectToDB(); 

// Query to get all services
$query = 'SELECT * FROM services ORDER BY name ASC';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute();
    // Fetch all results
    $services = $stmt->fetchAll();
} catch (PDOException $e) {
    // Log error and stop script execution on failure
    consoleLog($e->getMessage(), ERROR);
    die();
}

// Query to get all staff information
$query = 'SELECT id, `name`, email, description FROM staff ORDER BY `name` ASC';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute();
    // Fetch all results
    $staff = $stmt->fetchAll();
} catch (PDOException $e) {
    // Log error and stop script execution on failure
    consoleLog($e->getMessage(), ERROR);
    die();
}

// Query to get all reviews
$query = 'SELECT * FROM Reviews';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute();
    // Fetch all results
    $reviews = $stmt->fetchAll();
} catch (PDOException $e) {
    // Log error and stop script execution on failure
    consoleLog($e->getMessage(), ERROR);
    die();
}
?>

<!-- Hero Image Section -->
<div id="hero_image">
    <div id="hero_text">
        <h1>Geosolutions</h1>
    </div>
</div>

<!-- About Us Section -->
<section id="about">
    <h2>About Us</h2>
    <p>We are a specialised geotechnical consultancy, covering projects and sites all around the Top of the South Island and look after both the residential and commercial building sectors. We’re a local business and aim to look after our clients so that they tell all their friends. Word-of-mouth referrals are our favourite jobs! Talk to us now and find out how we can help.</p>
</section>

<!-- Contact Us Section -->
<section id="contact">
    <h2>Contact us</h2>
    <p>3a Warren Place, Māpua 7005, 0278986000</p>
    <a href="booking-form.php">Book A Consultation</a>
</section>

<!-- Services Section -->
<section id="Services">
    <h2>Services</h2>
    <?php
    // Display each service as a list item with a link to its detailed page
    foreach ($services as $service) {
        echo '<ul>';         
        echo '<li><a href="service-info.php?id=' . htmlspecialchars($service['id']) . '">' . htmlspecialchars($service['name']) . '</a></li>';
        echo '</ul>';       
    }
    ?>
</section>

<!-- Staff Section -->
<section id="staff">
    <h2>Our Staff</h2>
    <div class="all-staff">
    <?php
    // Display each staff member with an image, name, email, and description
    foreach ($staff as $staffMember) {
        echo '<article>';
        echo '<img alt="' . htmlspecialchars($staffMember['name']) . '" src="load-staff-image.php?id=' . htmlspecialchars($staffMember['id']) . '">';      
        echo '<div class="overlay">';
        echo '<h6>' . htmlspecialchars($staffMember['description']) . '</h6>';
        echo '<p>' . htmlspecialchars($staffMember['name']) . '</p>';
        echo '<p>' . htmlspecialchars($staffMember['email']) . '</p>';
        echo '</div>';
        echo '</article>';       
    }
    ?>
    </div>
</section>

<!-- Reviews Section -->
<section id="reviews">
    <h2>Reviews</h2>
    <div>
    <?php
    // Display each review with star rating, title, and content
    foreach ($reviews as $review) {
        echo '<article>';     
        for ($i = 0; $i < $review['stars']; $i++) {
            echo '<span class="star full">★</span>';   
        }
        for ($i = 0; $i < 5 - $review['stars']; $i++) {
            echo '<span class="star blank">★</span>';   
        }
        echo '<h5>' . htmlspecialchars($review['title']) . '</h5>';
        echo '<p>' . htmlspecialchars($review['content']) . '</p>';
        echo '</article>'; 
    }
    ?>      
    </div>
</section>

<!-- Include the bottom part of the webpage -->
<?php include 'partials/bottom.php'; ?>
