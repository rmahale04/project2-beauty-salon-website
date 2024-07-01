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
            padding: 100px;
            align-items: center;
            min-height: 100vh;
            background-image: url('home_image.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
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
        .wrapper .remember-forgot{
            display: flex;
            justify-content: space-between;
            font-size: 14.5px;
            margin: -15px 0 15px;
        }
        .remember-forgot label input{
            accent-color: #fff;
            margin-right: 3px;
        }
        .remember-forgot a{
            color: #fff;
            text-decoration: none; 
        }
        .remember-forgot a:hover{
            text-decoration: underline;
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
session_start();
require_once("conn.php");

$usernameErr=$password= "";
$username=$passwordErr= $err= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($_POST["username"]))
        {
            $usernameErr= "username is require";
        }

        if (empty($_POST["password"])) 
        {
            $passwordErr = "Password is required";
        }
    
        if (empty($usernameErr) && empty($passwordErr)) 
        {
            $sql = "SELECT * FROM customer WHERE username = '".$username."' ";
            $result = $db->conn->query($sql);
    
                if ($result->num_rows == 1) 
                {
                    //echo "hi";
                    $row = $result->fetch_assoc();
                    //echo "fetched";
                    if (password_verify($password, $row['password'])) 
                    {
                       // echo "connected";
                        $_SESSION['username'] = $username;
                       $_SESSION['customer_id'] = $id; 
                       // echo "connected";
                        header("location:main.html");
                    }

                    else 
                    {
                        //echo "give some time";
                        $err="Invalid username or password. Please try again.";
                    }
        } 
        else 
        {   
            $err = "Invalid username or password. Please try again.";
        }
    }
        }
        
?>

<body>
    <div class = "wrapper">
            
            <h1>Login</h1>
            <form method="post">
            <div class ="input-box">
                <input type ="text" placeholder="Username" name="username">
                <i class = 'bx bxs-user'></i>
                <span class="error">* <?php echo $usernameErr;?></span>
             </div>

             <div class ="input-box">
                <input type ="Password" placeholder="Password" name="password"  >
                <i class = 'bx bxs-lock-alt'></i>
                <span class="error">* <?php echo $passwordErr;?></span>
             </div>
            
             <!-- <div class = "remember-forgot">
                <label><input type = "checkbox">Remember me</label>
                <a href = "#">Forgot password?</a>
             </div>    -->
             <span class="error"><?php echo $err?></span>
             <input type = "submit" class = "button" value="submit" name="submit" id="submit">


            <div class = "register-link">
                <p>Don't have an account? <a href="registration.php">Register</a></p>
            </div>

            <div class = "register-link">
                <p>for admin click here <a href="admin_login.php">admin</a></p>
            </div>
</form>

</body>
</html>