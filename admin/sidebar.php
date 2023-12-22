<?php

include "../config/connection.php";

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../login.php");
}

$data_admin = mysqli_query($conn, "SELECT * FROM users WHERE id = '1' ");
$r = mysqli_fetch_array($data_admin);

$username = $r['username'];
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark " style="width: 280px; height: 100vh">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none gap-2">
        <img src="../assets/svg/stik-logo.svg" alt="" width="40px">
        <span class="fs-4">XXVII</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">

        <li>
            <a href="#" class="nav-link text-white active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2" />
                </svg>
                Dashboard
            </a>
        </li>

    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../assets/img/mutsols.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong><?php echo $username ?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">

            <li><a class="dropdown-item" href="../config/logout.php">Sign out</a></li>
        </ul>
    </div>
</div>