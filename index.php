<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <header>
        <div class="icon">
            <a href="#"><img src="./images/header_img/icon.png" alt="image here" height=40></a>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Promos</a></li>
                <li><a href="#">Financing</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
        <div class="actions">
            <input type="text" id="search" placeholder="Seach for cars...">
            <button onclick="searchCars()">Search</button>
            <button onclick="location.href='log_in.php'">Login</button>
            <button onclick="location.href='registration_form.php'">Sign Up</button>
        </div>
    </header>
    <div class="container">
        <img src="./images/header_img/logo.jpeg" alt="Jenather Logo" height="400">
        <h1>Ready To Have Your First Car?</h1>
    </div>
    <div class="buttons">
        <button class="main-btn">
            <span class="circle">
                <span class="arrow"></span>
            </span>
            <span class="text">Customize Your Own Car</span>
        </button>
        <button class="main-btn">
            <span class="circle">
                <span class="arrow"></span>
            </span>
            <span class="text">List of Cars</span>
        </button>
        <button class="main-btn">
            <span class="circle">
                <span class="arrow"></span>
            </span>
            <span class="text">About Us</span>
        </button>
    </div>
    <section class="promos">
        <h2>Promos</h2>
        <div class="car-grid">
            <div class="car">
                <img src="car1.jpg" alt="car 1">
                <div class="car-info">
                    <h3>Empty</h3>
                    <p>Empty</p>
                    <a href="#" class="'cta-button">Empty</a>
                </div>
            </div>
            <div class="car">
                <img src="car2.jpg" alt="car 2">
                <div class="car-info">
                    <h3>Empty</h3>
                    <p>Empty</p>
                    <a href="#" class="'cta-button">Empty</a>
                </div>
            </div>
            <div class="car">
                <img src="car3.jpg" alt="car 3">
                <div class="car-info">
                    <h3>Empty</h3>
                    <p>Empty</p>
                    <a href="#" class="'cta-button">Empty</a>
                </div>
            </div>
        </div>
    </section>

</body>
</html>