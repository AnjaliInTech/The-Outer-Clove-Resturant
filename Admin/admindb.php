<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbname = "restaurantdb";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbname);

if (!$conn) {
    die("Something went wrong: " . mysqli_connect_error());
}
?>
