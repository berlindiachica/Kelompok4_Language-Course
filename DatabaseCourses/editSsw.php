<?php
    include 'koneksiDB.php';

    $id=$_GET['id'];
    $query= mysqli_query($koneksi,
    "SELECT*FROM courses WHERE ID ='$id'");
    $data=mysqli_fetch_array($query);

?>

<h2>Update Data Siswa</h2>
<hr>
<form action="" method="post">
    <table>
        <tr>
            <td>ID/td>
            <td>:</td>
            <td><input type="text" name="student_id" value="<?php echo $data['student_id'] ?>"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="student_name" value="<?php echo $data['student_name'] ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="email" name="email" value="<?php echo $data['email'] ?>"></td>
        </tr>
        <tr>
            <td>Nomor HP</td>
            <td>:</td>
            <td><input type="number" name="phone_number" value="<?php echo $data['phone_number'] ?>"></td>
        </tr>
        <tr>
            <td>Tanggal Pendaftaran</td>
            <td>:</td>
            <td><input type="date" name="registration_date" value="<?php echo $data['registration_date'] ?>"></td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" name="update" value="Update Data">
            </td>
        </tr>
    </table>
</form>

<?php 
    if(isset($_POST['update'])){
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $registration_date = $_POST['registration_date'];

        $query = "UPDATE courses SET student_id ='$student_id',student_name = '$student_name',
                    email = '$email', phone_number = '$phone_number', registration_date = '$registration_date'
                    WHERE ID = '$id'";

        if (mysqli_query($koneksi, $query)){
            header("Location: tampilSsw.php");
        } else{
            echo "Gagal Update Data!";
        }
    }
?>