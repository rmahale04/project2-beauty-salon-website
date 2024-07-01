<?php
require_once("conn.php");
session_start();

if (empty($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
//$customer_id = $_SESSION['customer_id'];
$username = $_SESSION['username'];
// $query = "select a.appoinment_id, a.service_name, a.date, a.time_slot from appoinment a inner join service s on a.service_id = s.service_id where a.customer_id = '$customer_id' ";
$query = "
    select appoinment.appoinment_id, service.service_name, category.category_name, appoinment.date, appoinment.time_slot 
    from appoinment 
    join service ON appoinment.service_id = service.service_id 
    join category ON service.category_id = category.category_id 
    where appoinment.username = '$username'
    order by appoinment.date ASC, appoinment.time_slot ASC";
$result = mysqli_query($db->conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.png">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/50a7f855e9.js" crossorigin="anonymous"></script>
    <style>
        body {
            /* font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0; */
            font-family: montserrat;
            background-color: black;
            overflow-x: hidden;
        }

        .heading-name{
            text-align: center;
            color: white;
            margin-top: 20px;
            font-family: ui-rounded;
            font-size: 38px;
            font-weight: bold;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        table {
            width: 100%;
            margin: 30px 0;
            border-collapse: collapse;
            color:white;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            /* background-color: #f2f2f2; */
        }
        /* .btn {
            display: inline-block;
            color: #333;
            background-color: #f4f4f4;
            border: solid 1px #ccc;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 10px;
        } */
        .btn{
            font-family: "Roboto", sans-serif;
            font-size: 18px;
            font-weight: bold;
            background: #393e46;
            width: 160px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: box-shadow, transform;
            transition-property: box-shadox, transform;
            /* display: flex; 
            justify-content: space-between; */
            /* display: grid;
            grid-template-columns: repeat(n, 1fr);
            gap: 10px; */
            /* margin-right: calc((100% - (n * width)) / (n - 1));
            width: width; */

        }
        /* .btn1{
            font-family: "Roboto", sans-serif;
            font-size: 16px;
            font-weight: bold;
            background: #393e46;
            width: 100px;
            padding: 10px;
            text-align: center;
        } */

        .btn1{
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
        .btn1:hover {
            background-color: #45a049;
        }
/* 
        .btn:hover, .btn:focus, .btn:active{
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        } */
    </style>
</head>
<body>
    <nav>
        <label class="logo">GGG</label>
        <ul>
            <li><a href="main.html">Home</a></li>
            <li><a href="main.html#categories">Category</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="main.html#contact">Contact</a></li>
            <li><a href="review.php">Reviews</a></li>
            <li><a href="registration_form.php">My Profile</a></li>
            <li><a href="view_appointment.php">Appointment</a></li>
            <!-- <li><a href="logout.php">Log Out</a></li> -->
        </ul>
    </nav>

    <!-- <header>
        <div class="container">
            <h1>View Appointments</h1>
            <nav>
                <a href="main.html">Home</a>
                <a href="services.php">Services</a>
                <a href="logout.php">Logout</a>
            </nav>
        </div>
    </header> -->
        <!-- <br><br> -->
    <div class="container">
        <!-- <h1><center>My Appointments</center></h1> -->
        <div class="heading-name">My Appointments</div>
        <br>
        <table>
            <tr>
                <th>Service Name</th>
                <th>Category</th>
                <th>Date</th>
                <th>Time Slot</th>
                <th>Action</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['service_name'] . "</td>";
                    echo "<td>" . $row['category_name'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['time_slot'] . "</td>";
                    echo "<td><a href='generate_bill1.php?appoinment_id=".$row['appoinment_id'] . "' class='btn1'>Generate Bill</a></td>";
                    // echo "<a href='generate_bill1.php?appointment_id=" . $row['appointment_id'] . "' >HII</a>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>No appointments found :(</center></td></tr>";
            }
            ?>
        </table>
        <!-- <a href="book_appointment.php" class="btn">Book New Appointment</a> -->

    </div>

    <!-- <table class="appointment_table">
        <thead>
            <tr>
                <th>Appointment Id</th>
                <th>Service Name</th>
                <th>Date</th>
                <th>Time Slot</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // while($record = mysqli_fetch_assoc($result)){
                //     echo "<tr>";
                //     echo "<td>";
                //     echo $record['appoinment_id'];
                //     echo "</td>";
                //     echo "<td>";
                //     echo $record['service_name'];
                //     echo "</td>";
                //     echo "<td>";
                //     echo $record['date'];
                //     echo "</td>";
                //     echo "<td>";
                //     echo $record['time_slot'];
                //     echo "</td>";
                //     echo "</tr>";
                // }
            ?>
        </tbody>
    </table> -->
    <!-- <br><br><br> -->
    <!-- <div class="button">
         <a href="generate_bill1.php" class="btn">Generate Bill</a>
    </div> -->


    <br><br><br><br><br><br><br><br><br>

    <footer>
        <div id="contact" class="footer-content">
            <div class="footer-left">
                <h3>Contact Us</h3>
                <p>GGG Beauty Salon</p>
                <p>Ahmedabad, Gujarat, 383052</p>
                <p>Phone: 123-456-7890</p>
                <br>
            </div>
            <div class="footer-right">
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Beauty Salon. All Rights Reserved. <a href="policy.html">Terms & Conditions</a></p>
        </div>
    </footer>
</body>
</html>