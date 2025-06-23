<?php
include 'koneksiDB.php';

$query = mysqli_query($koneksi, "SELECT NEXTVAL(seq_student_id) AS next_id");
$data = mysqli_fetch_assoc($query);
echo "ID siswa berikutnya adalah: " . $data['next_id'];
?>
