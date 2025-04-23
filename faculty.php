<?php
// config and DB handling
$host = 'localhost';
$username = 'root'; // Your MySQL username
$password = '';     // Your MySQL password
$database = 'student_db';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for adding faculty
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $teacher = $_POST['teacher_name'];
    $course = $_POST['course_name'];
    $course_id = $_POST['course_id'];
    $contact = $_POST['contact_info'];

    $stmt = $conn->prepare("INSERT INTO faculty (teacher_name, course_name, course_id, contact_info) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $teacher, $course, $course_id, $contact);
    $stmt->execute();
    $stmt->close();

    // Refresh page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle delete action
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM faculty WHERE id = $id");

    // Refresh page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle update action
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM faculty WHERE id = $id");
    $faculty = $result->fetch_assoc();
}

// Handle form submission for updating faculty
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $teacher = $_POST['teacher_name'];
    $course = $_POST['course_name'];
    $course_id = $_POST['course_id'];
    $contact = $_POST['contact_info'];

    $stmt = $conn->prepare("UPDATE faculty SET teacher_name = ?, course_name = ?, course_id = ?, contact_info = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $teacher, $course, $course_id, $contact, $id);
    $stmt->execute();
    $stmt->close();

    // Refresh page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Faculty Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: url('faculty.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    header {
      background: rgba(44, 62, 80, 0.85);
      color: white;
      padding: 20px;
      text-align: center;
    }

    nav {
      background: rgba(52, 73, 94, 0.85);
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }

    nav a {
      color: white;
      padding: 12px 20px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    nav a:hover {
      background-color: #1abc9c;
      border-radius: 5px;
    }

    .container {
      max-width: 900px;
      margin: 30px auto;
      background: rgba(255, 255, 255, 0.95);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .add-btn {
      background: #1abc9c;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    .add-btn:hover {
      background-color: #16a085;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #1abc9c;
      color: white;
    }

    /* Popup Form */
    .popup-form {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
      z-index: 999;
    }

    .form-content {
      background: white;
      padding: 25px;
      border-radius: 10px;
      width: 90%;
      max-width: 400px;
    }

    .form-content input {
      width: 100%;
      margin: 10px 0;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-content button {
      width: 100%;
      background-color: #1abc9c;
      color: white;
      padding: 12px;
      border: none;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }

    .form-content button:hover {
      background-color: #16a085;
    }

    .close-btn {
      background: #e74c3c !important;
    }

    .action-btn {
      color: #fff;
      padding: 5px 10px;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
    }

    .update-btn {
      background-color: #f39c12;
    }

    .delete-btn {
      background-color: #e74c3c;
    }

    .update-btn:hover {
      background-color: #e67e22;
    }

    .delete-btn:hover {
      background-color: #c0392b;
    }

    @media(max-width: 768px) {
      nav a {
        padding: 10px;
      }

      .form-content {
        width: 95%;
      }

      table, th, td {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

<header>
  <h1>Faculty Page</h1>
</header>

<nav>
  <a href="dash.php">Home</a>
  <a href="#">Exam Routine</a>
  <a href="#">Class Routine</a>
  <a href="student_information.php">Student Information</a>
  <a href="#">Faculty</a>
  <a href="about.php">About</a>
</nav>

<div class="container">
  <button class="add-btn" onclick="document.getElementById('popup').style.display='flex'">Add Faculty</button>

  <table>
    <thead>
      <tr>
        <th>Teacher Name</th>
        <th>Course Name</th>
        <th>Course ID</th>
        <th>Contact Info</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $result = $conn->query("SELECT * FROM faculty ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td>" . htmlspecialchars($row['teacher_name']) . "</td>
              <td>" . htmlspecialchars($row['course_name']) . "</td>
              <td>" . htmlspecialchars($row['course_id']) . "</td>
              <td>" . htmlspecialchars($row['contact_info']) . "</td>
              <td>
                <a href='?edit=" . $row['id'] . "' class='action-btn update-btn' onclick='openUpdateForm(" . $row['id'] . ")'>Update</a> |
                <a href='?delete=" . $row['id'] . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
              </td>
            </tr>";
        }
      ?>
    </tbody>
  </table>
</div>

<!-- Popup Form to Add Faculty -->
<div class="popup-form" id="popup">
  <div class="form-content">
    <form method="POST">
      <h2 style="text-align:center;">Add Faculty</h2>
      <input type="text" name="teacher_name" placeholder="Teacher Name" required>
      <input type="text" name="course_name" placeholder="Course Name" required>
      <input type="text" name="course_id" placeholder="Course ID" required>
      <input type="text" name="contact_info" placeholder="Contact Info" required>
      <button type="submit" name="action" value="add">Submit</button>
      <button type="button" class="close-btn" onclick="document.getElementById('popup').style.display='none'">Cancel</button>
    </form>
  </div>
</div>

<!-- Update Form Popup -->
<?php if (isset($faculty)): ?>
  <div class="popup-form" id="updatePopup" style="display: flex;">
    <div class="form-content">
      <form method="POST">
        <h2 style="text-align:center;">Update Faculty</h2>
        <input type="hidden" name="id" value="<?php echo $faculty['id']; ?>">
        <input type="text" name="teacher_name" placeholder="Teacher Name" value="<?php echo $faculty['teacher_name']; ?>" required>
        <input type="text" name="course_name" placeholder="Course Name" value="<?php echo $faculty['course_name']; ?>" required>
        <input type="text" name="course_id" placeholder="Course ID" value="<?php echo $faculty['course_id']; ?>" required>
        <input type="text" name="contact_info" placeholder="Contact Info" value="<?php echo $faculty['contact_info']; ?>" required>
        <button type="submit" name="action" value="update">Update</button>
        <button type="button" class="close-btn" onclick="document.getElementById('updatePopup').style.display='none'">Cancel</button>
      </form>
    </div>
  </div>
<?php endif; ?>

<?php
$conn->close();
?>

</body>
</html>
