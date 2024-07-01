<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Gallery</title>
</head>
<style>
   body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #181818;
    color: #fff;
}

.container {
    width: 100%;
    margin: 0 auto;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
}

header h1 {
    margin: 0;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

footer p {
    margin: 0;
}
/* .form-container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}  */

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom:  0px;
}

/* label {
    display: block;
    font-weight: bold;
    margin-bottom: 0px;
} */

input[type="text"],
input[type="email"],
input[type="date"],
input[type="number"] {
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
.edit{
    display: block;
    width: 20%;
    padding: 12px;
    font-size: 14px;
}

button:hover {
    background-color: #0056b3;
}
.error {
            color: #FF0000;
        }

    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.png">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/50a7f855e9.js" crossorigin="anonymous"></script>
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
        <!-- <li><a href="logout.php">log out</a></li> -->
    </ul>
</nav>
<?php
require_once("conn.php");
session_start();

if (empty($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
   // $id = $_SESSION['id']; 
    $username = $_SESSION['username'];
    $mobileerr = "";
   // echo $id;
    $query="SELECT * FROM customer WHERE username='".$username."'";
    $result = $db->conn->query($query);
    $record=mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email =$_POST['email'];
    $birthdate = $_POST['birthdate'];
    $specialdate = $_POST['specialdate'];
    $mobile = $_POST['mobile'];
    

    // Validate mobile number
    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $mobileerr = "* Please enter a valid 10-digit mobile number";
    }
    if(empty($mobileerr))
    {
        $query1="UPDATE customer SET name='".$name."',birth_date='".$birthdate."',
        email='".$email."',special_date='".$specialdate."',phone_no='".$mobile."'
        WHERE username='".$username."'";
        mysqli_query($db->conn,$query1);
        header("location:registration_form.php");
    }
}
?>


    <center>
    <div class="form-container">
        <h2>My Profile</h2>
        <!-- <div class = "image">
        <img src="1.jpg">
        </div>
        <div class = "edit">
        <button type="Edit">Edit</button>
        </div> -->
        <form action="registration_form.php" method="post">
            <div class="form-group"><br>
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>

            </div>
            <div class="form-group"><br>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo $record['name']; ?>" required><br>
            </div>
            <div class="form-group"><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?php echo $record['email']; ?>" required><br>
            </div>
            <div class="form-group"><br>
                <label for="birthdate">Birth Date:</label><br>
                <input type="date" id="birthdate" name="birthdate" value="<?php echo $record['birth_date']; ?>"><br>
            </div>
            <div class="form-group"><br>
                <label for="specialdate">Special Date:</label><br>
                <input type="date" id="specialdate" name="specialdate" value="<?php echo $record['special_date']; ?>" ><br>
            </div>
            <div class="form-group"><br>
                <label for="mobile">Mobile Number:</label><br>
                <input type="number" id="mobile" name="mobile" value="<?php echo $record['phone_no']; ?>">
                <br><span class="error">
                <?php echo $mobileerr;?></span>
            </div><br><br>
            <button type="Save">Save</button><br><br>
            <a href="logout.php"><button type="button">Log Out</button></a>
</center>
        </form>
    </div>
</body>
</html>
