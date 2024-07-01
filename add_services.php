<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body, html {
        margin: 20;
        padding: 20;
        font-family: Castellar, sans-serif;
        background-color: hsl(188, 80%, 2%);
        color:white;
    }
    input[type="text"],
    input[type="number"] {
        width: 50%;
        padding: 10px;
        font-size: 16px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
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
    background-color:dark grey;
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
button  {
    display: block;
    width: 20%;
    padding: 12px;
    font-size: 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
/* Responsive design for navigation bar */
@media screen and (max-width: 600px) {
    .navbar a {
        float: none;
        display: block;
        text-align: center;
    }
}
            table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            color: #fff
        }
        th {
            /* background-color: #f2f2f2; */
            background-color: #333; 
        }
        tr:hover {
            background-color: #333;
        }

        .book-button {
            font-family: "Roboto", sans-serif;
            padding: 5px 10px;
            /* background-color: #4CAF50; */
            background-color: #393e46;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .book-button:hover {
            background-color: #45a049;
        }
    </style>
<body>
<nav class="navbar">
        <a href="view_services.php">view service</a>
        <a href="cust_details.php">Customer Details</a>
        <a href="view_reviews.php" >view reviews</a>
        <a href="admin_registration.php">add admin</a>
        <a href="admin_booked_appointments.php">Book Appointment</a>
        <a href="add_services.php" class="active">add service</a>
</nav><br><br>
<center>
<form action="add_services.php" method="post">
        <label for="category_id">category_id:</label><br>
        <input type="number" id="category_id" name="category_id" required><br><br>

        <label for="service_name">Service Name:</label><br>
        <input type="text" id="service_name" name="service_name" required><br><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" required><br><br>

        <label for="duration">Duration:</label><br>
        <input type="text" id="duration" name="duration" required><br><br>

       <lable type="submit"> <button type="add_service">add_service</button></lable><br><br>
    </form>
    <center>
</body>
<?php
require_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id=$_POST['category_id'];
    $service_name = $_POST['service_name'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];

    $query = "INSERT INTO service (category_id,service_name, price, duration) 
    VALUES ('".$category_id."','".$service_name."', '".$price."', '".$duration."')";
    if (mysqli_query($db->conn, $query)) {
        header("location:view_services.php");
    } else {
        echo "Error adding service: " . mysqli_error($db->conn);
    }
}
?>
</html>