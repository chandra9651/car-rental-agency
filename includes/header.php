<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <title>Car Rental Agency</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">

</head>

<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">

        <div class="container">

            <a class="navbar-brand" href="/"> 🚗 Car Rental</a>
            <div>
                <span class="text-light"> <?php echo $_SESSION['user_name']; ?> </span>
                <span class="text-warning"> <?php if ($_SESSION['role'] == 'agency')  echo " - Agency" ?> </span>
            </div>
            <?php if ($_SESSION['role'] != 'agency') { ?>
                <a class="btn btn-light me-2" href="/search_cars.php"> Smart Search <i class="bi bi-search-heart text-success"></i></a>
            <?php } ?>
            <div>

                <?php if ($_SESSION['role'] == 'agency') { ?>
                    <a class="btn btn-light me-2" href="/agency/add_car.php">Add New Car</a>
                    <a class="btn btn-light me-2" href="/agency/my_cars.php">My Car</a>
                    <a class="btn btn-light me-2" href="/agency/view_bookings.php"> View Bookings</a>

                <?php } else { ?>
                    <?php if ($_SESSION['role'] == 'customer') { ?>
                        <a class="btn btn-success me-2" href="/my_bookings.php"> My Booking</a>
                    <?php } ?>
                    <a class="btn btn-light me-2" href="/available_cars.php"> Browse Cars</a>
                <?php } ?>

                <?php if (!isset($_SESSION['user_id'])) { ?>

                    <a class="btn btn-success me-2" href="/login.php">Login</a>

                <?php } else { ?>

                    <a class="btn btn-danger" href="/logout.php">Logout</a>

                <?php } ?>

            </div>

        </div>

    </nav>

    <div class="container mt-4">