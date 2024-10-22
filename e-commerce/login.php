<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('connect.php'); 

if (isset($_POST['signIn'])) {
    $username = trim($_POST['username']);
    $password = ($_POST['password']); 


    $sql = "SELECT password FROM customer_credentials WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo 'Incorrect username or password';
        }
    } else {
        $sql = "SELECT password FROM admin WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            if (password_verify($password, $hashed_password)) {
                session_start();
                $_SESSION["username"] = $username;
                header("Location: adminHome.php");
                exit();
            } else {
                echo 'Incorrect username or password';
            }
        } else {
            echo 'User not found';
        }
    }

    $stmt->close();
    $conn->close();
}
?>
