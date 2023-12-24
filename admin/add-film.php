<?php

include "../config/connection.php";
session_start();
if (!isset($_SESSION['log_admin'])) {
    header("Location: ../login.php");
}

$sql = mysqli_query($conn, "select max(id) as maxID from movies");
$data = mysqli_fetch_array($sql);

$kode = $data['maxID'];

$kode++;
$ket = "FILM";
$kodeauto = $ket . sprintf("%03s", $kode);

if (isset($_POST['tambah'])) {
    $namafile = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../assets/img/';
    $kode_film = $_POST['kode'];
    $judul = $_POST['title'];
    $sinopsis = $_POST['sinopsis'];
    $seat = $_POST['seat'];
    $genre = $_POST['genre'];


    move_uploaded_file($source, $folder . $namafile);

    $query = "INSERT INTO movies (id, cover, kd_film, title, sinopsis, seat, genre) VALUES ('', '$namafile', '$kode_film', '$judul', '$sinopsis', '$seat', '$genre' )";

    $tambah = mysqli_query($conn, $query);

    if (!$tambah) {
        echo "Lukisan Gagal Ditambahkan!";
    } else {
        echo "<script>
      alert('Film Berhasil Di Tambahkan!');
      window.location = 'dashboard.php';
      </script>";
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
                        <div class="title">Tambah Film</div>
                        <a href="dashboard.php" class="btn btn-dark">Back</a>
                    </div>
                    <div class="content">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="user-details">

                                <div class="col-md-5">
                                    <span class="details">Cover</span>
                                    <input class="form-control" type="file" id="formFile" name="gambar" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Kode</span>
                                    <input type="text" placeholder="Masukkan Kode Film" name="kode" required value="<?= $kodeauto ?>" readonly>
                                </div>
                                <div class="input-box">
                                    <span class="details">Judul</span>
                                    <input type="text" placeholder="Masukkan Judul Film" name="title" required>
                                </div>

                                <div class=" input-box">
                                    <span class="details">Sinopsis</span>
                                    <input type="text" placeholder="Masukkan Sinopsis" name="sinopsis" required>
                                </div>
                                <div class=" input-box">
                                    <span class="details">Seat Available</span>
                                    <input type="number" placeholder="Masukkan Jumlah Kursi" name="seat" required>
                                </div>
                                <div class=" input-box">
                                    <span class="details">Genre</span>
                                    <input type="text" placeholder="Masukkan Genre" name="genre" required>
                                </div>

                            </div>

                            <div class="button">
                                <input type="submit" value="Tambah" class="bg-dark" name="tambah">
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