<?php
require_once("conn.php");

$date = $_GET['date'];
$category_id = $_GET['category_id'];

// if (isset($_GET['date']) && isset($_GET['service_id'])) {
    // $date = $_GET['date'];
    // $service_id = $_GET['service_id'];

    $query = "SELECT time_slot FROM appoinment inner join service on appoinment.service_id = service.service_id WHERE appoinment.date = '$date' AND service.category_id = '$category_id'";
    $result = mysqli_query($db->conn, $query);

    $bookedSlots = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $bookedSlots[] = $row['time_slot'];
    }

    echo json_encode(['bookedSlots' => $bookedSlots]);
// }
?>