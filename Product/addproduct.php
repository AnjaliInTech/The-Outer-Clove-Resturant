<?php
 include("add_productdb.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/product.css">
</head>
<body>
    <h2>Add Product</h2>
    <form action="add_productdb.php" method="post" enctype="multipart/form-data">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required><br>

        <label for="productImage">Product Image:</label>
        <input type="file" id="productImage" name="productImage" accept="image/*" required><br>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br>

        <input type="submit" value="Add Product">
        
    </form>
</body>
</html> 