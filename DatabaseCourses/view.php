<?php
include 'koneksiDB.php';

$query = mysqli_query($koneksi, "SELECT * FROM view_enrollments_detail");
?>

<h2>Data Pendaftaran Kursus</h2>
<table border="1">
    <tr>
        <th>ID</th><th>Nama Siswa</th><th>Kursus</th><th>Instruktur</th><th>Status</th><th>Tanggal</th>
    </tr>
    <?php while ($data = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?= $data['enrollment_id'] ?></td>
        <td><?= $data['student_name'] ?></td>
        <td><?= $data['course_name'] ?></td>
        <td><?= $data['instructor_name'] ?></td>
        <td><?= $data['status'] ?></td>
        <td><?= $data['enrollment_date'] ?></td>
    </tr>
    <?php } ?>
</table>
