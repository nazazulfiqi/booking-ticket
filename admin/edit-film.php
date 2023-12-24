<?php

include "../config/connection.php";
session_start();
if (!isset($_SESSION['log_admin'])) {
    header("Location: ../login.php");
}

$data_film = mysqli_query($conn, "SELECT * FROM movies WHERE id = '" . $_GET['id'] . "'");
$r = mysqli_fetch_array($data_film);

$gambar = $r["cover"];
$judul = $r["title"];
$kode_film = $r["kd_film"];
$sinopsis = $r["sinopsis"];
$seat = $r["seat"];
$genre = $r["genre"];



if (isset($_POST['edit'])) {
    $namafile = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../assets/img/';
    $kode_film = $_POST['kode'];
    $judul = $_POST['title'];
    $sinopsis = $_POST['sinopsis'];
    $seat = $_POST['seat'];
    $genre = $_POST['genre'];

    if ($namafile != '') {
        move_uploaded_file($source, $folder . $namafile);
        $update = mysqli_query($conn, "UPDATE movies SET cover = '$namafile', kd_film = '$kode_film', title = '$judul', sinopsis = '$sinopsis', seat = '$seat', genre = '$genre' WHERE id = '" . $_GET['id'] . "'");
        if (!$update) {
            echo "<script>
            alert('Film Gagal Diubah!');
        
            </script>";
        } else {
            echo "<script>
            alert('Film Berhasil Diubah!');
            window.location = 'dashboard.php';
            </script>";
        }
    } else {
        $update = mysqli_query($conn, "UPDATE movies SET kd_film = '$kode_film', title = '$judul', sinopsis = '$sinopsis', seat = '$seat', genre = '$genre' WHERE id = '" . $_GET['id'] . "'");
        if (!$update) {
            echo "<script>
            alert('Film Gagal Diubah!');
        
            </script>";
        } else {
            echo "<script>
            alert('Film Berhasil Diubah!');
            window.location = 'dashboard.php';
            </script>";
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
    <main class="d-flex flex-nowrap">

        <?php include('sidebar.php'); ?>

        <div class="b-example-divider b-example-vr w-100 text-white bg-dark">
            <div class="p-4">

                <div class="container container-tambah">
                    <div class="d-flex justify-content-between">
                        <div class="title">Edit Film</div>
                        <a href="dashboard.php" class="btn btn-dark">Back</a>
                    </div>
                    <div class="content">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-5">
                                <span class="details"></span>
                                <img src="../assets/img/<?= $gambar ?>" alt="" width="100px" height="100px">
                            </div>
                            <div class="user-details">

                                <div class="col-md-5">
                                    <span class="details">Cover</span>
                                    <input class="form-control" type="file" id="formFile" name="gambar">
                                </div>
                                <div class="input-box">
                                    <span class="details">Kode</span>
                                    <input type="text" placeholder="Masukkan Kode Film" name="kode" required value="<?= $kode_film ?>" readonly>
                                </div>
                                <div class="input-box">
                                    <span class="details">Judul</span>
                                    <input type="text" placeholder="Masukkan Judul Film" name="title" required value="<?= $judul ?>">
                                </div>

                                <div class=" input-box">
                                    <span class="details">Sinopsis</span>
                                    <input type="text" placeholder="Masukkan Sinopsis" name="sinopsis" required value="<?= $sinopsis ?>">
                                </div>
                                <div class=" input-box">
                                    <span class="details">Seat Available</span>
                                    <input type="number" placeholder="Masukkan Jumlah Kursi" name="seat" required value="<?= $seat ?>">
                                </div>
                                <div class=" input-box">
                                    <span class="details">Genre</span>
                                    <input type="text" placeholder="Masukkan Jumlah Kursi" name="genre" required value="<?= $genre ?>">
                                </div>

                            </div>

                            <div class="button">
                                <input type="submit" value="Edit" class="bg-dark" name="edit">
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>

    </main>


    <!-- Section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="sidebars.js"></script>
</body>

</html>