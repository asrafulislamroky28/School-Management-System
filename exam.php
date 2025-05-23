<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exam Routine</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
        <h1>Exam Routine</h1>
        <div class="button-container">
            <a href="c6.php"><button class="class-button">Class 6</button></a>
            <a href="c7.php"><button class="class-button">Class 7</button></a>
            <a href="c8.php"><button class="class-button">Class 8</button></a>
            <a href="c9.php"><button class="class-button">Class 9</button></a>
            <a href="c10.php"><button class="class-button">Class 10</button></a>
        <h1>Select Exam Routine</h1>
        <div class="button-container">
            <a href="c6.php" class="class-button">Class 6</a>
            <a href="c7.php" class="class-button">Class 7</a>
            <a href="c8.php" class="class-button">Class 8</a>
            <a href="c9.php" class="class-button">Class 9</a>
            <a href="c10.php" class="class-button">Class 10</a>
        </div>
    </div>

</body>
</html>
