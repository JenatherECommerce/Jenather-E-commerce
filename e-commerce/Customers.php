<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="./styling_folder/admin.css">
    <link rel="stylesheet" href="./styling_folder/customers.css">
</head>
<body>
    <nav>
        <ul>
            <img src="https://res.cloudinary.com/diwwqfwjb/image/upload/v1725281506/Jenather-Ecommerce/nwqfas3que4whtkngexj.png" alt="logo">
            <li><a href="adminHome.php">Home</a></li>
            <li><a href="Profile.php">Profile</a></li>
            <li><a href="Customers.php">Customer</a></li>
            <li><a href="Inventory.php">Inventory</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="customers">
        <div class="car_container">

            <img id="carImage" src="./Images/Jenather_Logo.png" alt="">
        </div>

        <div class="car_owner">

            <?php 
                include('buycar.php'); 
    
            ?>
        </div>
    </div>

    <script>
  
        function viewPurchasedCar(imageUrl) {
  
            document.getElementById('carImage').src = imageUrl;
        }
    </script>

</body>
</html>
