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

$eventname     = $_POST['eventname'];
$eventdate     = $_POST['eventdate'];
$eventtime = $_POST['eventtime'];
$eventlocation = $_POST['eventlocation'];
$eventend = $_POST['eventend'];
$eventenddate = $_POST['eventenddate'];
$eventCode = $_POST['eventCode'];
$userID = $_POST['userID'];

//$query = "SELECT * FROM users";
$query = "INSERT INTO events (eventname, eventdate, eventtime, eventlocation, eventend, eventenddate, eventCode, admin) VALUES ('$eventname','$eventdate','$eventtime','$eventlocation','$eventend','$eventenddate','$eventCode', '$userID')";

$result = $conn->query($query);
if ($result) {
    $events = $result->fetchAll();
  error_log("insert success");  
    echo json_encode($events);
} else {
  error_log("insert FAILED");
    echo json_encode(false);
}
?>