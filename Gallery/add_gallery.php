<?php
include("gallerydb.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gallery</title>
    <link rel="stylesheet" href="../css/product.css">
</head>
<body>
    <h2>Add Gallery</h2>
    <form action="gallerydb.php" method="post" enctype="multipart/form-data">
        <label for="gallerytitle">Gallery Title:</label>
        <input type="text" id="gallerytitle" name="gallerytitle" required><br>

        <label for="galleryname">Gallery Name:</label>
        <input type="text" id="galleryname" name="galleryname" required><br>

        <label for="galleryimage">Gallery Image:</label>
        <input type="file" id="galleryimage" name="galleryimage" accept="image/*" required><br>

        <input type="submit" value="Add Gallery">
        
    </form>
</body>
</html> 