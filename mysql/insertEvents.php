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

//$query = "SELECT * FROM users";
$query = "INSERT INTO events (eventname, eventdate, eventtime, eventlocation, eventend, eventenddate, eventCode) VALUES ('$eventname','$eventdate','$eventtime','$eventlocation','$eventend','$eventenddate','$eventCode')";

$result = $conn->query($query);
if ($result) {
    $events = $result->fetchAll();
  error_log($events);
    echo json_encode($events);
} else {
    echo json_encode(false);
}
?>