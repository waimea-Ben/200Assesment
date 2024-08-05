<?php require 'lib/utils.php'; 
include 'partials/top.php';
// Connect to the database 
$db = connectToDB(); 

// Setup a query to get all company info 
$query = 'SELECT * FROM services ORDER BY name ASC';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $services = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), ERROR);
    die();
}

$query = 'SELECT id, `name`, email, description FROM staff ORDER BY `name` ASC';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $staff = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), ERROR);
    die();
}
consoleLog($staff);

$query = 'SELECT * FROM Reviews';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $reviews = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), ERROR);
    die();
}

?>

    <div id="hero_image">
        <div id="hero_text">
            <h1>Geosolutions</h1>
        </div>
    </div>
    
    <section id="about">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet consectetur. Leo quam bibendum sem mattis egestas ultrices id fermentum. Pellentesque faucibus urna scelerisque ultricies faucibus tristique vitae nullam. Augue nisi nunc lobortis nisl tellus. Non egestas dolor vestibulum egestas aliquam facilisi vitae.</p>
    </section>

    <section id="contact">
        <h2>Contact us</h2>
        <p>1282 address bla bla, Email email, phone</p>
        <a href="booking-form.php">Book A Consultation</a>
    </section>

    <section id="Services">
        <h2>Services</h2>
<?php
        foreach($services as $service) {
    echo    '<ul>';         
    echo    '<li><a href="service-info.php?id=' . $service['id'] . '">' . $service['name'] . '</a></li>';
    echo    '</ul>';       
}
?>
    </section>

    <section id="staff">
        <h2>Our Staff</h2>
        <div class="all-staff">
<?php
        foreach($staff as $staffMember) {
    echo    '<article>';

    echo        '<img src="load-staff-image.php?id=' . $staffMember['id'] . '">';      
    echo        '<div class="overlay">';
    echo            '<h6>' . $staffMember['description'] . '</h6>';
    echo            '<p>' . $staffMember['name'] . '</p>';
    echo            '<p>' . $staffMember['email'] . '</p>';
    echo        '</div>';

    echo    '</article>';       
}
?>
        </div>
    </section>

    <section id="reviews">
        <h2>Reviews</h2>
        <div>
<?php
        foreach($reviews as $review) {
    echo    '<article>';     
    for($i = 0; $i < $review['stars']; $i++){
        echo    '<span class="star full">★</span>';   
    }
    for($i = 0; $i < 5-$review['stars']; $i++){
        echo    '<span class="star blank">★</span>';   
    }
    echo    '<h5>' . $review['title'] . '</h5>';
    echo    '<p>' . $review['content'] . '</p>';
    echo    '</article>'; 

}
?>      </div>
    </section>


<?php include 'partials/bottom.php'; ?>