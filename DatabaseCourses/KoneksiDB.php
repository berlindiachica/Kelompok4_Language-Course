<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "courses";

    $koneksi = new mysqli($hostname, username: $username, password: $password, database:$database );

    if ($koneksi->connect_error) {
        die("Koneksi Gagal");

    }else{
        echo "Koneksi Berhasil";
    }
?>