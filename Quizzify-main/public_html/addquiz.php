<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="png" href="http://localhost/Quizzify/Quizzify/images/icon2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4AA017;
            color: white;
            padding: 10px;
            text-align: center;
        }
        footer {
            background-color: #4AA017;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .container {
            padding: 20px;
            text-align: center;
        }
        .button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border: none;
            background-color: #000000;
            color: white;
        }
        .button:hover {
            background-color: #000000;
        }
    </style>
</head>
<body>
    <header>
        <h1>Add Quiz</h1>
    </header>
    <div class="container">
        <button class="button">Add Questions</button>
        <button class="button">Add Answers</button>
    </div>
    <footer>
        <button class="button">Edit</button>
        <button class="button">Delete</button>
    </footer>
</body>
</html>
