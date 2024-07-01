<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once("conn.php");
    $service_id=$_REQUEST["service_id"];
    $query="DELETE FROM service WHERE service_id='".$service_id."'";
    mysqli_query($db->conn,$query);
    header("location:view_services.php");
    
    ?>
</body>
</html>