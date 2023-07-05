<?php

    include('dbconection.php');

    session_start();

    if (isset($_POST['username']) && isset($_POST['password'])) {
        if (empty($_POST['username'])) {
            echo "Username error";
        } else if (empty($_POST['password'])) {
            echo "Password error";
        } else {
            $username = $mysqli->real_escape_string($_POST['username']);
            $password = $mysqli->real_escape_string($_POST['password']);

            $sql_code = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $sql_query = $mysqli->query($sql_code) or die("Fail in the execution of SQL code" . $mysqli->error);

            $cont = $sql_query->num_rows;

            if ($cont == 1) {
                $user = $sql_query->fetch_assoc();

                if (!isset($_SESSION)) {
                    session_start();
                }
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];

                    header("Location: home.php");
                    
            } else {
                echo "Login fail!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Access Your Account</h1>
    <form action="index.php" method="POST">
        <p>
            <label>Username</label>
            <input type="text" name="username">
        </p>

        <p>
            <label>Password</label>
            <input type="password" name="password">
        </p>

        <p>
            <button type="submit">Login</button>
        </p>
    </form>

    <p>
        <a href="home.php">Home</a>
    </p>
</body>
</html>
