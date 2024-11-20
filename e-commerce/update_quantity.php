<?php
// Include database connection
include("connect.php"); 
if (isset($_POST['product_id']) && isset($_POST['new_quantity'])) {
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['new_quantity'];

  
    if (!$conn) {
        die("Database connection failed.");
    }

    $query = "UPDATE Products SET product_quantity = ? WHERE product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $new_quantity, $product_id); 

    if ($stmt->execute()) {
     
        header("Location: Inventory.php?brand=" . $_GET['brand']);
        exit();
    } else {
        echo "Error updating quantity.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No product ID or quantity provided.";
}
?>
