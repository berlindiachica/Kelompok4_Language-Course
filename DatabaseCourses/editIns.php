<?php
    include 'koneksiDB.php';

    $id=$_GET['id'];
    $query= mysqli_query($koneksi,
    "SELECT*FROM courses WHERE ID ='$id'");
    $data=mysqli_fetch_array($query);

?>

<h2>Update Data Instructor</h2>
<hr>
<form action="" method="post">
    <table>
        <tr>
            <td>ID/td>
            <td>:</td>
            <td><input type="text" name="instructor_id" value="<?php echo $data['instructor_id'] ?>"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="instructor_name" value="<?php echo $data['instructor_name'] ?>"></td>
        </tr>
        <tr>
            <td>Keahlian</td>
            <td>:</td>
            <td><input type="text" name="expertise" value="<?php echo $data['expertise'] ?>"></td>
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
            <td colspan="3" align="center">
                <input type="submit" name="update" value="Update Data">
            </td>
        </tr>
    </table>
</form>

<?php 
    if(isset($_POST['update'])){
        $instructor_id = $_POST['instructor_id'];
        $instructor_name = $_POST['instructor_name'];
        $expertise = $_POST['expertise'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];

        $query = "UPDATE courses SET instructor_id ='$instructor_id',instructor_name = '$instructor_name',
                    expertise = '$expertise', email = '$email', phone_number = '$phone_number'
                    WHERE ID = '$id'";

        if (mysqli_query($koneksi, $query)){
            header("Location: tampilIns.php");
        } else{
            echo "Gagal Update Data!";
        }
    }
?>