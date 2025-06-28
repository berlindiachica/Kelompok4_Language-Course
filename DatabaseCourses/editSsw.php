<?php
    include 'koneksiDB.php';

    $id=$_GET['id'];

    if(isset($_POST['update'])){
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $registration_date = $_POST['registration_date'];

        $query = "UPDATE students SET student_id ='$student_id',student_name = '$student_name',
                    email = '$email', phone_number = '$phone_number', registration_date = '$registration_date'
                    WHERE student_id = '$id'";

            if (mysqli_query($koneksi, $query)){
                header("Location: tampilSsw.php");
            } else{
                echo "Gagal Update Data!";
            }
    }

    $query= mysqli_query($koneksi,
    "SELECT*FROM students WHERE student_id ='$id'");
    $data=mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #89CFF0; /* Biru muda */
            --secondary-color: #40E0D0; /* Tosca */
            --dark-color: #2C3E50;
            --light-color: #F8F9FA;
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .sidebar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar .nav-link {
            color: white;
            margin: 5px 0;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateX(5px);
        }
        
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.3);
            font-weight: bold;
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        
        .main-content {
            padding: 20px;
        }
        
        .header-card {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(137, 207, 240, 0.25);
        }
        
        .btn-submit {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-submit:hover {
            background-color: #36c9b7;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-back {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }
        
        .btn-back:hover {
            background-color: #5a6268;
            color: white;
        }
        
        .error-message {
            color: #dc3545;
            margin-top: 10px;
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse bg-primary">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="tampilSsw.php">
                                <i class="fas fa-users"></i> Manajemen Siswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tampilIns.php">
                                <i class="fas fa-chalkboard-teacher"></i> Manajemen Instruktur
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tampilCourse.php">
                                <i class="fas fa-book"></i> Manajemen Kursus
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="dasboard.php">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <div class="header-card">
                        <h2><i class="fas fa-user-plus me-2"></i>Update Data Siswa</h2>
                    </div>
                </div>

                <div class="form-container">
                    <form action="" method="post">
                        <div class="mb-4">
                            <label for="student_id" class="form-label">ID Siswa</label>
                            <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo $data['student_id'] ?>" required>
                        </div>
                        <div class="mb-4">
                            <label for="student_name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $data['student_name'] ?>" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone_number" class="form-label">Nomor HP</label>
                            <input type="number" class="form-control" id="phone_number" name="phone_number" value="<?php echo $data['phone_number'] ?>" required>
                        </div>
                        <div class="mb-4">
                            <label for="registration_date" class="form-label">Tanggal Pendaftaran</label>
                            <input type="date" class="form-control" id="registration_date" name="registration_date" value="<?php echo $data['registration_date'] ?>" required>
                        </div>
                        <div class="d-flex justify-content-between mt-5">
                            <a href="tampilSsw.php" class="btn-back">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" name="update" class="btn-submit">
                                <i type="submit" name="update" class="fas fa-save me-1"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
                <?php if(isset($error_message)): ?>
                            <div class="error-message text-center mt-3">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
