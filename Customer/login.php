<?php
include_once 'db.php';

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

  
    if (empty($uname) || empty($pass)) {
        echo 'Username and password are required.';
    } else {
        $sql = "SELECT id, uname, pass FROM tbl_customer WHERE uname = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $uname);
        $stmt->execute();
        $stmt->bind_result($user_id, $db_uname, $db_pass);

        if ($stmt->fetch() && password_verify($pass, $db_pass)) {
         
            $_SESSION['user_id'] = $user_id;
            $_SESSION['uname'] = $db_uname;

            header('Location: welcom.php');
            exit();
        } else {
            echo 'Invalid username or password.';
        }

        
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./cstyle.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="uname">Username:</label>
            <input type="text" name="uname" required><br>

            <label for="pass">Password:</label>
            <input type="password" name="pass" required><br>

            <input type="submit" value="Submit">
        </form>
        <p>Not have an account? <a href="signup.php">Sign Up Here</a></p>
    </div>
</body>
</html>
