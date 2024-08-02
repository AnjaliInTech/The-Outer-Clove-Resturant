<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <link rel="stylesheet" href="../css/product.css">
   
</head>
<body>
    <h2>Product Search</h2>

    <form action="search.php" method="post">
        <label for="search">Search Product:</label>
        <input type="text" name="search" id="search" required>
        <input type="submit" value="Search">
    </form>

    <?php
   
    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbname = "restaurantdb";

    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbname);

   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $searchTerm = mysqli_real_escape_string($conn, $_POST['search']);

        
        $query = "SELECT id, productName, productImage, description FROM products WHERE productName LIKE '%$searchTerm%'";
        $result = mysqli_query($conn, $query);

       
        if ($result) {
           
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>";
                echo "ID: " . $row['id'] . "<br>";
                echo "Name: " . $row['productName'] . "<br>";
                echo "Description: " . $row['description'] . "<br>";
              
                echo "</p>";
            }
        } else {
           
            echo "Error executing query: " . mysqli_error($conn);
        }
    }

   
    mysqli_close($conn);
    ?>
</body>
</html>
