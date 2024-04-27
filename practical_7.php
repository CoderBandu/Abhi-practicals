<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical 7/title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        h1 {
            font-size: 5em;
            color: #ff4081;
            margin: 0;
        }
        #clock {
            font-size: 2em;
            letter-spacing: 0.05em;
            color: #fff;
            background: linear-gradient(to right, #ff5f6d, #ffc371);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            margin-top: 20px;
        }
        .gradient-text {
            background: -webkit-linear-gradient(left, #7b4397, #dc2430);
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body>
    <h1 class="gradient-text">Digital Clock</h1>
    <div id="clock">
        <?php
            date_default_timezone_set('Asia/Kolkata'); 
            echo date('h:i:s A');
        ?>
    </div>
    <script>
        setInterval(() => {
            var clockElement = document.getElementById("clock");
            var currentTime = new Date().toLocaleTimeString();
            clockElement.textContent = currentTime;
        }, 1000);
    </script>
</body>
</html>
