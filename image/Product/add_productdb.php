<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbname = "restaurantdb";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbname);

if (!$conn) {
    die("Something went wrong: " . mysqli_connect_error());
}


$tableCreationQuery = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    productImage VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
)";

if (mysqli_query($conn, $tableCreationQuery)) {

} else {
    echo "Error creating table: " . mysqli_error($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["productName"], $_POST["description"], $_FILES["productImage"])) {
        $productName = $_POST["productName"];
        $description = $_POST["description"];

        
        $targetDirectory = "uploads/";
        $timestamp = time();
        $targetFile = $targetDirectory . $timestamp . "_" . basename($_FILES["productImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

       
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["productImage"]["tmp_name"]);
            if ($check !== false) {
                
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

       
        if (file_exists($targetFile)) {
            echo "Sorry, a file with the same name already exists.";
            $uploadOk = 0;
        }


      
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        
        } else {
            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
               
            
                $sql = "INSERT INTO products (productName, productImage, description) VALUES ('$productName', '$targetFile', '$description')";
                if (mysqli_query($conn, $sql)) {
                    
                    header("Location: viewproduct.php");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Invalid form data.";
    }
}

mysqli_close($conn);
?>
