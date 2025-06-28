<?php
include 'koneksiDB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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
        
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .btn-add {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            transition: all 0.3s;
        }
        
        .btn-add:hover {
            background-color: #36c9b7;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table th {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 15px;
        }
        
        .table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .table tr:last-child td {
            border-bottom: none;
        }
        
        .table tr:hover td {
            background-color: rgba(137, 207, 240, 0.1);
        }
        
        .action-buttons a {
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 5px;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .btn-edit {
            background-color: #FFC107;
            color: #212529;
        }
        
        .btn-edit:hover {
            background-color: #e0a800;
            color: white;
        }
        
        .btn-delete {
            background-color: #DC3545;
            color: white;
        }
        
        .btn-delete:hover {
            background-color: #c82333;
        }
        
        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
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
                    <div class="header">
                        <h2><i class="fas fa-users me-2"></i>Daftar Siswa</h2>
                    </div>
                </div>

                <div class="table-container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="tambahSsw.php" class="btn btn-add">
                            <i class="fas fa-plus me-1"></i>Tambah Siswa
                        </a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Siswa</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Email</th>
                                    <th>Nomor Handphone</th>
                                    <th>Tanggal Pendaftaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM students");
                                    while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['student_id'] ?></td>
                                    <td><?php echo $data['student_name'] ?></td>
                                    <td><?php echo $data['email'] ?></td>
                                    <td><?php echo $data['phone_number'] ?></td>
                                    <td><?php echo date('d M Y', strtotime($data['registration_date'])) ?></td>
                                    <td class="action-buttons">
                                        <a href="editSsw.php?id=<?php echo $data['student_id'] ?>" class="btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="hapusSsw.php?id=<?php echo $data['student_id'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin hapus?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>