<?php
include "../config/connection.php";
session_start();
if (!isset($_SESSION['log_admin'])) {
    header("Location: ../login.php");
}

$delete = mysqli_query($conn, "DELETE FROM movies WHERE id = '" . $_GET['id'] . "'");

if ($delete) {
    header('location:dashboard.php');
} else {
    echo "<script>
            alert('Film Gagal Dihapus!');
            </script>";
}
