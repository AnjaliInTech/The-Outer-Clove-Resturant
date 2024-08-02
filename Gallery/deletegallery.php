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
    $galleryId = $_GET['id'];

  
    $query = "SELECT * FROM gallery WHERE id = $galleryId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Error retrieving gallery details: " . mysqli_error($conn);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $galleryId = $_POST['id'];

  
    $deleteQuery = "DELETE FROM gallery WHERE id=$galleryId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo "Gallery deleted successfully.";

       
        header("Location: viewgallery.php");
        exit(); 
    } else {
        echo "Error deleting gallery: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Gallery</title>
    <link rel="stylesheet" href="../css/product.css">
</head>
<body>
    <h2>Delete Gallery</h2>
    <form action="deletegallery.php" method="post">
        <input type="hidden" name="id" value="<?php echo $product['id'] ?? ''; ?>">

        <p>Are you sure you want to delete this Gallery?</p>
        <p>Title: <?php echo $product['gallerytitle'] ?? ''; ?></p>
        <p>Name: <?php echo $product['galleryname'] ?? ''; ?></p>

        <input type="submit" name="delete" value="Delete Gallery">
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>
