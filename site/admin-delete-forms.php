
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
?>

<h2> Delete Staff </h2>

 <form method="post" action="delete-staff.php">

 <label>Staff Member</label>
    <select name="id" required>
<?php
    foreach($staff as $staffmem) {
    echo    '<option value="' . $staffmem['id'] . '">' . $staffmem['Name'] . '</option>';
}?>
    </select>

    <input id='delete' type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>


<h2> Delete Service </h2>

 <form method="post" action="delete-service.php">

 <label>Service</label>
    <select name="id" required>
<?php
    foreach($services as $service) {
    echo    '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
}?>
    </select>

    <input id='delete' type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>


<h2> Delete Review </h2>

 <form method="post" action="delete-review.php">

 <label>Review Title</label>
    <select name="id" required>
<?php
    foreach($reviews as $review) {
    echo    '<option value="' . $review['id'] . '">' . $review['title'] . '</option>';
}?>
    </select>

    <input id='delete' type="submit" value="Delete" onClick="return confirm('Are you sure?');">
</form>

<?php 

include 'partials/bottom.php'; 
?>