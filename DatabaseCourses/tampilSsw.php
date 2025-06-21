<?php 
    include 'koneksiDB.php';
?>

<h2>Daftar Siswa</h2>
<a href="tambahSsw.php">Tambah Siswa</a>
<hr>

<table border="1">
    <tr>
        <th>No.</th>
        <th>ID Siswa</th>
        <th>Nama Mahasiswa</th>
        <th>Email</th>
        <th>Nomor Handphone</th>
        <th>Tanggal Pendaftaran</th>
        <th>Aksi</th>
    </tr>

    <?php 
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM students");
        while ($data = mysqli_fetch_array($query)){
    ?>

    <tr>
        <td><?php echo $no++?></td>
        <td><?php echo $data['student_id']?></td>
        <td><?php echo $data['student_name']?></td>
        <td><?php echo $data['email']?></td>
        <td><?php echo $data['phone_number']?></td>
        <td><?php echo $data['registration_date']?></td>
        <td>
            <a href="editSsw.php?id=<?php echo $data['student_id']?>">Edit</a>
            <a href="hapusSsw.php?id=<?php echo $data['student_id']?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>

        </td>
    </tr>

    <?php } ?>
</table>