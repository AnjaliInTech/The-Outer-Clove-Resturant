<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="./cstyle.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 80px;
            height: auto;
        }

        td a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        td a:hover {
            background-color: #2980b9;
        }
    </style>
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
        
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Image</th><th>Description</th><th>Action</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['productName'] . "</td>";
            
            echo "<td><img src='" . $row['productImage'] . "' alt='Product Image'></td>";
            echo "<td>" . $row['description'] . "</td>";

            echo "<td><a href='Order.php?product_id=" . $row['id'] . "'>Order Now</a></td>";

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

