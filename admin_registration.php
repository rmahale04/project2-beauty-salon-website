<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            background-color: #181818;
            background-position: center;
            background-size: cover;
            min-height: 100vh;
            width: 100%;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-box {
            position: relative;
            width: 400px;
            height: 600px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .form-box h2 {
            color: #fff;
            text-align: center;
            font-size: 28px;
        }
        .form-box .input-box {
            position: relative;
            margin: 20px 0;
            width: 100%;
            border-bottom: 2px solid #fff;
        }
        .form-box .input-box input {
            width: 100%;
            height: 35px;
            background: transparent;
            border: none;
            outline: none;
            padding: 0 10px;
            color: #fff;
            font-size: 14px;
        }
        input::placeholder {
            color: #fff;
        }
        .btn {
            color: #fff;
            background: blue;
            width: 100%;
            height: 40px;
            outline: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.5);
        }
        .group {
            display: flex;
            justify-content: space-between;
        }
        .group span a {
            color: #fff;
            position: relative;
            top: 10px;
            text-decoration: none;
            font-weight: 500;
        }
        .group a:focus {
            text-decoration: underline;
        }
        .error {
            color: #FF0000;
        }
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

    </style>
</head>
<?php
require_once("conn.php");
$nameErr = $emailErr = $usernameErr=$password =$confirmPasswordErr= "";
$name = $email = $username=$passwordErr =$confirmPassword= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
  else {
    $name = ($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = ($_POST["email"]);
    $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
    if (!preg_match($pattern, $email)) {
        $emailErr = "Invalid email format";
    }
  }

  if(empty($_POST["username"]))
  {
        $usernameErr= "admin_id is require";
  }

  else{
    $username = ($_POST["username"]);
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
            $usernameErr = "Only letters, numbers, and underscores allowed";
        }
  }
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
} else {
    $password = ($_POST["password"]);
    if (strlen($password) < 8) {
        $passwordErr = "Password must be at least 8 characters long";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        $passwordErr = "Password must contain at least one uppercase letter, one lowercase letter, and one number";
    }
    }
    if (empty($_POST["confirmPassword"])) {
        $confirmPasswordErr = "Confirm Password is required";
    } else {
        $confirmPassword = $_POST["confirmPassword"];
        if ($confirmPassword != $password) {
            $confirmPasswordErr = "Passwords do not match";
        }
    }
    if (empty($nameErr) && empty($emailErr) && empty($usernameErr) && empty($passwordErr) && empty($confirmPasswordErr)) 
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hashpassword = password_hash($password,PASSWORD_DEFAULT);

        $query = "INSERT INTO admin (name,email,admin_username,password) 
                  VALUES ('".$name."','".$email."','".$username."','".$hashpassword."')";  
        mysqli_query($db->conn,$query);   
        
        header("Location: admin_login.php");
        exit();
    }
}


?>
<body>
<nav class="navbar">
        <a href="view_services.php">view service</a>
        <a href="cust_details.php">Customer Details</a>
        <a href="view_reviews.php" >view reviews</a>
        <a href="admin_registration.php" class="active">add admin</a>
        <a href="admin_booked_appointments.php">Book Appointment</a>
        <a href="add_services.php">add service</a>
</nav><br><br>
    <div class= "container">
        <div class = "form-box">
            <form action="" method = "post">
                <h2>Register</h2>
                <div class="input-box">
                    <input type="text" name = "username" placeholder="admin_username">
                </div>
                <span class="error">* <?php echo $usernameErr;?></span>

                <div class="input-box">
                    <input type="text" name = "name" placeholder="name">
                </div>
                <span class="error">* <?php echo $nameErr;?></span>
                
                <div class="input-box">
                    <input type="email" name = "email" placeholder="Email">
                </div>
                <span class="error">* <?php echo $emailErr;?></span>

                <div class="input-box">
                    <input type="password" name = "password" placeholder="Password">
                </div>
                <span class="error">* <?php echo $passwordErr;?></span>

                <div class="input-box">
                    <input type="password" name = "confirmPassword" placeholder="Confirm Password">
                </div>
                <span class="error">* <?php echo $confirmPasswordErr;?></span>

                <div class = "button">
                    <input type="submit" class = "btn" value = "Register">
                </div>
                <div class = "group">
                    <!-- <span><a href = "#">Forget-Password</a></span> -->
                    <span><a href = "admin_login.php">Login</a></span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>