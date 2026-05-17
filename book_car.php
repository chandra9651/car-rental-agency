<?php

session_start();
include "config/db.php";

if (!isset($_POST['car_id'])) {
    header("Location: available_cars.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] != 'customer') {
    die("Only customers can rent");
}

$car_id = $_POST['car_id'];
$days = $_POST['days'];
$start_date = $_POST['start_date'];
$customer_id = $_SESSION['user_id'];

$end_date = date(
    "Y-m-d",
    strtotime($start_date . " + " . ($days - 1) . " days")
);

$check = "SELECT * FROM bookings
          WHERE car_id='$car_id'
          AND ('$start_date' <= end_date AND '$end_date' >= start_date)";

$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {

    $_SESSION['error'] = "❌ Car already booked for selected dates";

    header("Location: available_cars.php");
    exit();
} else {

    $sql = "INSERT INTO bookings(customer_id,car_id,start_date,end_date,days)
            VALUES('$customer_id','$car_id','$start_date','$end_date','$days')";

    mysqli_query($conn, $sql);

    $_SESSION['success'] = "✅ Car booked successfully";

    header("Location: available_cars.php");
    exit();
}
