<?php
include 'koneksiDB.php';

//Total Siswa
$query1 = mysqli_query($koneksi, 
        "SELECT COUNT(*)AS total_siswa 
        FROM students");
$data1 = mysqli_fetch_assoc($query1);

//Total Course
$query2 = mysqli_query($koneksi, 
        "SELECT COUNT(*)AS total_kursus 
        FROM courses");
$data2 = mysqli_fetch_assoc($query2);

//Pemasukan
$query3 = mysqli_query($koneksi, 
        "SELECT SUM(c.price)AS total_biaya
        FROM enrollments e
        JOIN courses c 
        ON e.course_id = c.course_id");
$data3 = mysqli_fetch_assoc($query3);

//Kursus termahal
$query4 = mysqli_query($koneksi, 
        "SELECT MAX(price)AS max_price
        FROM courses");
$data4 = mysqli_fetch_assoc($query4);

//Kursus termurah
$query5 = mysqli_query($koneksi, 
        "SELECT MIN(price)AS min_price
        FROM courses");
$data5 = mysqli_fetch_assoc($query5);

//Kursus terfavorit
$query6 = mysqli_query($koneksi, 
        "SELECT 
            c.course_name,
            c.language,
            COUNT(e.enrollment_id) AS jumlah_pendaftar
        FROM enrollments e
        JOIN courses c 
        ON e.course_id = c.course_id
        GROUP BY e.course_id
        ORDER BY jumlah_pendaftar DESC
        LIMIT 1");
$data6 = mysqli_fetch_assoc($query6);

//Rata-rata Biaya Kursus yang Diambil oleh Siswa
$query7 = mysqli_query($koneksi, 
        "SELECT AVG(c.price)AS avg_price
        FROM enrollments e
        JOIN courses c
        ON e.course_id = c.course_id");
$data7 = mysqli_fetch_assoc($query7);

?>

<h2>Dashboard Data Course</h2>
<ul>
    <li>Total Siswa: <?= $data1['total_siswa'] ?> orang</li>
    <li>Total Kursus: <?= $data2['total_kursus'] ?> kelas</li>
    <li>Total Pemasukan: Rp <?= number_format($data3['total_biaya'], 0, ',', '.') ?></li>
    <li>Harga Kursus Tertinggi: Rp <?= number_format($data4['max_price'], 0, ',', '.') ?></li>
    <li>Harga Kursus Terendah: Rp <?= number_format($data5['min_price'], 0, ',', '.') ?></li>
    <li>Rata-rata Harga Kursus: Rp <?= number_format($data7['avg_price'], 0, ',', '.') ?></li>
    <li>Kursus Terfavorit: <?= $data6['jumlah_pendaftar'] ?></li>

</ul>
