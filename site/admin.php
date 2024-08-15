<?php 
// Include utility functions and top part of the webpage
require 'lib/utils.php';
include 'partials/top.php'; 

// Connect to the database
$db = connectToDB();

// Query to fetch booking information along with the corresponding service name
$query = 'SELECT bookings.name    AS bname,
                 bookings.email   AS bemail,
                 bookings.phone   AS bphone,
                 bookings.date    AS bdate,
                 bookings.address AS baddress,
                 bookings.service AS bservice,
                 bookings.id      AS bid,
                 services.name    AS sname
FROM bookings 
JOIN services ON bookings.service = services.id';

try {
    // Prepare and execute the query
    $stmt = $db->prepare($query);
    $stmt->execute();
    // Fetch all results
    $bookings = $stmt->fetchAll();
} catch (PDOException $e) {
    // Log error and display a user-friendly message
    consoleLog($e->getMessage(), 'DB List fetch', ERROR);
    die('There was an error getting data from the database');
}
?>

<br>

<!-- Bookings Section -->
<section id="bookings">
    <h2>Consultations</h2>
    <?php
    // Iterate through each booking and display details
    foreach ($bookings as $booking) {  
        echo '<details>';
        echo '<summary>' . htmlspecialchars($booking['bname']) . '</summary>';
        echo '<p>' . htmlspecialchars($booking['baddress']) . '</p>';
        echo '<p>' . htmlspecialchars($booking['bphone']) . '</p>';
        echo '<p>' . htmlspecialchars($booking['bdate']) . '</p>';
        echo '<div id="siteplan">'; 
        echo '<img alt="Siteplan" src="load-siteplan-image.php?id=' . htmlspecialchars($booking['bid']) . '">';
        echo '</div>'; 
        echo '<a href="delete-booking.php?id=' . htmlspecialchars($booking['bid']) . '" class="confirmation">🗑️</a>';
        echo '</details>';       
    }
    ?>

    <!-- JavaScript for confirmation dialog before deletion -->
    <script type="text/javascript">
        document.querySelectorAll('.confirmation').forEach(function(elem) {
            elem.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to delete this booking?')) {
                    e.preventDefault();
                }
            });
        });
    </script>

    <!-- Links to other admin functionalities -->
    <a href="admin-forms.php">New</a>
    <a href="admin-delete-forms.php">Delete</a>
    <a href="logout.php">Log Out</a> <!-- Updated logout link -->
</section>

<!-- Include the bottom part of the webpage -->
<?php 
include 'partials/bottom.php'; 
?>
