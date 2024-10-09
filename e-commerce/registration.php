<?php
include('connect.php');

if (isset($_POST['signUp'])) {

    $username = trim($_POST['username']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $birthdate = $_POST['date'];
    $gender = $_POST['gender'];
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $postal = trim($_POST['postal']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $region = trim($_POST['region']);
    $country = trim($_POST['country']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $insertCredentialsQuery = 'INSERT INTO customer_credentials (username, firstname, lastname, birthdate, gender, email, password)
                    VALUES (?, ?, ?, ?, ?, ?, ?)';

    $stmt = $conn->prepare($insertCredentialsQuery);
    if (!$stmt) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param('sssssss', $username, $firstname, $lastname, $birthdate, $gender, $email, $hashed_password);

    if ($stmt->execute()) {
     
        $customer_id = $conn->insert_id;


        $insertAddressQuery = 'INSERT INTO customer_address (customer_id, postal, address, city, region, country)
                        VALUES (?, ?, ?, ?, ?, ?)';

        $stmtAddress = $conn->prepare($insertAddressQuery);
        if (!$stmtAddress) {
            die('Prepare failed (address insert): ' . htmlspecialchars($conn->error));
        }

        $stmtAddress->bind_param('isssss', $customer_id, $postal, $address, $city, $region, $country);

        if ($stmtAddress->execute()) {
            header("Location: log_in.php");
            exit();
        } else {
            echo 'Error inserting address: ' . htmlspecialchars($stmtAddress->error);
        }

        $stmtAddress->close();
    } else {
        echo 'Error inserting customer credentials: ' . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
