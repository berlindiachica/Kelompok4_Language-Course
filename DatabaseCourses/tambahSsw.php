<?php
    include 'koneksiDB.php';

?>

<h2>Tambah Siswa</h2>
<hr>
<form action="" method="post">
    <table>
        <tr>
            <td>ID Siswa</td>
            <td>:</td>
            <td><input type="text" name="student_id"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="student_name" value=""></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="email" name="email" value=""></td>
        </tr>
        <tr>
            <td>Nomor HP</td>
            <td>:</td>
            <td><input type="number" name="phone_number" value=""></td>
        </tr>
        <tr>
            <td>Tanggal Pendaftaran</td>
            <td>:</td>
            <td><input type="date" name="registration_date" value=""></td>
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
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $registration_date = $_POST['registration_date'];

        $query = "INSERT INTO  students(student_id,student_name,email,phone_number,registration_date)
                VALUES ('$student_id','$student_name','$email','$phone_number','$registration_date')";

        if (mysqli_query($koneksi, $query)){
            header("Location: tampilSsw.php");
        } else{
            echo "Gagal Update Data!";
        }
    }
?>