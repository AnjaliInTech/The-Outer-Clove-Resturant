<?php
include_once 'db.php';

$fname = $lname = $cnum = $email = $uname = $pass = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cnum = $_POST['cnum'];
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

  
    if (empty($fname) || empty($lname) || empty($cnum) || empty($email) || empty($uname) || empty($pass)) {
        echo 'All fields are required.';
    } else {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

      
        $sql = "INSERT INTO tbl_customer (fname, lname, cnum, email, uname, pass) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssss', $fname, $lname, $cnum, $email, $uname, $hashed_pass);

        if ($stmt->execute()) {
          
            $user_id = $stmt->insert_id;
            
            session_start();
            $_SESSION['user_id'] = $user_id;

          
            header('Location: welcom.php');
            exit();
        } else {
            echo 'Error in signup. Please try again.';
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./cstyle.css">
</head>
<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <form action="signup.php" method="post">
            <label for="fname">First Name:</label>
            <input type="text" name="fname" required><br>

            <label for="lname">Last Name:</label>
            <input type="text" name="lname" required><br>

            <label for="cnum">Contact Number:</label>
            <input type="text" name="cnum" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="uname">Username:</label>
            <input type="text" name="uname" required><br>

            <label for="pass">Password:</label>
            <input type="password" name="pass" required><br>

            <input type="submit" value="Signup">
        </form>
        
        <p>Already have an account? <a href="login.php">Login Here</a></p>
    </div>
</body>
</html>
