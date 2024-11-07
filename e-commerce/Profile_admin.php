<?php
include('dbconnection.php');

if (isset($_POST['signUp'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insertCredentialsQuery = 'INSERT INTO admin (admin_id, username, password)
                               VALUES (?, ?, ?)';
    
    $stmt = $conn->prepare($insertCredentialsQuery);
    
    if (!$stmt) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param('iss', $admin_id, $username, $hashed_password);
    
    if ($stmt->execute()) {
        header("Location: Profile.php");
        exit();
    } else {
        echo 'Error inserting admin credentials: ' . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
