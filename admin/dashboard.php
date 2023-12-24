<?php
include "../config/connection.php";
session_start();
if (!isset($_SESSION['log_admin'])) {
    header("Location: ../login.php");
}


$query = mysqli_query($conn, "SELECT * FROM movies");

// Generate QR

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
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <main class="d-flex flex-nowrap">

        <?php include('sidebar.php'); ?>

        <div class="b-example-divider b-example-vr w-100 text-white bg-dark">
            <div class="p-4">


                <div class="d-flex justify-content-between mb-4">
                    <h3>Dashboard</h3>
                    <a href="add-film.php" class="cta-btn btn mt-2 px-4">Tambah Film</a>
                </div>
                <div class="d-flex gap-2 flex-wrap">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="card bg-transparent text-white" style="width: 13rem;">
                        <div style="height: 200px; overflow: hidden">

                            <img src="../assets/img/<?= $row['cover'] ?>" class="card-img-top" alt="..."
                                style="object-fit: cover">
                        </div>
                        <div class="card-body p-0 py-2">
                            <h5 class="card-title"><?= $row['title'] ?></h5>
                            <p class="card-text"><?= $row['sinopsis'] ?></p>

                        </div>
                        <div class="d-flex justify-content-between pt-2">


                            <a href="booking.php?id=<?= $row['id'] ?>" class="btn cta-btn px-4">Pesan</a>
                            <div class="dropdown pe-2">
                                <a href="#"
                                    class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">

                                    <strong>...</strong>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow text-center">
                                    <li> <a href="edit-film.php?id=<?= $row['id'] ?>"
                                            class="btn btn-primary px-4 w-75 mb-2">Edit</a>
                                    </li>
                                    <li> <a href="delete-film.php?id=<?= $row['id'] ?>"
                                            class="btn cta-btn px-4 w-75">Hapus</a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </main>


    <!-- Section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="sidebars.js"></script>
</body>

</html>