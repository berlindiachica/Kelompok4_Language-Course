<?php
    include 'koneksiDB.php';

?>

<h2>Tambah Siswa</h2>
<hr>
<form action="" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><input type="text" name="nim"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><input type="text" name="kelas"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" name="tambah" value="tambah">
            </td>
        </tr>
    </table>
</form>

<?php
    if(isset($_POST['tambah'])){
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $kelas = $_POST['kelas'];
        $username = $_POST['username'];
        $password = MD5($_POST['password']);

        $query = "INSERT INTO  courses(nama,nim,kelas,username,password)
                VALUES ('$nama','$nim','$kelas','$username','$password')";

        if (mysqli_query($koneksi, $query)){
            header("Location: tampilMhs.php");
        } else{
            echo "Gagal menambahkan data!";
        }
    }
?> 