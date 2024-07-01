<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.png">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/50a7f855e9.js" crossorigin="anonymous"></script>
    <style>
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
        /* tr:hover {
            background-color: #f5f5f5;
            color:#080808;
        } */
        /* .add-customer {
            margin-bottom: 20px;
        }
        .add-customer button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        } */
        .nail-care-heading {
            color: white;
            text-align: center;
            margin-top: 12px;
            font-family: ui-rounded;
            /* cursor: pointer; */
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
</head>
<body>
    <nav>
        <label class="logo">GGG</label>
        <ul>
            <li><a href="main.html">Home</a></li>
            <li><a href="main.html#services">Services</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="main.html#contact">Contact</a></li>
            <li><a href="review.php">Reviews</a></li>
            <li><a href="registration_form.php">My Profile</a></li>
            <li><a href="view_appointment.php">Appointment</a></li>
        </ul>
    </nav>
    <h1 class="nail-care-heading">Nail Care Services</h1>
    <br><br>
<!-- </body> -->
<?php
require_once("conn.php");
$query="SELECT * FROM service where category_id='3'";
$result= mysqli_query($db->conn,$query);
echo "<table border = 3px>";
while($record=mysqli_fetch_assoc($result))
{

    // echo "<tr style='color: #ff0000'>";
    echo "<tr>";
    echo "<td>";
    echo $record['service_name'];
    echo "</td>";

    echo "<td>";
    echo $record['price'];
    echo "</td>";

    echo "<td>";
    echo $record['duration'];
    echo "</td>";

    echo "<td>";
    echo "<a href='appointment.php?id=".$record['service_id']."' class='book-button'>Book</a>";
    echo "</td>";

    // echo "<td>";
    // echo "<a href='delete.php?id=".$record['id']."'>delete</a>";
    // echo "</td>";

    echo "</tr>";
}
echo "</table>";
?>
<br><br><br><br>
<!-- <br><br><br><br> -->
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