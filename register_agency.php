<?php
include "config/db.php";
include "includes/header.php";

if (isset($_SESSION['role'])) {
    header("Location:/ ");
}

$msg = "";

if (isset($_POST['register'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($name == "" || $email == "" || $password == "") {

        $msg = "<div class='alert alert-danger'>All fields are required</div>";
    } else {

        $sql = "INSERT INTO users(name,email,password,role)
                VALUES('$name','$email','$password','agency')";

        if (mysqli_query($conn, $sql)) {
            // $msg = "<div class='alert alert-success'>Agency Registered Successfully</div>";

            // Redirect to login page
            header("Location: login.php");
            exit();
        } else {
            $msg = "<div class='alert alert-danger'>Registration Failed</div>";
        }
    }
}
?>

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center">
                <h4>Agency Registration</h4>
            </div>

            <div class="card-body">

                <?php echo $msg; ?>

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">Agency Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter agency name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>

                    <button class="btn btn-success w-100" name="register">
                        Register Agency
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php include "includes/footer.php"; ?>