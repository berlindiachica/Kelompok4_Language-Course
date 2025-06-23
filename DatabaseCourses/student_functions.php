<?php
require_once 'KoneksiDB.php';

class StudentFunctions {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Get all students
    public function getAllStudents() {
        $stmt = $this->conn->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get student by ID
    public function getStudentById($student_id) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE student_id = ?");
        $stmt->execute([$student_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get student statistics (using the view)
    public function getStudentStatistics() {
        $stmt = $this->conn->query("SELECT * FROM student_statistics");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get enrollments for a student
    public function getStudentEnrollments($student_id) {
        $stmt = $this->conn->prepare("SELECT * FROM enrollments WHERE student_id = ?");
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>