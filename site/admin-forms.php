
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

consolelog($services);
?>

<h1> New Staff Member </h1>

 <form method="post" action="add-staff.php" enctype="multipart/form-data">

    <label>Name</label>
    <input type="text" 
           name="name"  
           required 
           placeholder="Enter their name">

    <label>Email</label>
    <input type="email" 
           name="email" 
           placeholder="Enter their email">

    <label>Description</label>
    <input type="text" 
           name="description" 
           required 
           placeholder="Enter a Description">

    <label>Image file</label>
    <input type="file" 
           name="image"
           accept="image/*" 
           required 
           placeholder="upload file">

    <input id='add' type="submit" value="Add">
</form>

<h1> New Service </h1>

 <form method="post" action="add-service.php" enctype="multipart/form-data">

    <label>service</label>
    <input type="text" 
           name="name"  
           required 
           placeholder="Enter the service name">

    <label>Description</label>
    <input type="text" 
           name="description" 
           required 
           placeholder="Enter a Description">

    <label>Main Image file</label>
    <input type="file" 
           name="image"
           accept="image/*" 
           required 
           placeholder="upload file">

    <input id='add' type="submit" value="Add">
</form>


<h1> New Service image example </h1>

 <form method="post" action="add-service-example.php" enctype="multipart/form-data">

 <label>Service</label>
    <select name="service" required>
<?php
    foreach($services as $service) {
    echo    '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
}?>
    </select>

    <label>Image Description</label>
    <input type="text" 
           name="alt" 
           placeholder="E.G. Tree">

    <label>Example image</label>
    <input type="file" 
           name="image"
           accept="image/*" 
           required 
           placeholder="upload file">

    <input id='add' type="submit" value="Add">
</form>


<?php 

include 'partials/bottom.php'; 
?>