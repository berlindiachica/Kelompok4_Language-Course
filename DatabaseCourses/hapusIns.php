<?php
    include 'koneksiDB.php';

    $id = $_GET['id'];

    $query = "DELETE FROM instructors WHERE instructor_id = '$id'";
    if (mysqli_query($koneksi, $query)){
        header("Location: tampilIns.php");
    }else {
        echo "Gagal Menghapus data!";
    }
?>