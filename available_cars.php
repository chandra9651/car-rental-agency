<?php
include "config/db.php";
include "includes/header.php";

if ($_SESSION['role'] == "agency") {
    header("Location: /agency/add_car.php");
}

$sql = "SELECT * FROM cars";
$result = mysqli_query($conn, $sql);
?>

<?php

if (isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}

?>

<h2 class="mb-4">Available Cars</h2>

<div class="row">

    <?php while ($car = mysqli_fetch_assoc($result)) {

        $customer_id = $_SESSION['user_id'];
        $check = "SELECT * FROM bookings 
          WHERE car_id='{$car['id']}' 
          AND customer_id='$customer_id'";

        $booking_result = mysqli_query($conn, $check);

        $isBooked = mysqli_num_rows($booking_result);
    ?>

        <div class="col-md-4 mb-4">

            <div class="card shadow-sm">
                <div class="card-body">

                    <h5 class="card-title"><?php echo $car['model']; ?></h5>

                    <p class="card-text">

                        <b>Vehicle No:</b> <?php echo $car['vehicle_number']; ?><br>

                        <b>Seats:</b> <?php echo $car['seating_capacity']; ?><br>

                        <b>Rent Per Day:</b> ₹<?php echo $car['rent_per_day']; ?>

                    </p>

                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == "customer") {
                    ?>

                        <form action="book_car.php" method="POST">

                            <input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">

                            <div class="mb-2">

                                <label>Start Date</label>

                                <input type="date" name="start_date" class="form-control" required>

                            </div>

                            <div class="mb-2">

                                <label>Days</label>

                                <select name="days" class="form-control">

                                    <option value="1">1 Day</option>
                                    <option value="2">2 Days</option>
                                    <option value="3">3 Days</option>
                                    <option value="4">4 Days</option>
                                    <option value="5">5 Days</option>

                                </select>

                            </div>

                            <!-- <button class="btn btn-success w-100"> -->
                            <?php if ($isBooked) { ?>
                                <a href="cancel_booking.php?car_id=<?php echo $car['id']; ?>"
                                    class="btn btn-danger w-100">
                                    Cancel Booking
                                </a>
                            <?php } else { ?>
                                <button class="btn btn-success w-100">
                                    Rent Car
                                </button>
                            <?php } ?>
                            <!-- </button> -->

                        </form>

                    <?php
                    } else {
                    ?>

                        <a href="login.php" class="btn btn-primary w-100">
                            Rent
                        </a>

                    <?php } ?>

                </div>

            </div>

        </div>

    <?php } ?>

</div>

<?php include "includes/footer.php"; ?>