<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class Routine</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            width: 100%;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            padding: 50px 30px;
            text-align: center;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 35px;
            color: #2c3e50;
            font-weight: 700;
        }

        .button-container {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
        }

        .class-button {
            padding: 16px 32px;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #4b6cb7, #182848);
            cursor: pointer;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .class-button:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #2c3e50, #34495e);
        }

        @media (max-width: 600px) {
            .class-button {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Select Class Routine</h1>
        <div class="button-container">
            <a href="cr6.php" class="class-button">Class 6</a>
            <a href="cr7.php" class="class-button">Class 7</a>
            <a href="cr8.php" class="class-button">Class 8</a>
            <a href="cr9.php" class="class-button">Class 9</a>
            <a href="cr10.php" class="class-button">Class 10</a>
        </div>
    </div>

</body>
</html>
