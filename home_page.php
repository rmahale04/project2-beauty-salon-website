<?php
session_start(); 
if(!isset($_SESSION['username'])){
    header("location: login.php");
    exit();
}

$username = $_SESSION['username']; 
?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 0 auto;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
}

header nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

header nav ul li {
    display: inline;
    margin-right: 20px;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
}

#banner {
    background-image: url('salon-banner.jpg');
    background-size: cover;
    color: #fff;
    text-align: center;
    padding: 100px 0;
}

#banner h2 {
    font-size: 36px;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    background-color: #ff6600;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

#services {
    padding: 50px 0;
}

.service {
    text-align: center;
    margin-bottom: 30px;
}

.service img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    margin-bottom: 20px;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

    </style>
<body>
    <header>
        <div class="container">
            <h1>Welcome to Our Salon</h1>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="banner">
        <div class="container">
            <h2>Experience the Best in Salon Services</h2>
            <p>Book an appointment today and treat yourself to a rejuvenating experience!</p>
            <a href="#" class="btn">Book Now</a>

        </div>
    </section>

    <section id="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service">
                <img src="haircut.jpg" alt="Haircut">
                <h3>Haircut & Styling</h3>
                <p>From classic cuts to trendy styles, our expert stylists will make you look your best.</p>
            </div>
            <div class="service">
                <img src="nails.jpg" alt="Nails">
                <h3>Manicure & Pedicure</h3>
                <p>Pamper yourself with a relaxing manicure and pedicure session.</p>
            </div>
            <!-- Add more services here -->
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Salon Website. All Rights Reserved.</p>
            <h1>Welcome, <?php echo $username; ?></h1>
        </div>
    </footer>
</body>
</html>

