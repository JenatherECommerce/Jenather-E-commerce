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
    <section>
        <div class="container">
            <img src="./images/header_img/icon transparent.png" alt="Jenather Logo" height="400">
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
        </div>
    </section>
    <section class="hatchbacks">
         <div class="title">
            <h1>Hatchbacks</h1>
        </div>
        <div class="card-container">
            <div class="card" onclick="toggleCard(this)">
                <img src="./images/product_img/Celerio.jpg" alt="">
                <div class="card-content">
                    <div class="content">
                        <h2 class="card-title">Product 1</h2>
                        <p class="card-description">Click To Expand for more details</p>
                    </div>
                    <div class="card-info">
                        <h3>Product Info</h3>
                        <div class="card-info-btns">
                            <button class="card-information">Engine & Performance</button>
                            <button class="card-information">Dimension</button>
                            <button class="card-information">Interior & Comfort</button>
                            <button class="card-information">Safety</button>
                            <button class="card-information">Wheels</button>
                            <button class="card-information">Features</button>
                        </div>
                        <hr>
                        <div class="details">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora itaque deleniti incidunt nobis dicta possimus nam, quia placeat asperiores, neque unde repudiandae fugiat, natus nulla officiis quibusdam voluptate provident eveniet.
                        </div>
                        <div class="process-btn">
                            <button class="goback-btn">Go Back</button>
                            <button class="purchase-btn">Purchase</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" onclick="toggleCard(this)">
                <img src="./images/product_img/Celerio1.jpg" alt="">
                <div class="card-content">
                    <div class="content">
                        <h2 class="card-title">Product 1</h2>
                        <p class="card-description">Click To Expand for more details</p>
                    </div>
                    <div class="card-info">
                        <h3>Product Info</h3>
                        <div class="card-info-btns">
                            <button class="card-information">Engine & Performance</button>
                            <button class="card-information">Dimension</button>
                            <button class="card-information">Interior & Comfort</button>
                            <button class="card-information">Safety</button>
                            <button class="card-information">Wheels</button>
                            <button class="card-information">Features</button>
                        </div>
                        <hr>
                        <div class="details">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora itaque deleniti incidunt nobis dicta possimus nam, quia placeat asperiores, neque unde repudiandae fugiat, natus nulla officiis quibusdam voluptate provident eveniet.
                        </div>
                        <div class="process-btn">
                            <button class="goback-btn">Go Back</button>
                            <button class="purchase-btn">Purchase</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" onclick="toggleCard(this)">
                <img src="./images/product_img/suzuki apv.jpg" alt="">
                <div class="card-content">
                    <div class="content">
                        <h2 class="card-title">Product 1</h2>
                        <p class="card-description">Click To Expand for more details</p>
                    </div>
                    <div class="card-info">
                        <h3>Product Info</h3>
                        <div class="card-info-btns">
                            <button class="card-information">Engine & Performance</button>
                            <button class="card-information">Dimension</button>
                            <button class="card-information">Interior & Comfort</button>
                            <button class="card-information">Safety</button>
                            <button class="card-information">Wheels</button>
                            <button class="card-information">Features</button>
                        </div>
                        <hr>
                        <div class="details">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora itaque deleniti incidunt nobis dicta possimus nam, quia placeat asperiores, neque unde repudiandae fugiat, natus nulla officiis quibusdam voluptate provident eveniet.
                        </div>
                        <div class="process-btn">
                            <button class="goback-btn">Go Back</button>
                            <button class="purchase-btn">Purchase</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="suzuki">
         <div class="title">
            <h1>Suzuki</h1>
        </div>
        <div class="card-container">
            <div class="card" onclick="toggleCard(this)">
                <img src="./images/product_img/Celerio.jpg" alt="">
                <div class="card-content">
                    <div class="content">
                        <h2 class="card-title">Product 1</h2>
                        <p class="card-description">Click To Expand for more details</p>
                    </div>
                    <div class="card-info">
                        <h3>Product Info</h3>
                        <div class="card-info-btns">
                            <button class="card-information">Engine & Performance</button>
                            <button class="card-information">Dimension</button>
                            <button class="card-information">Interior & Comfort</button>
                            <button class="card-information">Safety</button>
                            <button class="card-information">Wheels</button>
                            <button class="card-information">Features</button>
                        </div>
                        <hr>
                        <div class="details">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora itaque deleniti incidunt nobis dicta possimus nam, quia placeat asperiores, neque unde repudiandae fugiat, natus nulla officiis quibusdam voluptate provident eveniet.
                        </div>
                        <div class="process-btn">
                            <button class="goback-btn">Go Back</button>
                            <button class="purchase-btn">Purchase</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" onclick="toggleCard(this)">
                <img src="./images/product_img/Celerio1.jpg" alt="">
                <div class="card-content">
                    <div class="content">
                        <h2 class="card-title">Product 1</h2>
                        <p class="card-description">Click To Expand for more details</p>
                    </div>
                    <div class="card-info">
                        <h3>Product Info</h3>
                        <div class="card-info-btns">
                            <button class="card-information">Engine & Performance</button>
                            <button class="card-information">Dimension</button>
                            <button class="card-information">Interior & Comfort</button>
                            <button class="card-information">Safety</button>
                            <button class="card-information">Wheels</button>
                            <button class="card-information">Features</button>
                        </div>
                        <hr>
                        <div class="details">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora itaque deleniti incidunt nobis dicta possimus nam, quia placeat asperiores, neque unde repudiandae fugiat, natus nulla officiis quibusdam voluptate provident eveniet.
                        </div>
                        <div class="process-btn">
                            <button class="goback-btn">Go Back</button>
                            <button class="purchase-btn">Purchase</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" onclick="toggleCard(this)">
                <img src="./images/product_img/suzuki apv.jpg" alt="">
                <div class="card-content">
                    <div class="content">
                        <h2 class="card-title">Product 1</h2>
                        <p class="card-description">Click To Expand for more details</p>
                    </div>
                    <div class="card-info">
                        <h3>Product Info</h3>
                        <div class="card-info-btns">
                            <button class="card-information">Engine & Performance</button>
                            <button class="card-information">Dimension</button>
                            <button class="card-information">Interior & Comfort</button>
                            <button class="card-information">Safety</button>
                            <button class="card-information">Wheels</button>
                            <button class="card-information">Features</button>
                        </div>
                        <hr>
                        <div class="details">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora itaque deleniti incidunt nobis dicta possimus nam, quia placeat asperiores, neque unde repudiandae fugiat, natus nulla officiis quibusdam voluptate provident eveniet.
                        </div>
                        <div class="process-btn">
                            <button class="goback-btn">Go Back</button>
                            <button class="purchase-btn">Purchase</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promos">
        <div class="Promos">
            <h1>Promos</h1>
        </div>
        <div class="slider">
            <div class="list">
                <div class="item">
                    <img src="./images/product_img/suzuki promo cars.jpg" alt="" onclick="location.href='#'">
                </div>
                <div class="item">
                    <img src="./images/product_img/suzuki promo.png" alt="">
                </div>
                <div class="item">
                    <img src="./images/product_img/suzuki promo cars.jpg" alt="">
                </div>
                <div class="item">
                    <img src="./images/product_img/suzuki promo.png" alt="">
                </div>
            </div>
            <div class="buttons-promos">
                <button id="previous"><</button>
                <button id="next">></button>
            </div>
            <ul class="dots">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </section>
    <script src="./js/slider.js">
    </script>

</body>
</html>