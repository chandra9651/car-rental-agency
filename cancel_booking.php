<?php

include "config/db.php";
session_start();

$car_id = $_GET['car_id'];
$customer_id = $_SESSION['user_id'];

$sql = "DELETE FROM bookings 
        WHERE car_id='$car_id' 
        AND customer_id='$customer_id'";

mysqli_query($conn, $sql);

header("Location: available_cars.php");
exit();
