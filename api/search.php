<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_records";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = $_POST["query"];
$sql = "SELECT * FROM students WHERE Roll_No LIKE '%$query%' OR Batch LIKE '%$query%' OR PRN LIKE '%$query%' OR Name_of_Student LIKE '%$query%'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>Roll No</th><th>Batch</th><th>PRN Number</th><th>Name</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Roll_No"] . "</td><td>" . $row["Batch"] . "</td><td>" . $row["PRN"] . "</td><td>" . $row["Name_of_Student"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No records found.";
}
$conn->close();
