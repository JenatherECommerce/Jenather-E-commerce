<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include your database connection
include('connect.php'); 

if (isset($_POST['signIn'])) {
    // Get the input from the login form
    $username = trim($_POST['username']);
    $password = $_POST['password']; 

    // Check if the connection is properly initialized
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM admin WHERE username = ?"); // Change INSERT to SELECT
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the admin username exists in the database
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION["username"] = $username;
            header("Location: registration_form.php"); // Redirect to registration_form.php
            exit();
        } else {
            echo 'Incorrect username or password.';
        }
    } else {
        echo 'User not found.';
    }

    // Close the statement
    $stmt->close();
}

// Close the connection only at the end
$conn->close();
?>
