<?php
    require_once("conn.php");

    if($_POST["type"] == ""){
        $sql = "select * from category";
        $query = mysqli_query($conn, $sql) or die("connection error");
        
        $str = "";
        
        while($row = mysqli_fetch_assoc($query)){
            $str .= "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
        }
    }else if($_POST["type"] == "serviceData"){
        $sql = "select * from service where category={$_POST['id']}";
        $query = mysqli_query($conn, $sql);
        
        $str = "";
        
        while($row = mysqli_fetch_assoc($query)){
            $str .= "<option value='{$row['service_id']}'>{$row['service_name']}</option>";
        }
    }
    
    
    
    // echo $str;
?>