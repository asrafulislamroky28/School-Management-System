<?php include 'header.php'; ?>

<?php
$conn = new mysqli("localhost", "root", "", "student_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, exam_date, subject, exam_time FROM class10_routine ORDER BY exam_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class 10 Exam Routine</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f9f9f9;
            padding: 40px 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
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
            border: 1px solid #ddd;
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
        .pdf-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #f39c12;
            color: white;
            text-align: center;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            border: none;
        }
        .pdf-btn:hover {
            background-color: #e67e22;
        }
        /* Hide the action buttons for PDF download */
        .no-action {
            display: none;
        }
    </style>
</head>
<body>

<div class="container" id="exam-routine">
    <h2>Class 10 Exam Routine</h2>

    <!-- PDF Download Button -->
    <button class="pdf-btn" onclick="downloadPDF()">Download PDF</button>

    <table>
        <tr>
            <th>Date</th>
            <th>Subject</th>
            <th>Time</th>
            <th class="no-action">Action</th> <!-- Hide in PDF -->
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['exam_date'] ?></td>
                    <td><?= $row['subject'] ?></td>
                    <td><?= $row['exam_time'] ?></td>
                    <td class="no-action">
                        <a class="btn btn-update" href="update_routine.php?id=<?= $row['id'] ?>&class=10">Update</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4">No routine found</td></tr>
        <?php endif; ?>
    </table>

    <a href="exam.php" class="btn btn-back">Back</a>
</div>

<script>
    function downloadPDF() {
        const element = document.getElementById('exam-routine');
        const options = {
            margin: 1,
            filename: 'class_10_exam_routine.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        // Hide the action buttons before generating PDF
        const actions = document.querySelectorAll('.no-action');
        actions.forEach(action => action.style.display = 'none');

        // Generate PDF
        html2pdf().set(options).from(element).save();

        // Restore action buttons after PDF generation
        actions.forEach(action => action.style.display = '');
    }
</script>

</body>
</html>

<?php $conn->close(); ?>
