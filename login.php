<?php
session_start();

// Handle login submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "student_db";

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password_input = $_POST['password'];

    $sql = "SELECT * FROM students WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password_input, $row['password'])) {
            // Login success: start session, redirect to dashboard
            $_SESSION['username'] = $row['username'];
            $_SESSION['student_id'] = $row['id'];
            header("Location: dash.php");
            exit();
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Username not found!";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Student Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: url('log.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        h2 {
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
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .login-btn {
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

        .login-btn:hover {
            background-color: #3498db;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }

        a {
            color: #2980b9;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Student Login For Student Management System</h2>

    <?php if (!empty($error)): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="uname">Username</label>
            <input type="text" id="uname" name="username" placeholder="Enter your username" required>
        </div>

        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" id="pass" name="password" placeholder="Enter your password" required>
        </div>

        <button class="login-btn" type="submit">Login</button>
    </form>

    <div class="footer-text">
        Not registered yet? <a href="reg.php">Register here</a>
    </div>
</div>

</body>
</html>
