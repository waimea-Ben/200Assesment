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
    $query = 'SELECT image_type, image_data FROM bookings WHERE id=?';

    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $siteplan = $stmt->fetch();

        // Failed to get an image back?
        if (!$siteplan) throw new Exception();
    }
    catch (Exception $e) {
        // Failed, so 404
        http_response_code(404);
        die();
    }

    //--------------------------------------------------------------------------
    // Got here, so all went well. Pass back the image data as a response
    header('Content-type: ' . $siteplan['image_type']);
    echo $siteplan['image_data'];

?>