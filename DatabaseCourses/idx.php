<?php
include 'koneksiDB.php';

$query = mysqli_query($koneksi, "SHOW INDEX FROM students");
?>

<h2>Index pada Tabel Students</h2>
<table border="1">
    <tr>
        <th>Key Name</th><th>Column Name</th><th>Unique</th><th>Index Type</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?= $row['Key_name'] ?></td>
        <td><?= $row['Column_name'] ?></td>
        <td><?= $row['Non_unique'] == 0 ? 'Yes' : 'No' ?></td>
        <td><?= $row['Index_type'] ?></td>
    </tr>
    <?php } ?>
</table>
