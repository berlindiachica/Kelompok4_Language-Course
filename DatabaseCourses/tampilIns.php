<?php 
    include 'koneksiDB.php';
?>

<h2>Daftar Instructor</h2>
<a href="tambahIns.php">Tambah Instructor</a>
<hr>

<table border="1">
    <tr>
        <th>No.</th>
        <th>Instructor ID</th>
        <th>Nama</th>
        <th>Keahlian</th>
        <th>Email</th>
        <th>Nomor Handphone</th>
        <th>Aksi</th>
    </tr>

    <?php 
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM instructors");
        while ($data = mysqli_fetch_array($query)){
    ?>

    <tr>
        <td><?php echo $no++?></td>
        <td><?php echo $data['instructor_id']?></td>
        <td><?php echo $data['instructor_name']?></td>
        <td><?php echo $data['expertise']?></td>
        <td><?php echo $data['email']?></td>
        <td><?php echo $data['phone_number']?></td>
        <td>
            <a href="editIns.php?id=<?php echo $data['instructor_id']?>">Edit</a>
            <a href="hapusIns.php?id=<?php echo $data['instructor_id']?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>

        </td>
    </tr>

    <?php } ?>
</table>