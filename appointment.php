<?php
session_start();
    require_once("conn.php");
    

if (empty($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
    $id = $_REQUEST["id"];
    $username=$_SESSION['username'];
    $query = "select * from service where service_id='".$id."'";
    $result = mysqli_query($db->conn,$query);
    $record = mysqli_fetch_assoc($result);

    $query1 = "SELECT category_name FROM category WHERE category_id='" . $record['category_id'] . "'";
    $result1 = mysqli_query($db->conn,$query1);
    $record1 = mysqli_fetch_assoc($result1);

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $date = $_POST["date"];
        $time_slot = $_POST["time_slot"];
        $category_id = $record['category_id'];

        $query2 = "SELECT COUNT(*) AS count from appoinment INNER JOIN service ON 
        appoinment.service_id = service.service_id where service.category_id = '$category_id'
         AND appoinment.date = '$date' ";
        $result2 = mysqli_query($db->conn,$query2);
        $count = mysqli_fetch_assoc($result2)['count'];

        // $customer_id = $_SESSION['customer_id'];
        $_SESSION['customer_id'] = $customer_id;
        $service_id = $record['service_id'];
        // echo $customer_id;
        echo "Customer ID: " . $customer_id . "<br>";
    echo "Service ID: " . $service_id . "<br>";

        if($category_id == 1 or $category_id == 3 or $category_id == 4){
            if($count<8){
                $query3 = "insert into appoinment(customer_id, service_id, date, time_slot,username)
                 values ('".$customer_id."','".$service_id."','".$date."','".$time_slot."','".$username."')";
    
                if(mysqli_query($db->conn, $query3)){
                    echo "Appointment booked successfully!";
                }else{
                    echo "Error: ".mysqli_error($db->conn);
                }
            }else{
                echo "No appointments available for this day!";
            }
        }else{
            if($count<10){
                $query3 = "insert into appoinment(customer_id, service_id, date, time_slot,username) 
                values ('".$customer_id."','".$service_id."','".$date."','".$time_slot."','".$username."')";
    
                if(mysqli_query($db->conn, $query3)){
                    echo "Appointment booked successfully!";
                }else{
                    echo "Error: ".mysqli_error($db->conn);
                }
            }else{
                echo "No appointments available for this day!";
            }
        }
    }
    function fetch_booked_slots_by_category($conn, $date, $category_id) {
        $query = "SELECT time_slot FROM appoinment inner join service on
         appoinment.service_id = service.service_id WHERE appoinment.date = '$date' 
         AND service.category_id = '$category_id' ";
        $result = mysqli_query($conn, $query);
        $bookedSlots = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            $bookedSlots[] = $row['time_slot'];
        }
        return $bookedSlots;
    }
    
    $bookedSlots = [];
    if (isset($_POST['date'])) {
        $date = $_POST['date'];
        $category_id = $record['category_id'];
        $bookedSlots = fetch_booked_slots_by_category($db->conn, $date, $id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="services.css"> -->
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Appointment</title>
    <style>
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
            /* overflow-x: hidden; */
            /* color: #fff; */
        }
        nav{
            background: black;
            height: 80px;
            width: 100%;
        }
        label.logo{
            color:white;
            font-size: 35px;
            line-height: 80px;
            padding:0 20px;
        }

        nav ul{
            float: right;
            margin-right: 20px;
        }
        nav ul li{
            display: inline-block;
            line-height: 80px;
            margin: 0 5px;
        }
        nav ul li a{
            color: white;
            font-size: 17px;
            padding: 7px 13px;
            border-radius: 3px;
            text-transform: uppercase;
        }
        a:hover{
            /* background: rgb(26, 26, 26); */
            transition: .5s;
            background-color: #333;
        }

        .head{
            /* background-color: black; */
            color: white;
            text-align: center;
        }

        input[type="text"],
        input[type="time"],
        input[type="date"],
        select {
            width: 50%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            align:center;
        }

        .table-box{
            margin: 50px auto;
        }

        .table-row{
            display: table;
            width: 80%;
            margin: 10px auto;
            background: transparent;
            padding: 12px 0;
            color: white;
            font-size: 13px;
            box-shadow: 0 1px 4px 0 rgb(209, 209, 232);
        }

        .table-cell{
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

        .book-form{
            font-size: 25px;
            color: white;
            padding-left: 100px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-left {
            flex: 1;
        }

        .footer-right {
            flex: 1;
            text-align: right;
        }

        .social-icons {
            list-style-type: none;
            padding: 0;
        }

        .social-icons li {
            display: inline-block;
            margin-right: 10px;
        }

        .social-icons li a {
            color: #fff;
            text-decoration: none;
            font-size: 20px;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 10px;
            border-top: 1px solid #fff;
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
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            const today = new Date();
            const dateInput = document.querySelector("input[type='date']");
            const timeSlotSelect = document.querySelector("#time_slot");
            // const serviceId = <?php echo json_encode($id); ?>;
            const categoryId = <?php echo json_encode($record['category_id']); ?>;
            const todayISO = today.toISOString().split('T')[0];

            dateInput.setAttribute("min", todayISO);  

            dateInput.addEventListener("change", function() {
                const selectedDate = this.value;

                fetch('fetch_booked_slots.php?date=' + selectedDate + '&category_id=' + categoryId)
                    .then(response => response.json())
                    .then(data => {
                        const bookedSlots = data.bookedSlots;
                        const start_time = '10:00';
                        const end_time = '19:00';
                        const interval = <?php echo $record['duration']; ?>;
                        const start_timestamp = new Date('1970-01-01T' + start_time + 'Z').getTime();
                        const end_timestamp = new Date('1970-01-01T' + end_time + 'Z').getTime();
                        
                        timeSlotSelect.innerHTML = '<option value="">Select Time</option>';

                        for (let i = start_timestamp; i <= end_timestamp; i += interval * 60000) {
                            const time = new Date(i).toISOString().substr(11, 5);

                            if (time >= '13:00' && time < '14:00') {
                                continue;
                            }

                            const currentTime = new Date().toISOString().substr(11, 5);
                            const isCurrentDay = selectedDate === todayISO;

                            if (!bookedSlots.includes(time) && (!isCurrentDay || time > currentTime)) {
                                timeSlotSelect.innerHTML += `<option value="${time}">${time}</option>`;
                            }
                        }
                    })
                    .catch(error => console.error('Error fetching booked slots:', error));
            });
        });
    </script>
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

    <center>
        <div class="heading-name">Appointment Booking</div>
        <br><br>
        <div class="book-form">
            <form method="post">
                Category : <br><input type="text" name="category" value="<?php echo $record1['category_name']; ?>" readonly><br><br>
                Service : <br><input type="text" name="service" value="<?php echo $record['service_name']; ?>" readonly><br><br>
                Price : <br><input type="text" name="price" value="<?php echo 'Rs. '.$record['price']; ?>" readonly><br><br>
                Time consumption : <br><input type="text" name="time_taken" value="<?php echo $record['duration'].' minutes'; ?>" readonly><br><br>
                Date :<br><input type="date" name="date" required><br><br>
                Time slot :<br><!-- <input type="time" name="time_slot"><br><br> -->
                <select name="time_slot" id="time_slot" reqquired>
                    <option value="">Select Time</option>
                </select><br><br><br>
                <button type="submit">Book Appointment</button>
            </form>
        </div>
    </center>
    <br><br>
    <footer>
        <div class="footer-content" id="contact">

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