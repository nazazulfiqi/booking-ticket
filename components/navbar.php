<?php
include "config/connection.php";
session_start();
?>

<nav class="navbar navbar-expand-lg bg-transparant text-white">
    <div class="container ">
        <a class="navbar-brand d-flex" href="user.php">
            <img src="assets/svg/stik-logo.svg" alt="Bootstrap" width="35" height="35">
            <h3 class="ms-2 text-white">XXVII</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            if (isset($_SESSION['log_admin'])) {
                echo '
                <div class="dropdown-center ms-auto">
                    <a class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/img/mutsols.jpg" alt="profile-picture" width="30" height="30" class="rounded-circle" style="object-fit: cover;">
                        <span class="ms-2 text-white">Muthia Solikin</span>
                    </a>
                    <ul class="dropdown-menu">
                    
                        <li><a class="dropdown-item" href="config/logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>
                    </ul>
                </div>
                ';
            } else {
                // Display elements for users who are not logged in
                echo '
                <ul class="navbar-nav ms-auto">
                <a href="login.php" class="cta-btn btn  mt-2 px-4">Book Now</a>
                </ul>
                ';
            }
            ?>
        </div>
    </div>
</nav>