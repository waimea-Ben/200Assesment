
<?php 
require 'lib/utils.php';
include 'partials/top.php'; 
?>

<h1> Add a Review </h1>

 <form method="post" action="add-review.php">

    <label>Title</label>
    <input type="text" 
           name="title"  
           required>

    <label>Content</label>
    <input type="text" 
           name="content" >

    <div class="rate">
        <input type="radio" id="star5" name="rate" value="5" />
        <label for="star5" title="text">5 stars</label>
        <input type="radio" id="star4" name="rate" value="4" />
        <label for="star4" title="text">4 stars</label>
        <input type="radio" id="star3" name="rate" value="3" />
        <label for="star3" title="text">3 stars</label>
        <input type="radio" id="star2" name="rate" value="2" />
        <label for="star2" title="text">2 stars</label>
        <input type="radio" id="star1" name="rate" value="1" />
        <label for="star1" title="text">1 star</label>
    </div>

    <input id='add' type="submit" value="Add">
</form>




<?php 

include 'partials/bottom.php'; 
?>