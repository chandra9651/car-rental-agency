<?php
include "includes/header.php";
session_start();
include "config/db.php";

if (isset($_SESSION['role'])) {
    header("Location:/ ");
}

$error = "";

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email == "" || $password == "") {
        $error = "Please fill all fields";
    } else {

        $stmt = $conn->prepare("SELECT id,name,email,password,role FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {

            $user = $result->fetch_assoc();

            /* if using password_hash() */
            if (password_verify($password, $user['password']) || $password == $user['password']) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] == "agency") {

                    header("Location: agency/add_car.php");
                } else {

                    header("Location: available_cars.php");
                }

                exit;
            } else {
                $error = "Invalid password";
            }
        } else {
            $error = "Email not found";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Login - Car Rental</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">

                        <?php if ($error != "") { ?>

                            <div class="alert alert-danger"><?php echo $error; ?></div>

                        <?php } ?>

                        <form method="POST">

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button class="btn btn-primary w-100" name="login">
                                Login
                            </button>

                        </form>

                        <hr>

                        <div class="text-center">

                            <a href="register_customer.php">Customer Register</a>

                            <br>

                            <a href="register_agency.php">Agency Register</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>