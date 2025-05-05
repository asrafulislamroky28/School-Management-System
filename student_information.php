<?php
session_start();

// DB connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "student_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, first_name, last_name, dob, gender, username FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Students | Student Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: url('reg.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .info-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            width: 100%;
            max-width: 1000px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            overflow-x: auto;
        }

        header {
            background: rgba(44, 62, 80, 0.85);
            color: white;
            padding: 20px;
            text-align: center;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .pdf-btn {
            display: block;
            margin: 10px auto;
            background-color: #1abc9c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .pdf-btn:hover {
            background-color: #16a085;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 16px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #2980b9;
            color: white;
        }

        tr:hover {
            background-color: #f4f4f4;
        }

        .no-data {
            text-align: center;
            margin-top: 30px;
            color: red;
        }

        .action-btn {
            padding: 6px 12px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }

        .update-btn {
            background-color: #27ae60;
            color: white;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            text-decoration: none;
            color: #2980b9;
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php include('header.php'); ?>

<div class="info-container">
    <header>
        <h1>Student Information Page</h1>
    </header>

    <button class="pdf-btn" onclick="downloadPDF()">Download PDF</button>

    <div id="student-content">
        <?php if ($result && $result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['dob']); ?></td>
                            <td><?php echo htmlspecialchars($row['gender']); ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td>
                                <a class="action-btn update-btn" href="update.php?id=<?php echo $row['id']; ?>">Update</a>
                                <a class="action-btn delete-btn" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">No student records found.</p>
        <?php endif; ?>
    </div>
</div>

<script>
function downloadPDF() {
    const element = document.getElementById('student-content');

    const opt = {
        margin:       0.5,
        filename:     'student_information.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    html2pdf().set(opt).from(element).outputPdf('bloburl').then(function(pdfUrl) {
        window.open(pdfUrl, '_blank');
    });
}
</script>

</body>
</html>

<?php
$conn->close();
?>
