<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    html, body {
      height: 100%;
    }

    body {
      display: flex;
      background: url('da.jpg') no-repeat center center fixed;
      background-size: cover;
      position: relative;
      color: #1f2937;
    }

    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background: rgba(255, 255, 255, 0.5);
      z-index: 0;
      pointer-events: none;
    }

    .sidebar {
      width: 250px;
      background-color: #1e293b;
      color: white;
      display: flex;
      flex-direction: column;
      padding: 30px 20px;
      z-index: 2;
      position: fixed;
      height: 100%;
      left: 0;
      top: 0;
      transition: transform 0.3s ease;
    }

    .sidebar h1 {
      font-size: 22px;
      margin-bottom: 40px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar a {
      color: #cbd5e1;
      text-decoration: none;
      margin: 12px 0;
      font-size: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: 0.3s;
    }

    .sidebar a:hover {
      color: white;
    }

    form.logout-form {
      margin-top: auto;
    }

    .logout-btn, .auth-btn {
      width: 200px;
      padding: 12px;
      margin: 10px;
      background-color: #2980b9;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .logout-btn:hover, .auth-btn:hover {
      background-color: #3498db;
      transform: scale(1.1);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .logout-btn {
      background-color: #ef4444;
    }

    .logout-btn:hover {
      background-color: #dc2626;
    }

    .main-content {
      flex: 1;
      margin-left: 250px;
      padding: 40px;
      z-index: 1;
      transition: margin-left 0.3s ease;
    }

    .main-content h1 {
      font-size: 40px;
      color: #1e3a8a;
      text-align: center;
      margin-bottom: 10px;
    }

    .main-content p {
      font-size: 18px;
      text-align: center;
    }

    .main-content .auth-buttons {
      text-align: center;
      margin-top: 30px;
    }

    footer.footer-text {
      position: fixed;
      bottom: 0;
      left: 250px;
      right: 0;
      background-color: rgba(255, 255, 255, 0.8);
      text-align: center;
      padding: 12px 10px;
      font-size: 14px;
      z-index: 1;
      transition: left 0.3s ease;
    }

    .hamburger {
      display: none;
      position: fixed;
      top: 20px;
      left: 20px;
      font-size: 24px;
      z-index: 3;
      background-color: #1e293b;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.active {
        transform: translateX(0);
      }

      .main-content {
        margin-left: 0;
        padding: 20px;
      }

      footer.footer-text {
        left: 0;
      }

      .hamburger {
        display: block;
      }

      .auth-btn, .logout-btn {
        width: 100%; /* Make buttons full width on smaller screens */
        font-size: 18px; /* Increase text size */
      }
    }
  </style>
</head>
<body>

  <!-- Hamburger Button -->
  <button class="hamburger" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <h1><i class="fas fa-graduation-cap"></i> Dashboard</h1>
    <a href="student_information.php"><i class="fas fa-user-graduate"></i> Student Information</a>
    <a href="#"><i class="fas fa-calendar-check"></i> Attendance</a>
    <a href="#"><i class="fas fa-credit-card"></i> Payment</a>
    <a href="exam.php"><i class="fas fa-file-alt"></i> Exam Routine</a>
    <a href="faculty.php"><i class="fas fa-star"></i> Faculty</a>
    <a href="#"><i class="fas fa-book"></i> Course</a>
    <a href="#"><i class="fas fa-clock"></i> Class Routine</a>
    <a href="about.php"><i class="fas fa-info-circle"></i> About</a>

    <form class="logout-form" action="logout.php" method="POST">
      <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
    </form>
  </aside>

  <!-- Main Content -->
  <div class="main-content">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <b><p>If you  have no account then click Sign In to register <br>
If you  have an account then click Login to access your dashboard</p></b>
    <!-- Sign In and Login Buttons -->
    <div class="auth-buttons">
      <button class="auth-btn" onclick="window.location.href='reg.php'">Sign In</button>
      <button class="auth-btn" onclick="window.location.href='login.php'">Login</button>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer-text">
    &copy; <b>Student Management System Developed by <br> Code Warrior</b>
  </footer>

  <!-- JS for toggling sidebar -->
  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('active');
    }
  </script>

</body>
</html>
