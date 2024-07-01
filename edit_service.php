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
    input[type="text"] {
        width: 50%;
        padding: 10px;
        font-size: 16px;
        border-radius: 4px;
        border: 1px solid #ccc;
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
    </style>
<body>
<nav class="navbar">
        <a href="view_services.php" class="active">view service</a>
        <a href="cust_details.php">Customer Details</a>
        <a href="admin_registration.php">add admin</a>
        <a href="#book-appointment">Book Appointment</a>
</nav><br><br>

<?php
require_once("conn.php");
$service_id=$_REQUEST['service_id'];
$query="SELECT * FROM service WHERE service_id='".$service_id."'";
    $result = $db->conn->query($query);
    $record=mysqli_fetch_assoc($result);
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $service_name = $_POST['service_name'];
  $price = $_POST['price'];
  $duration = $_POST['duration'];
  $query1 = "UPDATE service SET service_name='" . $service_name . "', price='" . $price . "', duration='" . $duration . "' WHERE service_id='" . $service_id . "'";
  if (mysqli_query($db->conn, $query1)) {
    header("location:view_services.php");
  } else {
    echo "Error updating record: " . mysqli_error($db->conn);
  }
}
?>


    <center>
    <div class="form-container">
    
        <form action="" method="post">
            <div class="form-group"><br>
                <label for="service_name">service_name:</label><br>
                <input type="text" id="service_name" name="service_name" value="<?php echo $record['service_name']; ?>" required><br>

            </div>
            <div class="form-group"><br>
                <label for="price">price:</label><br>
                <input type="text" id="price" name="price" value="<?php echo $record['price']; ?>" required><br>
            </div>
            <div class="form-group"><br>
                <label for="duration">duration:</label><br>
                <input type="text" id="duration" name="duration" value="<?php echo $record['duration']; ?>" required><br>
            </div>
            <br><br>
           <lable type="submit"> <button type="Save">Save</button></lable><br><br>

</center>
        </form>
    </div>  
</body>
</html>