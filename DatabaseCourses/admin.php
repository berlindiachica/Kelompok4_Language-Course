<?php
include 'koneksiDB.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Tools</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">

    <h1 class="mb-4 text-primary">📊 Admin Tools</h1>

    <!-- INDEX -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Index pada Tabel <code>students</code>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Key Name</th>
                        <th>Column Name</th>
                        <th>Unique</th>
                        <th>Index Type</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $queryIndex = mysqli_query($koneksi, "SHOW INDEX FROM students");
                while ($row = mysqli_fetch_assoc($queryIndex)) {
                    echo "<tr>
                        <td>{$row['Key_name']}</td>
                        <td>{$row['Column_name']}</td>
                        <td>" . ($row['Non_unique'] == 0 ? 'Yes' : 'No') . "</td>
                        <td>{$row['Index_type']}</td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- VIEW -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            Data dari View <code>view_enrollments_detail</code>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-success">
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
                $queryView = mysqli_query($koneksi, "SELECT * FROM view_enrollments_detail");
                while ($data = mysqli_fetch_assoc($queryView)) {
                    echo "<tr>
                        <td>{$data['enrollment_id']}</td>
                        <td>{$data['student_name']}</td>
                        <td>{$data['course_name']}</td>
                        <td>{$data['instructor_name']}</td>
                        <td>{$data['status']}</td>
                        <td>{$data['enrollment_date']}</td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- SEQUENCE -->
    <div class="card">
        <div class="card-header bg-warning">
            Next ID dari Sequence <code>seq_student_id</code>
        </div>
        <div class="card-body">
            <?php
            $querySeq = mysqli_query($koneksi, "SELECT NEXTVAL(seq_student_id) AS next_id");
            $seq = mysqli_fetch_assoc($querySeq);
            ?>
            <h4 class="text-success">Next Student ID: <strong><?= $seq['next_id'] ?></strong></h4>
        </div>
    </div>

</div>
</body>
</html>
