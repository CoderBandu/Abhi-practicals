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
    $sort_field = $_POST["rAdio"];
} else {
    $category = "student_id";
    $sort_field = "";
}

switch ($sort_field) {
    case "ASC":
        $sql = "SELECT * FROM `students` ORDER BY `students`.`" . $category . "` ASC";
        break;
    case "DESC":
        $sql = "SELECT * FROM `students` ORDER BY `students`.`" . $category . "` DESC";
        break;
    default:
        $sql = "SELECT * FROM `students`";
}

$result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Practical 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center my-4">Student Records</h1>
    <form class="row justify-content-around" method="post">
        <div class="btn-group " style="width: 150px;">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Sort by
            </button>

            <div class="dropdown-menu">
                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" name="rAdio" id="d" checked>
                    <label class="form-check-label" for="d">
                        Default
                    </label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" name="rAdio" id="inc" value="ASC">
                    <label class="form-check-label" for="inc">
                        Ascending / A-Z
                    </label>
                </div>
                <div class="form-check  ms-2">
                    <input class="form-check-input" type="radio" name="rAdio" id="dec" value="DESC">
                    <label class="form-check-label" for="dec">
                        Descending / Z-A
                    </label>
                </div>
            </div>
        </div>

        <div class="btn-group" style="width: 200px;">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <?php echo $category ?>
            </button>
            <ul class="dropdown-menu ">
                <li><button class="dropdown-item" name="category" value="first_name">First Name</button></li>
                <li><button class="dropdown-item" name="category" value="last_name">Last Name</button></li>
                <li><button class="dropdown-item" name="category" value="date_of_birth">Date of Birth</button></li>
                <li><button class="dropdown-item" name="category" value="grade">Grade</button></li>
            </ul>
        </div>

    </form>


    <div class="row justify-content-center mt-5">
        <?php

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped align-middle table-bordered w-75'>";
            echo "<thead>";
            echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Grade</th></tr>";
            echo "</thead>";
            echo "<tbody class ='table-group-divider'>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["student_id"] . "</td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["date_of_birth"] . "</td>";
                echo "<td>" . $row["grade"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='no-results'>No records found</p>";
        }

        $conn->close();

        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>