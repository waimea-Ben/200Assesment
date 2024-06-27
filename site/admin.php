
<?php 
require 'lib/utils.php';
include 'partials/top.php'; 

$db = connectToDB();

$query = 'SELECT bookings.name    AS bname,
                 bookings.email   AS bemail,
                 bookings.phone   AS bphone,
                 bookings.date    AS bdate,
                 bookings.address AS baddress,
                 bookings.service AS bservice,
                 bookings.id      AS bid,
                 services.name    AS sname
                 
FROM bookings JOIN services ON bookings.service = services.id';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $bookings = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List fetch', ERROR);
    die('there was an error getting data from the database');
}

consolelog($bookings);
?>

<h1> consultations </h1>
<section id="bookings">
<?php
        foreach($bookings as $booking) {  
    echo    '<details>';
    echo    '<summary>' . $booking['bname'] . '<a href="delete-booking.php?id=' . $booking['bid'] . '">🗑️</a></summary>';
    echo    '<p>' .       $booking['baddress']    . '</p>';
    echo    '<p>' .       $booking['bphone']      . '</p>';
    echo    '<p>' .       $booking['bdate']       . '</p>';
    echo    '<p>' .       $booking['sname']       . '</p>';
    echo    '</details>';       
}
?>
<section></section>


<?php 

include 'partials/bottom.php'; 
?>