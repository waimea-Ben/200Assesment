
<?php 
require 'lib/utils.php';
include 'partials/top.php'; 

$db = connectToDB();

$query = 'SELECT * 
          FROM services';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $services = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List fetch', ERROR);
    die('there was an error getting data from the database');
}
//////////////////////////////////////////////////////////////////////////////

$query = 'SELECT * 
          FROM staff';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $staff = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List fetch', ERROR);
    die('there was an error getting data from the database');
}

//////////////////////////////////////////////////////////////////////////////

$query = 'SELECT * 
          FROM Reviews';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $reviews = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List fetch', ERROR);
    die('there was an error getting data from the database');
}
//////////////////////////////////////////////////////////////////////////////

$query = 'SELECT `service`, id, alt FROM service_images';

try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $service_images = $stmt->fetchall();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), ERROR);
    die();
}
////////////////////////////////////////////////////////////////////////////////////
?>

<h2> Delete Staff </h2>

 <form method="post" action="delete-staff.php">

 <label>Staff Member</label>
    <select name="id" >
<?php
    foreach($staff as $staffmem) {
    echo    '<option value="' . $staffmem['id'] . '">' . $staffmem['Name'] . '</option>';
}?>
    </select>

    <input type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>


<h2> Delete Service </h2>

 <form method="post" action="delete-service.php">

 <label>Service</label>
    <select name="id" >
<?php
    foreach($services as $service) {
    echo    '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
}?>
    </select>

    <input type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>



<h2> Delete Service example </h2>

 <form method="post" action="delete-service-example.php">

 <label>Example</label>
    <select name="id" >
<?php
    foreach($service_images as $service_ex) {
    echo    '<option value=' . $service_ex['id'] . '>' . $service_ex['id'] . '. ' . $service_ex['alt'] . '</option>';
}?>
    </select>

    <input type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>



<h2> Delete Review </h2>

 <form method="post" action="delete-review.php">

 <label>Review Title</label>
    <select name="id" >
<?php
    foreach($reviews as $review) {
    echo    '<option value="' . $review['id'] . '">' . $review['title'] . '</option>';
}?>
    </select>

    <input type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>


<?php 

include 'partials/bottom.php'; 
?>