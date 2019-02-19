<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

try {
    $conn = new PDO("mysql:host=tk3mehkfmmrhjg0b.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=fvtmkfyz8ymzy8a1", "sbib1pmzgwmexs5g", "tk4m14h6yyt889va");
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$tasks     = $_POST['tasks'];

//$query = "SELECT * FROM users";
$query = "INSERT INTO tasks (tasks) VALUES ('$tasks')";

$result = $conn->query($query);
if ($result) {
    $tasks = $result->fetchAll();
  error_log($tasks);
    echo json_encode($tasks);
} else {
    echo json_encode(false);
}
?>