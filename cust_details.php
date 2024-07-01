<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
        .add-customer {
            margin-bottom: 20px;
        }
        .add-customer button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Horizontal Navigation Bar -->
    <nav class="navbar">
        <a href="view_services.php">view service</a>
        <a href="cust_details.php" class="active">Customer Details</a>
        <a href="view_reviews.php" >view reviews</a>
        <a href="admin_registration.php">add admin</a>
        <a href="admin_booked_appointments.php">Book Appointment</a>
        <a href="add_services.php">add service</a>
</nav><br><br>
<?php
require_once("conn.php");
$query="SELECT * FROM customer";
$result= mysqli_query($db->conn,$query);
echo "<table border = 3px>";
echo "<tr>";
echo "<th>";
echo "username";
echo "</th>";

echo "<th>";
echo "name";
echo "</th>";

echo "<th>";
echo "phone no.";
echo "</th>";

echo "<th>";
echo "email";
echo "</th>";

echo "<th>";
echo "birth_date";
echo "</th>";

echo "<th>";
echo "special_date";
echo "</th>";

// echo "<th>";
// echo "edit";
// echo "</th>";

// echo "<th>";
// echo "delete";
// echo "</th>";
// echo "</tr>";
while($record=mysqli_fetch_assoc($result))
{

    echo "<tr>";
    echo "<td>";
    echo $record['username'];
    echo "</td>";

    echo "<td>";
    echo $record['name'];
    echo "</td>";

    echo "<td>";
    echo $record['phone_no'];
    echo "</td>";

    echo "<td>";
    echo $record['email'];
    echo "</td>";

    echo "<td>";
    echo $record['birth_date'];
    echo "</td>";

    echo "<td>";
    echo $record['special_date'];
    echo "</td>";

    // echo "<td>";
    // echo "<a href='edit.php?id=".$record['id']."'>edit</a>";
    // echo "</td>";

    // echo "<td>";
    // echo "<a href='delete.php?id=".$record['id']."'>delete</a>";
    // echo "</td>";

    echo "</tr>";
}
echo "</table>";
?>
<br>
<br>
<!-- <div class="add-customer">
    <a href="add_customer.php"><button>Add Customer</button></a>
</div> -->
</body>
</html>