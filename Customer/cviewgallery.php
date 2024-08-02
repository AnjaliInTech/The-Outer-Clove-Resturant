<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="../css/product.css">
    <style>
        body {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            justify-content: space-around;
        }

        .product-box {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
        }

        .product-box img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }

        h2 {
            text-align: center;
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <h2>View Gallery</h2>
    <?php
    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbname = "restaurantdb";

    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbname);

   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   
    $query = "SELECT id, gallerytitle, galleryname, galleryimage FROM gallery";
    $result = mysqli_query($conn, $query);


    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product-box'>";
            echo "<p>ID: " . $row['id'] . "</p>";
            echo "<p>Title: " . $row['gallerytitle'] . "</p>";
            echo "<p>Name: " . $row['galleryname'] . "</p>";
            echo "<img src='" . $row['galleryimage'] . "' alt='Product Image'>";
            echo "</div>";
        }
    } else {
     
        echo "Error executing query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>
</body>
</html>
