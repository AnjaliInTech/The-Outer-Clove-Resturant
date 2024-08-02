<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="../css/product.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h2>View Products</h2>
    <?php
    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbname = "restaurantdb";

    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbname);

   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $query = "SELECT id, productName, productImage, description FROM products";
    $result = mysqli_query($conn, $query);

    
    if ($result) {
       
        echo "<table class='table'>";
        echo "<tr><th>ID</th><th>Name</th><th>Image</th><th>Description</th><th>Delete</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['productName'] . "</td>";
            echo "<td><img src='" . $row['productImage'] . "' alt='Product Image' width='100'></td>";
            echo "<td>" . $row['description'] . "</td>";
            
           
            echo "<td><a class='btn btn-danger' href='deleteproduct.php?id=" . $row['id'] . "'>Delete</a></td>";

            echo "</tr>";
        }
        echo "</table>";
    } else {
       
        echo "Error executing query: " . mysqli_error($conn);
    }

   
    mysqli_close($conn);
    ?>
</body>
</html>
