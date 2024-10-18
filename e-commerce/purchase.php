<?php
session_start();
include('connect.php');

if (isset($_SESSION['username']) && isset($_SESSION['product_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $product_id = $_SESSION['product_id'];

    $sql = "INSERT INTO user_purchases (customer_id, product_id) VALUES ('$customer_id', '$product_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Purchase successfully recorded";
        exit();
    } else {
        echo "ERROR: " . $conn->error;
    }
} else {
    echo "You must be logged in to make a purchase.";
    header("Location: log_in.php");
}
?>