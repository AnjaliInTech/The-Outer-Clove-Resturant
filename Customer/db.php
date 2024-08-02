<?php
 $hostName = "localhost";
 $dbUser = "root";
 $dbPassword = "";
 $dbName = "restaurantdb";

 $conn = mysqli_connect($hostName, $dbUser, $dbPassword,  $dbName);

 if(!$conn){
    die("Somthing went wrong;");
 }


?>