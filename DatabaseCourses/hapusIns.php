<?php
    include 'koneksiDB.php';

    $id = $_GET['id'];

    $query = "DELETE FROM courses WHERE ID = '$id'";
    if (mysqli_query($koneksi, $query)){
        header("Location: tampilIns.php");
    }else {
        echo "Gagal Menghapus data!";
    }
?>