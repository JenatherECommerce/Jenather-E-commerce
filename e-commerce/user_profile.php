<?php
session_start();
include("connect.php"); // Database connection

if (!isset($_SESSION["username"])) {
   
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];


$query = "SELECT firstname, lastname, email, street, city, region, country 
          FROM customer_credentials 
          JOIN customer_address 
          ON customer_credentials.customer_address_id = customer_address.customer_address_id 
          WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
   
    echo "Error: User details not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/dashboard.css">
  <title>Profile Page</title>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
        <a href="index.php"><img src="./images/profile_svg/left-arrow-back-svgrepo-com.svg" alt="back-icon" class="back-icon"></a>
        <a href="user_profile.php"><img src="./images/profile_svg/home-icon-silhouette-svgrepo-com.svg" alt="home icon" class="home-icon"></a>
        <a href="purchase-info.php"><img src="./images/profile_svg/car-svgrepo-com.svg" alt="cart icon" class="cart-icon"></a>
        <a onclick="location.href='logout.php'"><img src="./images/profile_svg/log-out-svgrepo-com.svg" alt="logout icon" class="logout-icon"></a>
    </aside>
    <main class="profile">
      <div class="profile-header">
        <div class="profile-picture">
          <img src="./images/profile_svg/user-svgrepo-com (1).svg" alt="Profile Picture">
        </div>
        <h2 class="profile-name"><?php echo htmlspecialchars($user['firstname'] . " " . $user['lastname']); ?></h2>
      </div>
      <div class="profile-info">
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Address:</strong> 
          <?php 
          echo htmlspecialchars($user['street'] . ", " . $user['city'] . ", " . $user['region'] . ", " . $user['country']); 
          ?>
        </p>
      </div>
    </main>
  </div>
</body>
</html>