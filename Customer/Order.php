<?php
include_once 'db.php';


if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    
    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbname = "restaurantdb";

    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbname);

   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   
    $query = "SELECT id, productName, productImage, description FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
       
        $product = mysqli_fetch_assoc($result);
    } else {
       
        echo "Error executing query: " . mysqli_error($conn);
    }

    
    mysqli_close($conn);
} else {
   
    header("Location: Menu.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <link rel="stylesheet" href="../Customer/cstyle.css">
</head>
<body>
    <h2>Place Order for <?php echo $product['productName']; ?></h2>

    <form action="process_order.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

        <label for="category">Order Category:</label>
        <select name="category" id="category">
            <option value="Dining">Dining</option>
            <option value="Takeout">Takeout</option>
            <option value="Delivery">Delivery</option>
        </select>

        <br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required>

        <br>

        <input type="submit" value="Place Order">
    </form>
</body>
</html>
