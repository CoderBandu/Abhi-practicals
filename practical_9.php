
<?php
session_start();
$visitorCountName = "visitor_count";
if (isset($_SESSION[$visitorCountName])) {
    $_SESSION[$visitorCountName]++;
} else {
    $_SESSION[$visitorCountName] = 1;
}
$currentVisitors = $_SESSION[$visitorCountName];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practical 9</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Comic Sans MS', cursive, sans-serif; 
            background: linear-gradient(135deg,#b7d8ef , #033e67 90%);
        }
        .count{
            color: #fff;
            position: relative;
            font-size: 80px;
            width: 200px;
            padding: 10px 50px ;
            text-align: center;
            border-radius: 10px;
            box-shadow: #1709755c 0 5px 10px;
            background: linear-gradient(to right, #5bafef,#a34cf6);
        }
        .count::after{
            content: " ";
            position: absolute;
            border-radius: 10px;
            box-shadow: #1709755c 0 5px 5px;
            background: linear-gradient(-45deg, #8a2ae4,#6f7de6);
            height: 180%;
            width: 70%;
            top: -40%;
            left: 15%;
            z-index: -1;
        }

    </style>
</head>
<body>
    <h1 style="position: absolute;top: 50px;color: #fff;">Visitor Count</h1>
    <?php
        echo '<div class="count">'. $currentVisitors ."</div>";
    ?>
</body>
</html>