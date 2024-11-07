<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="./Images/Jenather_Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./styling_folder/admin.css">
    <link rel="stylesheet" href="./styling_folder/profile.css">
</head>
<body>
    <nav>
        <ul>
            <img src="https://res.cloudinary.com/diwwqfwjb/image/upload/v1725281506/Jenather-Ecommerce/nwqfas3que4whtkngexj.png" alt="logo">
            <li><a href="adminHome.php">Home</a></li>
            <li><a href="Profile.php">Profile</a></li>
            <li><a href="Customers.php">Customer</a></li>
            <li><a href="Inventory.php">Inventory</a></li>
            <li><a href="">Logout</a></li>
        </ul>
    </nav>

    <div class="logo_container">
        <img src="https://res.cloudinary.com/diwwqfwjb/image/upload/v1725281506/Jenather-Ecommerce/nwqfas3que4whtkngexj.png" alt="logo">

        <div class="container_1" >
            <form action="Profile_admin.php" method="post" class="reset_container">
                <h1 id="Admin_Access">Admin Access</h1>
                <h1 id="Username">Username</h1>
                <input type="text" name="username" placeholder="Change Username">
                <h1 id="Password">Password</h1>
                <input type="text" name="password" placeholder="Change Password">
                <button type="submit" name="signUp">Submit</button>

            </form>
        </div>
    </div>


    
</body>
</html>