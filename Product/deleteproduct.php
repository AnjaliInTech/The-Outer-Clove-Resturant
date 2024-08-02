<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbname = "restaurantdb";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$product = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $productId = $_GET['id'];

   
    $query = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Error retrieving product details: " . mysqli_error($conn);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $productId = $_POST['id'];

  
    $deleteQuery = "DELETE FROM products WHERE id=$productId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo "Product deleted successfully.";

      
        header("Location: viewproduct.php");
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="stylesheet" href="../css/product.css">
</head>
<body>
    <h2>Delete Product</h2>
    <form action="deleteproduct.php" method="post">
        <input type="hidden" name="id" value="<?php echo $product['id'] ?? ''; ?>">

        <p>Are you sure you want to delete this product?</p>
        <p>Name: <?php echo $product['productName'] ?? ''; ?></p>
        <p>Description: <?php echo $product['description'] ?? ''; ?></p>

        <input type="submit" name="delete" value="Delete Product">
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>
