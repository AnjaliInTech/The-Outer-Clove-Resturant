<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo $customer['fname']; ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            margin: 20px;
        }

        .section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 15px;
            flex: 1;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        h2 {
            margin-bottom: 15px;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome! Admin</h1>
    </header>

    <div class="container">
        <div class="section menu-section">
            <h2><a href="../Product/addproduct.php">Manage Product</a></h2>
            
        </div>

        <div class="section service-section">
            <h2><a href="../Admin/manageservice.php">Manage Service</a></h2>
          
        </div>

        <div class="section Customer-section">
            <h2><a href="../Customer/managecustomer.php">Manage Customer</a></h2>
          
        </div>

        <div class="section Gallery-section">
            <h2><a href="../Gallery/add_gallery.php">Manage Gallery</a></h2>
           
        </div>
    </div>
</body>
</html>
