<?php
require_once 'KoneksiDB.php';

class InstructorFunctions {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Get all instructors
    public function getAllInstructors() {
        $stmt = $this->conn->query("SELECT * FROM instructors");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get instructor by ID
    public function getInstructorById($instructor_id) {
        $stmt = $this->conn->prepare("SELECT * FROM instructors WHERE instructor_id = ?");
        $stmt->execute([$instructor_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Count students by instructor (using the function)
    public function countStudentsByInstructor($instructor_id) {
        $stmt = $this->conn->prepare("SELECT count_students_by_instructor(?) AS student_count");
        $stmt->execute([$instructor_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['student_count'];
    }

    // Get courses taught by instructor
    public function getInstructorCourses($instructor_id) {
        $stmt = $this->conn->prepare("
            SELECT c.* FROM courses c
            JOIN enrollments e ON c.course_id = e.course_id
            WHERE e.instructor_id = ?
            GROUP BY c.course_id
        ");
        $stmt->execute([$instructor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>