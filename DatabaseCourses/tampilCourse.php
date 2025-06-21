<?php 
    include 'koneksiDB.php';
?>

<h2>Course</h2>
<hr>

<table border="1">
    <tr>
        <th>No.</th>
        <th>Course ID</th>
        <th>Nama Kursus</th>
        <th>Bahasa</th>
        <th>Tingkatan</th>
        <th>Harga</th>
    </tr>

    <?php 
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM courses");
        while ($data = mysqli_fetch_array($query)){
    ?>

    <tr>
        <td><?php echo $no++?></td>
        <td><?php echo $data['course_id']?></td>
        <td><?php echo $data['course_name']?></td>
        <td><?php echo $data['language']?></td>
        <td><?php echo $data['level']?></td>
        <td><?php echo $data['price']?></td>
    </tr>

    <?php } ?>
</table>