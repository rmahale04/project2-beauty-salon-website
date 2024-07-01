<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.png">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/50a7f855e9.js" crossorigin="anonymous"></script>
</head>
<style>
body {
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
input[type="textarea"] {
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
<?php
    require_once("conn.php");
    session_start();
    if (empty($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    $username = $_SESSION['username'];
    $query="SELECT * FROM customer WHERE username='".$username."'";
    $result = $db->conn->query($query);
    $record=mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $review = $_POST['review'];
     
    $sql = "insert into reviews (username, name, review) values ('".$username."','".$name."','".$review."')";
    mysqli_query($db->conn,$sql);
        if ($db->conn->query($sql) === TRUE) {
            echo "Review submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $db->conn->error;
        }
    }
?> 
        
<center>
    <div class="form-container">
    <h1>Reviews</h1>
        <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group"><br>
                <label for="username">username:</label><br>
                <input type="text" id="username" name="username" value="<?php echo $username;?>" required><br><br>
            </div>
            <div class="form-group"><br>
            <label for="name">name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $record['name']; ?>" required><br><br>
            </div>
            <label for="review">Review:</label><br>
            <textarea id="review" name="review" rows="10" cols="98" required></textarea><br><br>

        <button type="submit">Submit Review</button> 
</center>
        </form>
    </div>  
</body>
</html>