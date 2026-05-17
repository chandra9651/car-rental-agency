<?php
include "../config/db.php";
include "../includes/header.php";

$agency = $_SESSION['user_id'];

$sql = "SELECT users.name,cars.model,bookings.start_date,bookings.days

        FROM bookings

        JOIN users ON bookings.customer_id=users.id

        JOIN cars ON bookings.car_id=cars.id

        WHERE cars.agency_id='$agency'";

$result = mysqli_query($conn, $sql);
?>

<h2>Booked Cars</h2>

<table class="table table-bordered">

    <tr>
        <th>Customer</th>
        <th>Car</th>
        <th>Start Date</th>
        <th>Days</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $row['name']; ?></td>

            <td><?php echo $row['model']; ?></td>

            <td><?php echo $row['start_date']; ?></td>

            <td><?php echo $row['days']; ?></td>

        </tr>

    <?php } ?>

</table>

<?php include "../includes/footer.php"; ?>