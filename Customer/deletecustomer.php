<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurantdb";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$deletedCustomerFirstName = "";
$deletedCustomerLastName = "";


if (isset($_GET['id'])) {
    $customerId = $_GET['id'];

    
    $fetchSql = "SELECT fname, lname FROM tbl_customer WHERE id = $customerId";
    $fetchResult = $conn->query($fetchSql);

    if ($fetchResult->num_rows > 0) {
        $row = $fetchResult->fetch_assoc();
        $deletedCustomerFirstName = $row['fname'];
        $deletedCustomerLastName = $row['lname'];
    }


    $deleteSql = "DELETE FROM tbl_customer WHERE id = $customerId";

    if ($conn->query($deleteSql) === TRUE) {
     
    } else {
        echo "Error deleting customer: " . $conn->error;
    }
} 


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Deleted</title>
    <link rel="stylesheet" href="../css/product.css">
</head>
<body>
    <h1>Customer Deleted Successfully</h1>
    <p>Deleted Customer Information:</p>
    <p>First Name: <?php echo $deletedCustomerFirstName; ?></p>
    <p>Last Name: <?php echo $deletedCustomerLastName; ?></p>

    
    <button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
