<?php
// Include database connection
include("connect.php"); // Update the path if needed

// Check if the product_id is passed through POST
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Check if $conn is defined and working
    if (!$conn) {
        die("Database connection failed.");
    }

    // Prepare and execute the delete query
    $query = "DELETE FROM Products WHERE product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id); // 'i' is for integer (product_id)
    
    if ($stmt->execute()) {
        // Redirect back to the product listing page
        header("Location: Inventory.php?brand=" . $_GET['brand']);
        exit();
    } else {
        echo "Error deleting product.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No product ID provided.";
}
?>
