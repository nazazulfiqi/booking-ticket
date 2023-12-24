<?php
include "config/connection.php";
$query = mysqli_query($conn, "SELECT * FROM movies");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php include('components/navbar.php'); ?>

    <!-- Hero Section -->
    <section class="bg-dark" style="margin-top: -68px;">
        <div class="container-fluid d-flex  align-items-center"
            style="background-image: url('assets/img/hero-image.jpg'); background-repeat: no-repeat; background-size: cover; height: 100vh">
            <div class="container">
                <div class="row">
                    <div class="col-6 pe-4">
                        <p class="text-white fw-bold" style="font-size: 20px;">Marvel Universe</p>
                        <h1 class="text-white fw-bold" style="font-size: 60px;">Spider-Man: Far For Home</h1>
                        <a href="admin/dashboard.php" class="cta-btn btn  mt-2 px-4">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Hero Section -->

    <!-- Section -->

    <section class="text-white my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-5" style="font-size: 50px;">Now Playing</h1>
                    <div class="d-flex gap-2 flex-wrap">
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card bg-transparent text-white" style="width: 15rem;">
                            <div style="height: 350px; overflow: hidden">

                                <img src="assets/img/<?= $row['cover'] ?>" class="card-img-top" alt="..."
                                    style="object-fit: cover">
                            </div>
                            <div class="card-body p-0 py-2">
                                <h5 class="card-title"><?= $row['title'] ?></h5>

                                <a href="admin/dashboard.php" class="btn cta-btn mt-3 px-4">Watch</a>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>