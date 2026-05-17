<?php

session_start();
include "../config/db.php";

$model = $_POST['model'];
$number = $_POST['number'];
$seats = $_POST['seats'];
$rent = $_POST['rent'];

$agency = $_SESSION['user_id'];

$sql = "INSERT INTO cars(agency_id,model,vehicle_number,seating_capacity,rent_per_day)

VALUES('$agency','$model','$number','$seats','$rent')";

mysqli_query($conn, $sql);

header("Location: add_car.php");
