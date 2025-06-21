<?php
require_once 'KoneksiDB.php';
require_once 'course_functions.php';
require_once 'student_functions.php';
require_once 'instructor_functions.php';

$courseFunctions = new CourseFunctions($conn);
$studentFunctions = new StudentFunctions($conn);
$instructorFunctions = new InstructorFunctions($conn);

// Example usage of course functions
$allCourses = $courseFunctions->getAllCourses();
$courseRevenue = $courseFunctions->calculateCourseRevenue('132');
$isAvailable = $courseFunctions->isCourseAvailable('111');

// Example usage of student functions
$allStudents = $studentFunctions->getAllStudents();
$studentStats = $studentFunctions->getStudentStatistics();

// Example usage of instructor functions
$allInstructors = $instructorFunctions->getAllInstructors();
$studentCount = $instructorFunctions->countStudentsByInstructor('141');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Management System</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Courses Management System</h1>

    <h2>All Courses</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Language</th>
            <th>Level</th>
            <th>Price</th>
        </tr>
        <?php foreach ($allCourses as $course): ?>
        <tr>
            <td><?= htmlspecialchars($course['course_id']) ?></td>
            <td><?= htmlspecialchars($course['course_name']) ?></td>
            <td><?= htmlspecialchars($course['language']) ?></td>
            <td><?= htmlspecialchars($course['level']) ?></td>
            <td><?= number_format($course['price'], 2) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Course Revenue for ID 132</h2>
    <p>Total Revenue: <?= number_format($courseRevenue, 2) ?></p>

    <h2>All Students</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Registration Date</th>
        </tr>
        <?php foreach ($allStudents as $student): ?>
        <tr>
            <td><?= htmlspecialchars($student['student_id']) ?></td>
            <td><?= htmlspecialchars($student['student_name']) ?></td>
            <td><?= htmlspecialchars($student['email']) ?></td>
            <td><?= htmlspecialchars($student['phone_number']) ?></td>
            <td><?= htmlspecialchars($student['registration_date']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Student Statistics</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Total Courses</th>
            <th>Completed</th>
            <th>Ongoing</th>
            <th>Dropped</th>
        </tr>
        <?php foreach ($studentStats as $stat): ?>
        <tr>
            <td><?= htmlspecialchars($stat['student_id']) ?></td>
            <td><?= htmlspecialchars($stat['student_name']) ?></td>
            <td><?= htmlspecialchars($stat['total_courses_taken']) ?></td>
            <td><?= htmlspecialchars($stat['completed_courses']) ?></td>
            <td><?= htmlspecialchars($stat['ongoing_courses']) ?></td>
            <td><?= htmlspecialchars($stat['dropped_courses']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>