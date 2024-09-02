<?php
include('connect.php');

if (isset($_POST['signUp'])) {

    $username = trim($_POST['username']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $birthdate = $_POST['date'];
    $gender = $_POST['gender'];
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insertQuery = 'INSERT INTO customer_credentials (username, firstname, lastname, birthdate, gender, address, email, password)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

    $stmt = $conn->prepare($insertQuery);
    if (!$stmt) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param('ssssssss', $username, $firstname, $lastname, $birthdate, $gender, $address, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: log_in.php");
        exit();
    } else {
        echo 'Error: ' . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
