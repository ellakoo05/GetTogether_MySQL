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

$eventCode = $_POST['eventCode'];

//$query = "SELECT * FROM users";
$query = "SELECT * FROM events WHERE eventCode='$eventCode'";
//$query = "SELECT * FROM events WHERE eventCode='28834'";

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