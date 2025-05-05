<?php include 'header.php'; ?>
<?php
$conn = new mysqli("localhost", "root", "", "student_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, exam_date, subject, exam_time FROM class9_routine ORDER BY exam_date ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Class 9 Exam Routine</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f4;
            padding: 40px 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th {
            background-color: #3f51b5;
            color: white;
        }
        th, td {
            padding: 14px;
            text-align: center;
        }
        .btn {
            padding: 8px 16px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-update {
            background-color: #2196F3;
        }
        .btn-update:hover {
            background-color: #0b7dda;
        }
        .btn-back {
            background-color: #4CAF50;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-back:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Class 9 Exam Routine</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Subject</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        <?php if ($result->num_rows > 0): while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['exam_date'] ?></td>
                <td><?= $row['subject'] ?></td>
                <td><?= $row['exam_time'] ?></td>
                <td><a class="btn btn-update" href="update_routine.php?id=<?= $row['id'] ?>&class=9">Update</a></td>
            </tr>
        <?php endwhile; else: ?>
            <tr><td colspan="4">No routine found</td></tr>
        <?php endif; ?>
    </table>
    <a href="exam.php" class="btn btn-back">Back to Main Page</a>
</div>
</body>
</html>
<?php $conn->close(); ?>
