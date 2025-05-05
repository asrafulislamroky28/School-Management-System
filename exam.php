<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exam Routine</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 800px;
            margin: 80px auto;
            text-align: center;
            background: #fff;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 12px;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
        }

        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .class-button {
            padding: 15px 30px;
            font-size: 18px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .class-button:hover {
            background-color: #388e3c;
            transform: translateY(-2px);
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
        <h1>Exam Routine</h1>
        <div class="button-container">
            <a href="c6.php"><button class="class-button">Class 6</button></a>
            <a href="c7.php"><button class="class-button">Class 7</button></a>
            <a href="c8.php"><button class="class-button">Class 8</button></a>
            <a href="c9.php"><button class="class-button">Class 9</button></a>
            <a href="c10.php"><button class="class-button">Class 10</button></a>
        </div>
    </div>

</body>
</html>
