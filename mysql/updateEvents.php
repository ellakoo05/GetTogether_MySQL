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
$eventlocation       = $_POST['eventlocation'];
$eventnote = $_POST['eventnote'];
$eventenddate = $_POST['eventenddate'];
$eventtime = $_POST['eventtime'];
$eventend = $_POST['eventend'];
$eventCode = $_POST['eventCode']

$query = "UPDATE events SET (eventname, eventdate, eventlocation, eventnote, eventenddate, eventtime, eventend, eventCode) VALUES ('{$_POST['eventname']}','{$_POST['eventdate']}','{$_POST['eventlocation']}', '{$_POST['eventnote']}', '{$_POST['eventenddate']}', '{$_POST['eventtime']}', '{$_POST['eventend']}', '{$_POST['eventCode']}')";
$result = $conn->query($query);
if ($result) {
    $users = $result->fetchAll();
    echo json_encode($users);
} else {
    echo json_encode(false);
}
?>
