<?php
include 'koneksiDB.php';

$status_filter = isset($_POST['status']) ? $_POST['status'] : '';

//Total Siswa
$query1 = mysqli_query($koneksi, 
        "SELECT COUNT(*)AS total_siswa 
        FROM students");
$data1 = mysqli_fetch_assoc($query1);

//Total Course
$query2 = mysqli_query($koneksi, 
        "SELECT COUNT(*)AS total_kursus 
        FROM courses");
$data2 = mysqli_fetch_assoc($query2);

//Pemasukan
$query3 = mysqli_query($koneksi, 
        "SELECT SUM(c.price)AS total_biaya
        FROM enrollments e
        JOIN courses c 
        ON e.course_id = c.course_id");
$data3 = mysqli_fetch_assoc($query3);

//Kursus termahal
$query4 = mysqli_query($koneksi, 
        "SELECT MAX(price)AS max_price
        FROM courses");
$data4 = mysqli_fetch_assoc($query4);

//Kursus termurah
$query5 = mysqli_query($koneksi, 
        "SELECT MIN(price)AS min_price
        FROM courses");
$data5 = mysqli_fetch_assoc($query5);


//Rata-rata Biaya Kursus yang Diambil oleh Siswa
$query6 = mysqli_query($koneksi, 
        "SELECT AVG(c.price)AS avg_price
        FROM enrollments e
        JOIN courses c
        ON e.course_id = c.course_id");
$data6 = mysqli_fetch_assoc($query6);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            border-radius: 10px 10px 0 0 !important;
            font-weight: bold;
        }
        
        .bg-primary-light {
            background-color: var(--primary-color);
            color: white;
        }
        
        .bg-secondary-light {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .stat-card {
            border-left: 5px solid;
            border-radius: 5px;
        }
        
        .stat-card.primary {
            border-left-color: var(--primary-color);
        }
        
        .stat-card.secondary {
            border-left-color: var(--secondary-color);
        }
        
        .stat-card .stat-value {
            font-size: 24px;
            font-weight: bold;
        }
        
        .stat-card .stat-label {
            font-size: 14px;
            color: #6c757d;
        }
        
        .navbar-brand {
            font-weight: bold;
            color: var(--dark-color) !important;
        }
        
        .welcome-card {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 10px;
        }
        
        .table th {
            background-color: var(--primary-color);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse bg-primary">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tampilSsw.php">
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
                        <li class="nav-item">
                            <a class="nav-link" href="view.php">
                                <i class="fas fa-clipboard-list"></i> Data Pendaftaran
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="#">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><i class="fas fa-tachometer-alt me-2"></i>Dashboard Admin</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            <?php echo date('d F Y'); ?>
                        </button>
                    </div>
                </div>

                <!-- Welcome Card -->
                <div class="welcome-card p-4 mb-4">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Selamat Datang, Admin!</h3>
                            <p class="mb-0">Berikut adalah ringkasan statistik sistem kursus Anda.</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <i class="fas fa-chart-line fa-4x opacity-50"></i>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card stat-card primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="stat-value"><?= $data1['total_siswa'] ?></div>
                                        <div class="stat-label">Total Siswa</div>
                                    </div>
                                    <i class="fas fa-users fa-3x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card stat-card secondary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="stat-value"><?= $data2['total_kursus'] ?></div>
                                        <div class="stat-label">Total Kursus</div>
                                    </div>
                                    <i class="fas fa-book fa-3x text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card stat-card primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="stat-value">Rp <?= number_format($data3['total_biaya'], 0, ',', '.') ?></div>
                                        <div class="stat-label">Total Pemasukan</div>
                                    </div>
                                    <i class="fas fa-money-bill-wave fa-3x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Row Stats -->
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="card stat-card secondary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="stat-value">Rp <?= number_format($data4['max_price'], 0, ',', '.') ?></div>
                                        <div class="stat-label">Kursus Termahal</div>
                                    </div>
                                    <i class="fas fa-arrow-up fa-3x text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card stat-card primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="stat-value">Rp <?= number_format($data5['min_price'], 0, ',', '.') ?></div>
                                        <div class="stat-label">Kursus Termurah</div>
                                    </div>
                                    <i class="fas fa-arrow-down fa-3x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card stat-card secondary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="stat-value">Rp <?= number_format($data6['avg_price'], 0, ',', '.') ?></div>
                                        <div class="stat-label">Rata-rata Harga</div>
                                    </div>
                                    <i class="fas fa-calculator fa-3x text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View -->
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-clipboard-list me-2"></i> Data Pendaftaran
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="POST" class="row g-3 mb-3">
                                <div class="col-auto">
                                    <label for="status" class="col-form-label">Filter Status:</label>
                                </div>
                                <div class="col-auto">
                                    <select name="status" id="status" class="form-select">
                                        <option value="">Semua</option>
                                        <option value="Completed" <?= $status_filter == 'Completed' ? 'selected' : '' ?>>Completed</option>
                                        <option value="Ongoing" <?= $status_filter == 'Ongoing' ? 'selected' : '' ?>>On Going</option>
                                        <option value="Dropped" <?= $status_filter == 'Dropped' ? 'selected' : '' ?>>Dropped</option>

                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                                </div>
                            </form>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Siswa</th>
                                        <th>Kursus</th>
                                        <th>Instruktur</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $status_filter = isset($_POST['status']) ? $_POST['status'] : '';
                                    $whereClause = $status_filter ? "WHERE status = '$status_filter'" : '';
                                    $queryRecent = mysqli_query($koneksi, 
                                        "SELECT * FROM view_enrollments_detail 
                                        $whereClause 
                                        ORDER BY enrollment_date DESC 
                                        LIMIT 5");

                                    while ($data = mysqli_fetch_assoc($queryRecent)) {
                                        echo "<tr>
                                            <td>{$data['enrollment_id']}</td>
                                            <td>{$data['student_name']}</td>
                                            <td>{$data['course_name']}</td>
                                            <td>{$data['instructor_name']}</td>
                                            <td><span class='badge bg-success'>{$data['status']}</span></td>
                                            <td>{$data['enrollment_date']}</td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Sequence Section -->
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-clipboard-list me-2"></i> Next ID dari Sequence seq_student_id
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <?php
                            $querySeq = mysqli_query($koneksi, "SELECT NEXTVAL(seq_student_id) AS next_id");
                            $seq = mysqli_fetch_assoc($querySeq);
                            ?>
                            <h4 class="text-success">Next Student ID: <strong><?= $seq['next_id'] ?></strong></h4>
                        </div>
                    </div>
                </div>


            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>
</html>