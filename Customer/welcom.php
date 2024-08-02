<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo $customer['fname']; ?></title>
    <link rel="stylesheet" href="./cstyle.css"> 
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 28px;
        }

        .menu-section,
        .service-section,
        .feedback-section {
            margin-top: 30px;
            border-top: 2px solid #eee;
            padding-top: 20px;
        }

        h2 {
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
            color: #3498db;
            font-size: 24px;
        }

        a {
            text-decoration: none;
            color: #3498db;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #2074a0;
        }

        p {
            text-align: center;
            margin-top: 30px;
        }

        @media only screen and (max-width: 600px) {
            h1 {
                font-size: 24px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to The Outer Clove Restaurant</h1>

        <div class="menu-section">
            <h2><a href="Menu.php">Menus</a></h2>
         
        </div>

        <div class="service-section">
            <h2><a href="service.php">Service</a></h2>
          
        </div>

        <div class="feedback-section">
            <h2><a href="feedback.php">Feedback</a></h2>
            
        </div>

        <p><a href="logout.php">Logout</a></p> 
    </div>
</body>
</html>
