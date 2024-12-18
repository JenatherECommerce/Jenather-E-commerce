<?php
session_start();
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

    // Check if username already exists
    $checkUsernameQuery = 'SELECT COUNT(*) FROM customer_credentials WHERE username = ?';
    $stmtCheck = $conn->prepare($checkUsernameQuery);
    if (!$stmtCheck) {
        die('Prepare failed (username check): ' . htmlspecialchars($conn->error));
    }

    $stmtCheck->bind_param('s', $username);
    $stmtCheck->execute();
    $stmtCheck->bind_result($usernameCount);
    $stmtCheck->fetch();
    $stmtCheck->close();

    if ($usernameCount > 0) {
        $_SESSION['error_message'] = "Username already exists. Please choose a different username.";
        header("Location: registration_form.php");
        exit();
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert address details into customer_address table first
        $insertAddressQuery = 'INSERT INTO customer_address (postal, street, city, region, country)
                               VALUES (?, ?, ?, ?, ?)';

        $stmtAddress = $conn->prepare($insertAddressQuery);
        if (!$stmtAddress) {
            die('Prepare failed (address insert): ' . htmlspecialchars($conn->error));
        }

        $stmtAddress->bind_param('sssss', $postal, $address, $city, $region, $country);

        if ($stmtAddress->execute()) {

            // Get the newly inserted customer_address_id
            $customer_address_id = $conn->insert_id;

            // Insert customer credentials, including the customer_address_id foreign key
            $insertCredentialsQuery = 'INSERT INTO customer_credentials (username, firstname, lastname, birthdate, gender, email, password, customer_address_id)
                                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

            $stmt = $conn->prepare($insertCredentialsQuery);
            if (!$stmt) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            $stmt->bind_param('sssssssi', $username, $firstname, $lastname, $birthdate, $gender, $email, $hashed_password, $customer_address_id);

            if ($stmt->execute()) {
                $_SESSION['success_message'] = 'Account created successfully.';
                header("Location: log_in.php");
                exit();
            } else {
                echo 'Error inserting customer credentials: ' . htmlspecialchars($stmt->error);
            }

            $stmt->close();
        } else {
            echo 'Error inserting address: ' . htmlspecialchars($stmtAddress->error);
        }

        $stmtAddress->close();
    }

    $conn->close();
}
?>