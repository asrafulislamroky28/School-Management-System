<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "student_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid ID.");
}

$sql = "DELETE FROM students WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    $message = "Student deleted successfully.";
} else {
    $message = "Error deleting student: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f8f8;
            padding: 30px;
        }
        .message-box {
            background: white;
            max-width: 500px;
            margin: auto;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .message {
            font-size: 18px;
            color: green;
        }
        .back-link {
            margin-top: 20px;
            display: inline-block;
            color: #2980b9;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="message-box">
    <p class="message"><?php echo $message; ?></p>
    <a href="student_information.php" class="back-link">← Back to Students List</a>
</div>

</body>
</html>
