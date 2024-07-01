<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:"poppins",sans-serif;
        }
        body{
            display: flex;
            justify-content: left;
            padding: 30px;
            align-items: center;
            min-height: 100vh;
            background-image: url('home_image.jpg');
            background-size: cover;
            background-position: center;
        }
        .wrapper{
            width: 420px;
            background:transparent;
            border: 2px solid rgba(255,255,255,.2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
        }
        .wrapper h1{
            font-size: 36px;
            text-align: center;
        }
        .wrapper .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin:30px 0;
        }
        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255,255,255,.2);
            border-radius:40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }
        .input-box input{
            color: #fff;
        }
        .input-box i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }
        .wrapper .button{
            width: 100%;
            height: 45px;
            background: #fff;
            border : none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0 ,0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }
        .wrapper .register-link{
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }
        .register-link p a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }
        .register-link p a:hover{
            text-decoration: underline;
        }
        .error {
            color: #FF0000;
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
        $usernameErr= "username is require";
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
        //$phone_no = $_POST["phone_no"];
        $hashpassword = password_hash($password,PASSWORD_DEFAULT);
        $query = "INSERT INTO customer (name,email,username,password) 
                  VALUES ('".$name."','".$email."','".$username."','".$hashpassword."')";  
        mysqli_query($db->conn,$query);   
        
        header("Location: login.php");
        exit(); 
    }
}

    


?>
<body>
    <div class = "wrapper">
            
            <h1>Sign Up</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class ="input-box">
        <input type ="text" placeholder="Name" name="name">
        <span class="error">* <?php echo $nameErr;?></span>
        <i class = 'bx bxs-user'></i>
    </div>
    
    <div class ="input-box">
        <input type ="email" placeholder="Email" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
        <i class='bx bx-envelope' ></i>
    </div>
    
    <div class ="input-box">
        <input type ="text" placeholder="username" name="username">
        <span class="error">* <?php echo $usernameErr;?></span>
        <i class = 'bx bxs-user'></i>
    </div>

    <div class ="input-box">
        <input type ="Password" placeholder="Password" name="password">
        <span class="error">* <?php echo $passwordErr;?></span>
        <i class = 'bx bxs-lock-alt'></i>
    </div>
    
    <div class ="input-box">
                <input type="Password" placeholder="Confirm Password" name="confirmPassword">

                <span class="error">* <?php echo $confirmPasswordErr;?></span>
                <i class = 'bx bxs-lock-alt'></i>
             </div>
                
                <input type = "submit" class = "button" value="submit" name="submit" id="submit">
                
                <div class = "register-link">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
                
        </form>
</body>
<?php

?>
</html>