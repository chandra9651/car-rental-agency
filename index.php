<?php include "includes/header.php";

if ($_SESSION['role'] == "agency") {
    header("Location: /agency/add_car.php");
}

?>

<!-- HERO SECTION -->

<div class="bg-light p-5 rounded mb-5 text-center">

    <h1 class="display-4">🚗 Car Rental Agency</h1>

    <p class="lead">
        Rent your favorite car easily from trusted rental agencies.
    </p>

    <a href="available_cars.php" class="btn btn-primary btn-lg me-2">
        Browse Cars
    </a>

    <a href="register_customer.php" class="btn btn-success btn-lg me-2">
        Register as Customer
    </a>

    <a href="register_agency.php" class="btn btn-warning btn-lg">
        Register as Agency
    </a>

</div>


<!-- FEATURES SECTION -->

<h2 class="text-center mb-4">Why Choose Our Service?</h2>

<div class="row text-center">

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h4>🚘 Wide Range of Cars</h4>

                <p>
                    Choose from multiple cars provided by different rental agencies.
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h4>⚡ Easy Booking</h4>

                <p>
                    Select your preferred date and rent a car instantly in just a few clicks.
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h4>🏢 Trusted Agencies</h4>

                <p>
                    All cars are listed by verified rental agencies in the system.
                </p>

            </div>

        </div>

    </div>

</div>


<!-- HOW IT WORKS -->

<h2 class="text-center mt-5 mb-4">How It Works</h2>

<div class="row text-center">

    <div class="col-md-4">

        <h5>1️⃣ Register</h5>

        <p>Create a customer account.</p>

    </div>

    <div class="col-md-4">

        <h5>2️⃣ Choose Car</h5>

        <p>Browse available cars and select one.</p>

    </div>

    <div class="col-md-4">

        <h5>3️⃣ Book Instantly</h5>

        <p>Select start date and rental duration.</p>

    </div>

</div>


<!-- CALL TO ACTION -->

<div class="bg-dark text-white text-center p-5 mt-5 rounded">

    <h2>Start Renting Today</h2>

    <p class="mb-4">
        Find the perfect car for your journey.
    </p>

    <a href="available_cars.php" class="btn btn-warning btn-lg">
        View Available Cars
    </a>

</div>


<?php include "includes/footer.php"; ?>