<?php
session_start();
include("connect.php");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    $_SESSION['purchase_message'] = "You must log in to make a purchase.";
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = $_SESSION['customer_id']; // Get customer ID from session
    $product_id = $_POST['product_id']; // Get product ID from the form

    // Validate product ID
    if (empty($product_id)) {
        $_SESSION['purchase_message'] = "Invalid product.";
        header("Location: index.php");
        exit;
    }

    // Start transaction
    $conn->begin_transaction();

    try {
        // Insert purchase into database
        $sql = "INSERT INTO customer_purchase (product_id, customer_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $product_id, $customer_id);
        
        if (!$stmt->execute()) {
            throw new Exception("Failed to record purchase.");
        }

        $stmt->close();

        // Decrement product quantity
        $updateSql = "UPDATE products SET product_quantity = product_quantity - 1 WHERE product_id = ? AND product_quantity > 0";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("i", $product_id);

        if (!$updateStmt->execute() || $updateStmt->affected_rows === 0) {
            throw new Exception("Failed to update product quantity. Either product does not exist or is out of stock.");
        }

        $updateStmt->close();

        // Commit transaction
        $conn->commit();

        $_SESSION['purchase_message'] = "Purchase successful!";
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        $_SESSION['purchase_message'] = $e->getMessage();
    }

    $conn->close();
    header("Location: honda.php");
    exit;
}
?>