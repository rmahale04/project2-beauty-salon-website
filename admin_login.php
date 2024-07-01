<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <style>
                *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "poppins",sans-serif;
            }
            body{
                background-color: #181818;
                /* background:url(img1.jpg)no-repeat; */
                background-position:center;
                background-size : cover;
                min-height:100vh;
                width:100%;
            }
            .container{
                display: flex;
                justify-content:center;
                align-items:center;
                min-height:100vh;
            }
            .form-box{
                position: relative;
                width:480px;
                height:550px;
                border: 2px solid rgba(255,255,2550,5);
                border-radius:20px;
                backdrop-filter:blur(15px);
                display:flex;
                justify-content:center;
                align-items:center;
            }
            .form-box h2{
                color:#fff;
                text-align:center;
                font-size:32px;
            }
            .form-box .input-box{
                position: relative;
                margin:30px 0;
                width:310px;
                border-bottom:2px solid #fff;
            }
            .form-box .input-box input{
                width:100%;
                height:45px;
                background:transparent;
                border:none;
                outline:none;
                padding:0 20px 0 5px;
                color:#fff;
                font-size:16px;
            }
            input::placeholder{
                color:#fff;
            }
            .btn{
                color:#fff;
                background: blue;
                width:100%;
                height:50px;
                outline:none;
                border:none;
                font-size:17px;
                cursor:pointer;
                box-shadow:3px 0 10px rgba(0,0,0,.5);
            }
            .group{
                display:flex;
                justify-content:space-between;
            }
            .group span a{
                color:#fff;
                position:relative;
                top:10px;
                text-decoration:none;
                font-weight:500;
            }
            .group a:focus{
                text-decoration:underline;
            }
            .register-link p{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
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
        $username = $_POST['admin_username'];
        $password = $_POST['password'];

        if(empty($_POST["admin_username"]))
        {
            $usernameErr= "admin id is require";
        }

        if (empty($_POST["password"])) 
        {
            $passwordErr = "Password is required";
        }
    
        if (empty($usernameErr) && empty($passwordErr)) 
        {
            $sql = "SELECT * FROM admin WHERE admin_username = '".$username."' ";
            $result = $db->conn->query($sql);
    
                if ($result->num_rows == 1) 
                {
                    //echo "hi";
                    $row = $result->fetch_assoc();

                    if (password_verify($password, $row['password'])) 
                    {
                        $_SESSION['admin_id'] = $admin_id;
                        $_SESSION['admin_username']=$username;
                        //echo "connected";
                        header("location:view_services.php");
                        //header("location:main.html");
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
    <div class= "container">
        <div class = "form-box">
            <form action="" method = "post">
                <h2>Login</h2>
                <div class="input-box">
                    <input type="text" name = "admin_username" placeholder="admin_username">
                </div>
                <span class="error">* <?php echo $usernameErr;?></span>
                <div class="input-box">
                    <input type="password" name = "password" placeholder="Password">
                </div>
                <span class="error">* <?php echo $passwordErr;?></span>
                <div class = "button">
                    <input type="submit" class = "btn" value = "Login">
                </div>
                <span class="error"><?php echo $err?></span>
                <div class = "register-link">
                    <!-- <span><a href = "#">Forget-Password</a></span> -->
                    <br>
                    <p>are you a customer? <a href = "login.php"> login</a></p>
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>