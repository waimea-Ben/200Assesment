<?php 
// Include utility functions and top part of the webpage
require 'lib/utils.php';
include 'partials/top.php'; 
?>

<!-- Form to add a new review -->
<h1>Add a Review</h1>
<form method="post" action="add-review.php">

    <!-- Input field for the review title -->
    <label>Title</label>
    <input type="text" 
           name="title"  
           required>

    <!-- Input field for the review content -->
    <label>Content</label>
    <input type="text" 
           name="content" >

    <!-- Rating section with radio buttons for selecting star ratings -->
    <div class="rate">
        <input type="radio" id="star1" name="rate" value="5">
        <label for="star1" title="5 stars">5 stars</label>
        <input type="radio" id="star2" name="rate" value="4">
        <label for="star2" title="4 stars">4 stars</label>
        <input type="radio" id="star3" name="rate" value="3">
        <label for="star3" title="3 stars">3 stars</label>
        <input type="radio" id="star4" name="rate" value="2">
        <label for="star4" title="2 stars">2 stars</label>
        <input type="radio" id="star5" name="rate" value="1">
        <label for="star5" title="1 star">1 star</label>
    </div>

    <!-- Submit button for the form -->
    <input id="add" type="submit" value="Add">
</form>

<?php 
// Include the bottom part of the webpage
include 'partials/bottom.php'; 
?>
