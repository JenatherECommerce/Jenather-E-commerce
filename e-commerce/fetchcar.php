<?php
// Include database connection
include("connect.php"); // Update the path if needed

// Get the brand from the request
$brand = $_GET['brand'] ?? '';

// Check if $conn is defined and working
if (!$conn) {
    die("Database connection failed.");
}

// Prepare and execute the query
$query = "SELECT * FROM Products WHERE product_brand = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $brand);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the car data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="car-card">
            <img src="Products/<?php echo htmlspecialchars($row['product_img']); ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>" class="car-image">
            <h2 class="car-name"><?php echo htmlspecialchars($row['product_name']); ?></h2>
            <p class="car-details">Price: <?php echo htmlspecialchars($row['product_price']); ?></p>
            <p class="car-details">Quantity: <?php echo htmlspecialchars($row['product_quantity']); ?></p>
            <div class="button-group">
                <!-- Update Button - Form for Quantity -->
                <form action="update_quantity.php" method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                    <input type="number" name="new_quantity" value="<?php echo $row['product_quantity']; ?>" min="0" required>
                    <button type="submit" class="btn update">Update Quantity</button>
                </form>

                <!-- Delete Button -->
                <form action="delete_product.php" method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                    <button type="submit" class="btn delete">Delete</button>
                </form>
            </div>
        </div>
        <?php
    }
} else {
    echo '<p>No cars found for this brand.</p>';
}

$stmt->close();
$conn->close();
?>
