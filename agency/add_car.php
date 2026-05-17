<?php
# This file use Show Add car form to Agency User 
?>


<?php
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'agency') {
    die("Access denied");
}
?>

<h2>Add New Car</h2>

<form action="save_car.php" method="POST">

    <input class="form-control mb-2" name="model" placeholder="Vehicle Model">

    <input class="form-control mb-2" name="number" placeholder="Vehicle Number">

    <input class="form-control mb-2" name="seats" placeholder="Seating Capacity">

    <input class="form-control mb-2" name="rent" placeholder="Rent Per Day">

    <button class="btn btn-primary">Add Car</button>

</form>

<?php include "../includes/footer.php"; ?>