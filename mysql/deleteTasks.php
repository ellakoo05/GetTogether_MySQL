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
$userID     = $_GET['userID'];
$eventCode     = $_GET['eventCode'];
$tasks       = $_GET['tasks'];

$query = "DELETE FROM tasks WHERE (userID, eventCode, tasks) VALUES ('{$_GET['userID']}','{$_GET['eventCode']}','{$_GET['tasks']}')";
$result = $conn->query($query);
if ($result) {
    $users = $result->fetchAll();
    echo json_encode($users);
} else {
    echo json_encode(false);
}
?>