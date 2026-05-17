<?php
include "../config/db.php";
include "../includes/header.php";
if ($_SESSION['role'] !== "agency") {
    header("Location: /");
}
$agency_id = $_SESSION['user_id'];

$sql = "SELECT * FROM cars WHERE agency_id='$agency_id'";
$result = mysqli_query($conn, $sql);
?>

<h2>My Cars</h2>

<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Vehicle No</th>
        <th>Seats</th>
        <th>Rent/Day</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo $row['model']; ?></td>

            <td><?php echo $row['vehicle_number']; ?></td>

            <td><?php echo $row['seating_capacity']; ?></td>

            <td><?php echo $row['rent_per_day']; ?></td>

            <td>
                <a href="edit_car.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                    Edit
                </a>
            </td>

        </tr>

    <?php } ?>

</table>

<?php include "../includes/footer.php"; ?>