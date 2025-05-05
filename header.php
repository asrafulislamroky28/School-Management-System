<div class="navbar">
    <a href="dash.php" class="active">Dashboard</a>
    <a href="faculty.php">Faculty</a>
    <a href="payment.php">Payment</a>
    <a href="attendance.php">Attendance</a>
    <a href="class_routine.php">Class Routine</a>
    <a href="exam.php">Exam Routine</a>
    <a href="course.php">Courses</a>
    <a href="class_r.php">Class Routine</a>
    <a href="exam.php">Exam Routine</a>
    <a href="about.php">About</a>
    <a href="logout.php">Logout</a>
</div>

<style>
    /* Navbar Styling */
    .navbar {
        background-color: #2980b9;
        overflow: hidden;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }

    .navbar a {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
        font-size: 18px;
    }

    .navbar a:hover {
        background-color: #575757;
    }

    .navbar a.active {
        background-color: #3498db;
    }

    /* Prevent content overlap with navbar */
    body {
        padding-top: 60px;
    }
</style>
