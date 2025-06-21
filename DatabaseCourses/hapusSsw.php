<?php
    include 'koneksiDB.php';

    $id = $_GET['id'];

    $query = "DELETE FROM students WHERE student_id = '$id'";
    if (mysqli_query($koneksi, $query)){
        header("Location: tampilSsw.php");
    }else {
        echo "Gagal Menghapus data!";
    }
?>