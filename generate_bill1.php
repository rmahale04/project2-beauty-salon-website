<?php
require_once("conn.php");
session_start();

if (empty($_SESSION['username'])) {
    header("location: login.php");
    exit();
}
if (!isset($_GET['appoinment_id'])) {
    header("location: view_appoinment.php");
    exit();
}
$appoinment_id = $_GET['appoinment_id'];
$customer_id = $_SESSION['customer_id'];

$query = "
    select appoinment.appoinment_id, service.service_name, service.price, category.category_name, appoinment.date, appoinment.time_slot 
    from appoinment 
    join service on appoinment.service_id = service.service_id 
    join category on service.category_id = category.category_id 
    where appoinment.customer_id = '$customer_id' and appoinment.appoinment_id = '$appoinment_id'";

$result = mysqli_query($db->conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Invalid appointment ID";
    exit();
}

// if (!$appoinment) {
//     echo "No appointment found.";
//     exit();
// }

$appoinment = mysqli_fetch_assoc($result);
$gst = $appoinment['price'] * 0.18;
$total_amt = $gst + $appoinment['price'];
$bill_no = "A".$appoinment['appoinment_id'];

// $query1 = "select name, phone_no from customer where customer_id='$customer_id'";
// $result1 = mysqli_query($db->conn, $query1);
// if ($result1 && mysqli_num_rows($result1) > 0) {
//     // Fetch the customer details (assuming there's only one row for the given customer_id)
//     $customer = mysqli_fetch_assoc($result1);

//     // Now you can use $customer['name'] and $customer['phone_no'] in your HTML
// } else {
//     echo "Customer details not found.";
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.png">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/50a7f855e9.js" crossorigin="anonymous"></script>
    <style>
        .bill{
            /* color:white; */
            /* align : center; */
            /* padding-top : 150px; */
            font-size: 20px;
            padding-left: 250px;
            padding-right: 250px;
        }

        *{
            padding: 0;
            margin: 0;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
        }
        body{
            font-family: montserrat;
            background-color: black;
            overflow-x: hidden;
            color: #fff;
        }
        .heading-name{
            text-align: center;
            color: white;
            margin-top: 20px;
            font-family: ui-rounded;
            font-size: 38px;
            font-weight: bold;
        }
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

        }

        .btn:hover, .btn:focus, .btn:active{
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        /* .bill-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        } */
        .bill_table {
            width: 100%;
            margin: 30px 0;
            border-collapse: collapse;
        }

        .bill-table th, .bill-table td {
            padding: 12px;
            border: 1px solid #fff;
            text-align: left;
        }

        .bill-table, th, td {
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

        .total {
            /* text-align: right; */
            font-size: 20px;
            font-weight: bold;
        }
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
        </ul>
    </nav>

    <div class="heading-name">BILL</div>
    <br><br><br><br><br>
    <div class="container">
        <div class="bill">
            <table class="bill_table">
                <tr>
                    <th>Bill No.</th>
                    <td><?php echo $bill_no; ?></td>
                </tr>
                <?php
                    // while($customer = mysqli_fetch_assoc($result1)){
                    //     echo "<tr>";
                    //     echo "<th>Name</th>";
                    //     echo "<th>".$customer['name']."</th>";
                    //     echo "</tr>";
                    //     echo "<tr>";
                    //     echo "<th>Phone No.</th>";
                    //     echo "<th>".$customer['phone_no']."</th>";
                    //     echo "</tr>";
                    // }
                ?>
                <!-- <tr>
                    <th>Name</th>
                    <td><?php //echo $customer['name']; ?></td>
                </tr>
                <tr>
                    <th>Phone No.</th>
                    <td><?php //echo $customer['phone_no']; ?></td>
                </tr> -->
                <tr>
                    <th>Service Name</th>
                    <td><?php echo $appoinment['service_name']; ?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><?php echo $appoinment['date']; ?></td>
                </tr>
                <tr>
                    <th>Time Slot</th>
                    <td><?php echo $appoinment['time_slot']; ?></td>
                </tr>
                <tr>
                    <th>Service Price</th>
                    <td>Rs. <?php echo $appoinment['price']; ?></td>
                </tr>
                <tr>
                    <th>GST (18%)</th>
                    <td>Rs. <?php echo $gst; ?></td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td class="total">Rs. <?php echo $total_amt; ?></td>
                </tr>
            </table>
            <!-- <p>Bill No. <?php //echo " :- ".$bill_no; ?></p><br> -->
            <!-- <p>Service Name <?php //echo "    :- ".$appoinment['service_name']; ?></p><br> -->
            <!-- <p>Date           :- <?php //echo $appoinment['date']; ?></p><br> -->
            <!-- <p>Time Slot      :- <?php //echo $appoinment['time_slot']; ?></p><br> -->
            <!-- <p>Service Price          :- Rs. <?php// echo $appoinment['price']; ?></p><br> -->
            <!-- <p>GST (18%)          :- Rs. <?php //echo $gst; ?></p><br> -->
            <!-- <hr><br> -->
            <!-- <p><div class="total"><strong>Total Amount Payable :- </strong> Rs. <?php //echo $total_amt; ?></div></p> -->
        </div>
        <br><br><br>
        <center><a href="view_appointment.php" class="btn">Back to Appointments</a></center>
    </div>

    <br><br><br><br>

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