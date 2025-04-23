<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection settings
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "student_db";

    // Connect to database
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO students (first_name, last_name, dob, gender, username, password)
            VALUES ('$first_name', '$last_name', '$dob', '$gender', '$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        $error_message = "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration | Student Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: url('reg.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .register-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #555;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .register-btn {
            width: 100%;
            padding: 12px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .register-btn:hover {
            background-color: #3498db;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Student Registration</h2>
    
    <?php if (!empty($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="first_name" placeholder="Enter your first name" required>
        </div>

        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="last_name" placeholder="Enter your last name" required>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected>Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
                <option value="Prefer not to say">Prefer not to say</option>
            </select>
        </div>

        <div class="form-group">
            <label for="uname">Username</label>
            <input type="text" id="uname" name="username" placeholder="Choose a username" required>
        </div>

        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" id="pass" name="password" placeholder="Create a password" required>
        </div>

        <button class="register-btn" type="submit">Register</button>
    </form>

    <div class="footer-text">
        Already registered? <a href="login.php" style="color:#2980b9; text-decoration:none;">Login here</a>
    </div>
</div>

</body>
</html>
