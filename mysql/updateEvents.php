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
$eventlocation = $_POST['eventlocation'];
$eventenddate  = $_POST['eventenddate'];
$eventtime     = $_POST['eventtime'];
$eventend      = $_POST['eventend'];
$eventCode     = $_POST['eventCode'];

$query = "UPDATE events SET (eventname, eventdate, eventlocation, eventnote, eventenddate, eventtime, eventend, eventCode) VALUES ('$eventname','$eventdate','$eventlocation', '$eventenddate', '$eventtime', '$eventend') WHERE eventCode='$eventCode'";

$result = $conn->query($query);

if ($result) {
    $events = $result->fetchAll();
    if (!empty($events)) {
        echo json_encode($events);
    } else {
        echo json_encode(false);
    }
} else {
    echo json_encode(false);
}
?>