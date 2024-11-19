<?php
session_start();
include("connect.php"); // Database connection

if (!isset($_SESSION["username"])) {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION["customer_id"]; // Get customer ID from session

// Fetch purchase details
$query = "SELECT p.product_name, p.product_price, cp.purchase_date 
          FROM customer_purchase cp
          JOIN products p ON cp.product_id = p.product_id
          WHERE cp.customer_id = ?
          ORDER BY cp.purchase_date DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

$purchases = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $purchases[] = $row;
    }
}
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/dashboard.css">
  <title>Purchase Information</title>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
        <a href="index.php"><img src="./images/profile_svg/left-arrow-back-svgrepo-com.svg" alt="back-icon" class="back-icon"></a>
        <a href="user_profile.php"><img src="./images/profile_svg/home-icon-silhouette-svgrepo-com.svg" alt="home icon" class="home-icon"></a>
        <a href="purchase-info.php"><img src="./images/profile_svg/car-svgrepo-com.svg" alt="cart icon" class="cart-icon"></a>
        <a onclick="location.href='logout.php'"><img src="./images/profile_svg/log-out-svgrepo-com.svg" alt="logout icon" class="logout-icon"></a>
    </aside>
    <main class="purchase-info">
      <h2>Your Purchases</h2>
      <?php if (!empty($purchases)) : ?>
        <table>
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Price</th>
              <th>Purchase Date</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($purchases as $purchase) : ?>
              <tr>
                <td><?php echo htmlspecialchars($purchase['product_name']); ?></td>
                <td><?php echo htmlspecialchars(number_format($purchase['product_price'], 2)); ?></td>
                <td><?php echo htmlspecialchars($purchase['purchase_date']); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else : ?>
        <p>You have not made any purchases yet.</p>
      <?php endif; ?>
    </main>
  </div>
</body>
</html>