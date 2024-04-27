<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    echo "Selected category: " . $category;
}
$sort_field = "category";

switch ($category) {
  case " ":
    $sql = "SELECT * FROM `filter_data`";
    break;
  case "Price:Low to High":
    $sql = "SELECT * FROM `filter_data` ORDER BY `filter_data`.`value` ASC";
    break;
  case "Price:High to Low":
    $sql = "SELECT * FROM `filter_data` ORDER BY `filter_data`.`value` DESC";
    break;

  default:
    $sql = "SELECT * FROM `filter_data` WHERE `category` = '$category'";
}

$result = $conn->query($sql);

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="btn-group">
            <form id="filter-form" method="post">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Category 
            </button>
            <ul class="dropdown-menu">
                <li><button class="dropdown-item" name="category" value="First Name">First Name</button></li>
                <li><button class="dropdown-item" name="category" value="Last Name">Last Name</button></li>
                <li><button class="dropdown-item" name="category" value="Date of Birth">Date of Birth</button></li>
                <li><button class="dropdown-item" name="category" value="Grade">Grade</button></li>
            </ul>
        </form>
        </div>
    
    <div class="btn-group">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            Sort by
        </button>

        <div class="dropdown-menu">
            <div class="form-check m-2">
                <input class="form-check-input" type="radio" name="rAdio" id="ASC" checked value="ASC">
                <label class="form-check-label" for="ASC">
                    Ascending / A-Z
                </label>
            </div>
            <div class="form-check  ms-2">
                <input class="form-check-input" type="radio" name="rAdio" id="DESC" value="DESC">
                <label class="form-check-label" for="DESC">
                    Descending / Z-A
                </label>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>
