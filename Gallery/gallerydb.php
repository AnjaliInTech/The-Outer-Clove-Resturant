<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbname = "restaurantdb";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbname);

if (!$conn) {
    die("Something went wrong: " . mysqli_connect_error());
}


$tableCreationQuery = "CREATE TABLE IF NOT EXISTS gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gallerytitle VARCHAR(255) NOT NULL,
    galleryname VARCHAR(255) NOT NULL,
    galleryimage VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $tableCreationQuery)) {
  
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (isset($_POST["gallerytitle"], $_POST["galleryname"], $_FILES["galleryimage"])) {
        $gallerytitle = $_POST["gallerytitle"];
        $galleryname = $_POST["galleryname"];

        
        $targetDirectory = "upload/";
        $timestamp = time();
        $targetFile = $targetDirectory . $timestamp . "_" . basename($_FILES["galleryimage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

      
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["galleryimage"]["tmp_name"]);
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
            if (move_uploaded_file($_FILES["galleryimage"]["tmp_name"], $targetFile)) {
                
               
                $sql = "INSERT INTO gallery (gallerytitle, galleryname, galleryimage) VALUES ('$gallerytitle', '$galleryname', '$targetFile')";
                if (mysqli_query($conn, $sql)) {
                  
                    header("Location: viewgallery.php");
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
