<?php

include "../config/connection.php";
session_start();
if (!isset($_SESSION['log_admin'])) {
    header("Location: ../login.php");
}

$data_film = mysqli_query($conn, "SELECT * FROM booking WHERE kd_booking = '" . $_GET['kd_booking'] . "'");
$r = mysqli_fetch_array($data_film);

$kode_booking = $r["kd_booking"];
$judul = $r["title"];
$ticket_count = $r["ticket_count"];
$price = $r["price"];

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/form.css">


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center" style="height: 100vh;">

                <div style="width: 400px;" class="bg-warning text-center rounded-2 p-2">

                    <h4>Cinemas XXVII</h4>
                    <hr>
                    <div class="d-flex justify-content-center gap-5 mt-4">
                        <div class="text-start">
                            <h6>Kode Booking : <?= $kode_booking ?> </h6>
                            <h6>Judul Film : <?= $judul ?> </h6>
                            <h6>Jumlah Tiket : <?= $ticket_count ?> </h6>
                            <h6>Total Harga : <?= $price ?> </h6>

                        </div>
                        <div>
                            <img src="../assets//svg//stik-logo.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="sidebars.js"></script>
</body>

</html>