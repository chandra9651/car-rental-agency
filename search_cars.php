<?php
include "config/db.php";
include "includes/header.php";
?>

<?php
if ($_SESSION['role'] == 'agency') {
    header("Location:/agency/add_car.php");
}

?>


<h2 class="mb-4">Search Available Cars</h2>

<form method="GET">

    <div class="row">

        <div class="col-md-4">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label>Days</label>
            <select name="days" class="form-control">

                <option value="1">1 Day</option>
                <option value="2">2 Days</option>
                <option value="3">3 Days</option>
                <option value="4">4 Days</option>
                <option value="5">5 Days</option>

            </select>
        </div>

        <div class="col-md-4 mt-4">
            <button class="btn btn-primary w-100">
                Search Cars
            </button>
        </div>

    </div>

</form>

<hr>

<?php

if (isset($_GET['start_date'])) {

    $start_date = $_GET['start_date'];
    $days = $_GET['days'];

    $end_date = date(
        "Y-m-d",
        strtotime($start_date . " + " . ($days - 1) . " days")
    );

    $sql = "SELECT * FROM cars
            WHERE id NOT IN (
                SELECT car_id FROM bookings
                WHERE ('$start_date' <= end_date AND '$end_date' >= start_date)
            )";

    $result = mysqli_query($conn, $sql);

?>

    <h3 class="mt-4 d-inline">Available Cars - </h3>
    <span style="color: rgb(255 6 6);"><?php echo $start_date . " & " . $days . " Days"; ?></span>


    <div class="row">

        <?php while ($car = mysqli_fetch_assoc($result)) { ?>

            <div class="col-md-4 mb-4">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5><?php echo $car['model']; ?></h5>

                        <p>

                            <b>Vehicle No:</b> <?php echo $car['vehicle_number']; ?><br>

                            <b>Seats:</b> <?php echo $car['seating_capacity']; ?><br>

                            <b>Rent Per Day:</b> ₹<?php echo $car['rent_per_day']; ?>

                        </p>

                        <form action="book_car.php" method="POST">

                            <input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">

                            <input type="hidden" name="start_date" value="<?php echo $start_date; ?>">

                            <input type="hidden" name="days" value="<?php echo $days; ?>">

                            <button class="btn btn-success w-100">
                                Rent Car
                            </button>

                        </form>

                    </div>
                </div>

            </div>

        <?php } ?>

    </div>

<?php } ?>

<?php include "includes/footer.php"; ?>