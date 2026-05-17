<?php
include "../config/db.php";

if ($_SESSION['role'] !== "agency") {
    header("Location: /");
}

$id = $_POST['id'];
$model = $_POST['model'];
$vehicle_number = $_POST['vehicle_number'];
$seating_capacity = $_POST['seating_capacity'];
$rent_per_day = $_POST['rent_per_day'];

$sql = "UPDATE cars 
SET model='$model',
vehicle_number='$vehicle_number',
seating_capacity='$seating_capacity',
rent_per_day='$rent_per_day'
WHERE id='$id'";

mysqli_query($conn, $sql);

header("Location: my_cars.php");
exit();
