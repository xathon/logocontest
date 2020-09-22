<?php


// Legen Sie die Datei in xampp/htdocs/ ab und öffnen Sie mit dem Browser localhost:8080/Uploader.php
// Ändern Sie die Zeile 12 auf Ihre Zugangsdaten und Datenbank ab.

// wenn es Sie interessiert, wie das $_FILES Array aussieht, kommentieren Sie die folgende Zeile aus
// echo "<pre>".print_r($_FILES,1)."</pre>";

if (count($_FILES) > 0) {
    $f = array_pop($_FILES);
    $content = file_get_contents($f['tmp_name']); // bitte nicht ändern
    require __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::create(__DIR__, '.env');
    $dotenv->load();
    $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS', 'DB_PORT']);

    $remote = mysqli_connect(getenv('DB_HOST'),
        getenv('DB_USER'),
        getenv('DB_PASS'),
        getenv('DB_NAME'));
    if (mysqli_connect_errno()) {
        printf("Couldn't connect to database! %s\n", mysqli_connect_error());
        exit();
    }
    $maxDimW = 500;
    $maxDimH = 500;
    list($width, $height, $type, $attr) = getimagesize( $f['tmp_name'] );
    if ( $width > $maxDimW || $height > $maxDimH ) {
        $message = "Image too big! Max size 500*500";
    } else {
        $query =
            "INSERT INTO logocontest.logos (`name`, `logo`) " .
            "VALUES ('" . $_POST['name'] . "','" . base64_encode($content) . "');";


        // (Debug):
        echo "
    <p>The query was:</p>
    <pre>$query</pre>";

        $result = mysqli_query($remote, $query);
        if ($result == 1)
            $message = "Upload successful.";
        else
            $message = "Upload not successful.";
    }


} else {
    $message = "Choose a picture to upload.";
}


mysqli_close($remote);
?>
<html>
<head><title>Upload</title>
    <style>body>div{margin:20% auto; width: 50%;</style>
</head>
<body>
<div>
    <form enctype="multipart/form-data" action="#" method="post">
        <fieldset>
            <legend><?php echo $message; ?></legend>
            <div>
                <label for="bild">Choose an image</label>
                <input type="file" accept="image/*" required name="image" id="image">
                <label for="titel">Name</label>
                <input type="text" name="name" id="name">

            </div>
            <div>
                <input type="submit" value="Upload">
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>
