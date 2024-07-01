<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset default margin and padding */
body, html {
    margin: 20;
    padding: 20;
    font-family: Castellar, sans-serif;
    background-color: hsl(188, 80%, 2%);
}

/* Style for horizontal navigation bar */
.navbar {
    overflow: hidden;
    background-color: #060000;
}

.navbar a {
    float: right;
    display: block;
    color: white;
    text-align: center;
    padding: 30px 20px;
    text-decoration: none;
}

.navbar a:hover {
    background-color:#04192d;
}

.navbar a.active {
    background-color: #4d97e1;
}

/* Style for main content area */
.main-content {
    padding: 20px;
}

/* Style for section headings */
h2 {
    color: #fcf9f9;
}

/* Responsive design for navigation bar */
@media screen and (max-width: 600px) {
    .navbar a {
        float: none;
        display: block;
        text-align: center;
    }
}

        </style>
    
</head>
<?php
require_once("conn.php");
session_start();

if (empty($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<body>
    <!-- Horizontal Navigation Bar -->
    <nav class="navbar">
        <a href="view_services.php" class="active">add service</a>
        <a href="admin_home_page.php" >Dashboard</a>
        <a href="cust_details.php">Customer Details</a>
        <a href="#book-appointment">Book Appointment</a>
</nav><br><br>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Section for Customer Details -->
        <section id="customer-details">
            <h2>Customer Details</h2>
            <!-- Add customer details form or content here -->
        </section>

        <!-- Section for Booking Appointment -->
        <section id="book-appointment">
            <h2>Book Appointment</h2>
            <!-- Add appointment booking form or content here -->
        </section>
    </div>
</body>
</html>
