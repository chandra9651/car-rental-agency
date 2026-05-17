<?php
include "config/db.php";
include "includes/header.php";

$customer_id = $_SESSION['user_id'];

$sql = "SELECT bookings.*, cars.model, cars.vehicle_number, cars.rent_per_day
        FROM bookings
        JOIN cars ON bookings.car_id = cars.id
        WHERE bookings.customer_id='$customer_id'
        ORDER BY bookings.id DESC";

$result = mysqli_query($conn, $sql);
?>

<h2 class="mb-4">My Bookings</h2>

<table class="table table-bordered table-striped">

    <tr>
        <th>Car Model</th>
        <th>Vehicle Number</th>
        <th>Start Date</th>
        <th>Days</th>
        <th>Rent/Day</th>
        <th>Total Rent</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row['model']; ?></td>

            <td><?php echo $row['vehicle_number']; ?></td>

            <td><?php echo $row['start_date']; ?></td>

            <td><?php echo $row['days']; ?></td>

            <td>₹<?php echo $row['rent_per_day']; ?></td>

            <td>₹<?php echo $row['days'] * $row['rent_per_day']; ?></td>

            <td>
                <a href="cancel_booking.php?car_id=<?php echo $row['car_id']; ?>"
                    class="btn btn-danger btn-sm">
                    Cancel
                </a>
            </td>

        </tr>

    <?php } ?>

</table>

<?php include "includes/footer.php"; ?>