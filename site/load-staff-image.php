<?php
    //-----------------------------------------------------------------
    // Load image from DB, responding with the data and correct MIME type
    //-----------------------------------------------------------------

    require_once 'lib/utils.php';

    //--------------------------------------------------------------------------
    // ID of image should be in URL
    $id = $_GET['id'] ?? null;

    //--------------------------------------------------------------------------
    $db = connectToDB();

    // Get the image type and binary data
    $query = 'SELECT image_type, image_content FROM staff WHERE id=?';

    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $geosol = $stmt->fetch();

        // Failed to get an image back?
        if (!$geosol) throw new Exception();
    }
    catch (Exception $e) {
        // Failed, so 404
        http_response_code(404);
        die();
    }

    //--------------------------------------------------------------------------
    // Got here, so all went well. Pass back the image data as a response
    header('Content-type: ' . $geosol['image_type']);
    echo $geosol['image_content'];

?>