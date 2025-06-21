<?php
    include 'koneksiDB.php';

?>

<h2>Tambah Instructor</h2>
<hr>
<form action="" method="post">
    <table>
         <tr>
            <td>Instructor ID</td>
            <td>:</td>
            <td><input type="text" name="instructor_id" value=""></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="instructor_name" value=""></td>
        </tr>
        <tr>
            <td>Keahlian</td>
            <td>:</td>
            <td><input type="text" name="expertise" value=""></td>
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
            <td colspan="3" align="center">
                <input type="submit" name="tambah" value="tambah">
            </td>
        </tr>
    </table>
</form>

<?php
    if(isset($_POST['tambah'])){
        $instructor_id = $_POST['instructor_id'];
        $instructor_name = $_POST['instructor_name'];
        $expertise = $_POST['expertise'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];

        $query = "INSERT INTO  instructors(instructor_id,instructor_name,expertise,email,phone_number)
                VALUES ('$instructor_id','$instructor_name','$expertise','$email','$phone_number')";

        if (mysqli_query($koneksi, $query)){
            header("Location: tampilIns.php");
        } else{
            echo "Gagal menambahkan data!";
        }
    }
?> 