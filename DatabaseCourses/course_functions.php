<?php
require_once 'KoneksiDB.php';

class CourseFunctions {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Get all courses
    public function getAllCourses() {
        $stmt = $this->conn->query("SELECT * FROM courses");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get course by ID
    public function getCourseById($course_id) {
        $stmt = $this->conn->prepare("SELECT * FROM courses WHERE course_id = ?");
        $stmt->execute([$course_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get enrollment details (using the view)
    public function getEnrollmentDetails() {
        $stmt = $this->conn->query("SELECT * FROM enrollment_details");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get course student count (using the view)
    public function getCourseStudentCount() {
        $stmt = $this->conn->query("SELECT * FROM course_student_count");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Calculate course revenue (using the function)
    public function calculateCourseRevenue($course_id) {
        $stmt = $this->conn->prepare("SELECT calculate_course_revenue(?) AS revenue");
        $stmt->execute([$course_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['revenue'];
    }

    // Check if course is available (using the function)
    public function isCourseAvailable($course_id) {
        $stmt = $this->conn->prepare("SELECT is_course_available(?) AS available");
        $stmt->execute([$course_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (bool)$result['available'];
    }
}
?>