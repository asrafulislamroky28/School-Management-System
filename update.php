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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];

    $sql = "UPDATE students SET 
            first_name = '$first_name', 
            last_name = '$last_name', 
            dob = '$dob', 
            gender = '$gender', 
            username = '$username' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $message = "Student record updated successfully.";
    } else {
        $message = "Error updating record: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM students WHERE id = $id");

if (!$result || $result->num_rows === 0) {
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
            background: #f2f2f2;
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
                <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="dob" value="<?php echo $row['dob']; ?>" required>
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
                <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
            </div>
            <button type="submit" class="btn">Update</button>
        </form>

        <a href="student_information.php" class="back-link">← Back to Students List</a>
    </div>
</body>
</html>
