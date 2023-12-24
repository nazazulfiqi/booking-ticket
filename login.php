<?php
session_start();
include "config/connection.php";

// jika tombol login ditekan
if (isset($_POST['submit'])) {
    // tangkap data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek apakah username ada
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]) {

            // cek role nya
            if ($row['role'] == "ADMIN" || $row['role'] == "admin") {
                $_SESSION['log_admin'] = true;
                header("Location: admin/dashboard.php");
                exit;
            }
        }
    }
    $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="css/auth.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100" ">
        <!----------------------- Login Container -------------------------->
        <div class=" row border rounded-5 p-3 shadow box-area text-white" style="background-color: #000;">
        <!--------------------------- Left Box ----------------------------->
        <div class=" col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
            <div class="featured-image mb-2 text-center d-flex align-items-center justify-content-center d-lg-block">
                <img src="assets/svg/stik-logo.svg" class="col-lg-8 col-3 me-2 me-lg-0" width="300px" height="300px">

            </div>

        </div>
        <!-------------------- ------ Right Box ---------------------------->

        <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-4">
                    <h2>Login</h2>

                </div>

                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username"
                            name="username" required>
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password"
                            name="password" id="inputPassword" required>

                    </div>
                    <div class="input-group my-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck" onclick="tampilkanSandi()">
                            <label for="formCheck" class="form-check-label text-secondary"><small
                                    class="text-white">Show Password</small></label>
                        </div>

                    </div>
                    <div class="input-group mb-3">

                        <button class="btn-brand btn btn-lg btn-primary w-100 fs-6" name="submit">Login</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <script>
    function tampilkanSandi() {
        var x = document.getElementById("inputPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>