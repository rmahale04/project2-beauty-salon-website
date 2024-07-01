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

</style>
<body>
<nav class="navbar">
        <a href="view_services.php" class="active">view service</a>
        <a href="cust_details.php">Customer Details</a>
        <a href="view_reviews.php" >view reviews</a>
        <a href="admin_registration.php">add admin</a>
        <a href="admin_booked_appointments.php">Book Appointment</a>
        <a href="add_services.php">add service</a>
</nav><br><br>

<?php
require_once("conn.php");
$query="SELECT * FROM service where category_id='3'";
$result= mysqli_query($db->conn,$query);
echo "<table border = 3px>";
echo "<tr>";
echo "<th>";
echo "service_id";
echo "</th>";

// echo "<th>";
// echo "category_id";
// echo "</th>";

echo "<th>";
echo "service_name";
echo "</th>";

echo "<th>";
echo "price";
echo "</th>";

echo "<th>";
echo "duration";
echo "</th>";


echo "<th>";
echo "edit";
echo "</th>";

echo "<th>";
echo "delete";
echo "</th>";
echo "</tr>";
while($record=mysqli_fetch_assoc($result))
{

    echo "<tr>";
    echo "<td>";
    echo $record['service_id'];
    echo "</td>";

    // echo "<td>";
    // echo $record['category_id'];
    // echo "</td>";

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
    echo "<a href='edit_service.php?service_id=".$record['service_id']."' class='book-button'>edit</a>";
    echo "</td>";

    echo "<td>";
    echo "<a href='delete_service.php?service_id=".$record['service_id']."' class='book-button'>delete</a>";
    echo "</td>";

    echo "</tr>";
}
echo "</table>";
?>    
</body>
</html>