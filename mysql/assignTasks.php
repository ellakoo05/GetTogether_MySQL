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

$taskID = $_POST['taskID'];
$userID = $_POST['userID'];
$eventCode = $_POST['eventCode'];

$checkAssigned = "SELECT * FROM assigned_tasks WHERE userID = '$userID' AND taskID = '$taskID'";
$query = "INSERT INTO assigned_tasks (userID, taskID, eventCode) VALUES ('$userID','$taskID', '$eventCode')";
$isSuccessful = false;

$result = $conn->query($checkAssigned);
if ($result) {
    $assignedTasks = $result->fetchAll();
    if(empty($assignedTasks)) {
        $insertResult = $conn->query($query);
        if ($insertResult) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
?>