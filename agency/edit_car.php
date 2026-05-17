<?php
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] !== "agency") {
    header("Location: /");
}

$id = $_GET['id'];

$sql = "SELECT * FROM cars WHERE id='$id'";
$result = mysqli_query($conn, $sql);

$car = mysqli_fetch_assoc($result);
?>

<h2>Edit Car</h2>

<form action="update_car.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $car['id']; ?>">

    <div class="mb-3">
        <label>Model</label>
        <input type="text" name="model" class="form-control"
            value="<?php echo $car['model']; ?>">
    </div>

    <div class="mb-3">
        <label>Vehicle Number</label>
        <input type="text" name="vehicle_number" class="form-control"
            value="<?php echo $car['vehicle_number']; ?>">
    </div>

    <div class="mb-3">
        <label>Seating Capacity</label>
        <input type="number" name="seating_capacity" class="form-control"
            value="<?php echo $car['seating_capacity']; ?>">
    </div>

    <div class="mb-3">
        <label>Rent Per Day</label>
        <input type="number" name="rent_per_day" class="form-control"
            value="<?php echo $car['rent_per_day']; ?>">
    </div>

    <button class="btn btn-primary">Update Car</button>

</form>

<?php include "../includes/footer.php"; ?>