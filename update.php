<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];

    $stmt = $conn->prepare("UPDATE students SET first_name = ?, last_name = ?, dob = ?, gender = ?, username = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $first_name, $last_name, $dob, $gender, $username, $id);

    if ($stmt->execute()) {
        $message = "Student record updated successfully.";
    } else {
        $message = "Error updating record: " . $stmt->error;
    }
}

// Use prepared statement to fetch student data
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("Student not found.");
}
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: url('reg.jpg') no-repeat center center fixed;
            background-size: cover;
            padding: 30px;
        }
        .container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .btn {
            background-color: #2980b9;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #3498db;
        }
        .message {
            text-align: center;
            color: green;
            margin-bottom: 15px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #2980b9;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Student Information</h2>

        <?php if (!empty($message)) echo "<p class='message'>$message</p>"; ?>

        <form method="POST">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="dob" value="<?php echo htmlspecialchars($row['dob']); ?>" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" required>
                    <option value="Male" <?php if ($row['gender'] == "Male") echo "selected"; ?>>Male</option>
                    <option value="Female" <?php if ($row['gender'] == "Female") echo "selected"; ?>>Female</option>
                    <option value="Other" <?php if ($row['gender'] == "Other") echo "selected"; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
            </div>
            <button type="submit" class="btn">Update</button>
        </form>

        <a href="student_information.php" class="back-link">← Back to Students List</a>
    </div>
</body>
</html>
