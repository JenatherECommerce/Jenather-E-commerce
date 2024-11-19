<?php
session_start();
include("connect.php"); // Make sure you have your database connection

$isLoggedIn = isset($_SESSION["username"]);

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
        <a href="user_profile.php"><img src="./images/profile_svg/home-icon-silhouette-svgrepo-com.svg" alt="home icon" class="home-icon"></a>
        <a href="purchase.php"><img src="./images/profile_svg/car-svgrepo-com.svg" alt="cart icon" class="cart-icon"></a>
        <a onclick="location.href='logout.php'"><img src="./images/profile_svg/log-out-svgrepo-com.svg" alt="logout icon" class="logout-icon"></a>
    </aside>
    <main class="profile">
      <div class="profile-header">
        <div class="profile-picture">
          <img src="profile-picture.jpg" alt="Profile Picture">
        </div>
        <h2 class="profile-name">Johnny Weak</h2>
      </div>
      <div class="profile-info">
        <p><strong>Email:</strong> whatdaheil@gmail.com</p>
        <p><strong>Address:</strong> ahahahahaha st. bwahahahaha</p>
      </div>
    </main>
  </div>
</body>
</html>