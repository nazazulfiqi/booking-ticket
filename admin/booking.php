<?php

include "../config/connection.php";
session_start();
if (!isset($_SESSION['log_admin'])) {
    header("Location: ../login.php");
}

$harga_tiket = 50000;

$data_film = mysqli_query($conn, "SELECT * FROM movies WHERE id = '" . $_GET['id'] . "'");
$r = mysqli_fetch_array($data_film);

$judul = $r["title"];



$sql = mysqli_query($conn, "select max(id) as maxID from booking");
$data = mysqli_fetch_array($sql);

$kode = $data['maxID'];

$kode++;
$ket = "BOOK";
$kodeauto = $ket . sprintf("%03s", $kode);

if (isset($_POST['tambah'])) {
    $booking_code = $_POST['kode'];
    $judul = $_POST['title'];
    $ticket_count = $_POST['ticket_count'];
    $price = $_POST['price'];


    $query = "INSERT INTO booking (id, kd_booking, title, ticket_count, price) VALUES ('', '$booking_code', '$judul', '$ticket_count', '$price' )";

    $query_update = "UPDATE movies SET seat = seat - '$ticket_count' WHERE title = '$judul'";

    $tambah = mysqli_query($conn, $query);
    $update = mysqli_query($conn, $query_update);

    if (!$tambah) {
        echo "Lukisan Gagal Ditambahkan!";
    } else {
        echo "<script>
      alert('Tiket Berhasil Di Pesan!');
      window.location = 'ticket.php?kd_booking=$booking_code';
      </script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/form.css">

    <script>
        function updateTotalPrice() {
            var ticketCount = document.getElementById("ticket_count").value;
            var hargaTiket = <?php echo $harga_tiket; ?>; // Fetch PHP variable in JavaScript
            var totalPrice = ticketCount * hargaTiket;

            // Update the total price input field
            document.getElementById("price").value = totalPrice;
        }
    </script>
</head>

<body>
    <main class="d-flex flex-nowrap">

        <?php include('sidebar.php'); ?>

        <div class="b-example-divider b-example-vr w-100 text-white bg-dark">
            <div class="p-4">

                <div class="container container-tambah">
                    <div class="d-flex justify-content-between">
                        <div class="title">Booking</div>
                        <a href="dashboard.php" class="btn btn-dark">Back</a>
                    </div>
                    <div class="content">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="user-details">


                                <div class="input-box">
                                    <span class="details">Kode</span>
                                    <input type="text" placeholder="Masukkan kode patung" name="kode" required value="<?= $kodeauto ?>" readonly>
                                </div>
                                <div class="input-box">
                                    <span class="details">Judul</span>
                                    <input type="text" placeholder="Masukkan judul patung" name="title" required value="<?= $judul ?>" readonly>
                                </div>

                                <div class=" input-box">
                                    <span class="details">Jumlah Tiket</span>
                                    <input type="number" placeholder="Masukkan Jumlah Tiket" name="ticket_count" id="ticket_count" required oninput="updateTotalPrice()">
                                </div>
                                <div class=" input-box">
                                    <span class="details">Total Harga</span>
                                    <input type="text" placeholder="Total Harga" name="price" id="price" readonly required>
                                </div>

                            </div>

                            <div class="button">
                                <input type="submit" value="Booking" class="bg-dark" name="tambah">
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