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
$eventCode = $_POST['eventCode'];

//$query = "SELECT * FROM users";
$query = "INSERT INTO tasks (eventCode, tasks) VALUES ('$eventCode', '$tasks')";

$result = $conn->query($query);
if ($result) {
    $tasks = $result->fetchAll();
  $conn->insert_id;
  $last_id=$conn->insert_id;
    echo json_encode($last_id);
} else {
    echo json_encode(false);
}
?>
