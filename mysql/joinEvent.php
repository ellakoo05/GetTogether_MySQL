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
$checkEventQuery = "SELECT * FROM events WHERE eventCode = '$eventCode'";

$result = $conn->query($checkEventQuery);
if ($result) {
    $event = $result->fetchAll();
    if(!empty($event)) {
      $query = "INSERT INTO joinevents (userID, eventCode) VALUES ('{$_POST['userID']}','{$_POST['eventCode']}')";
      $result = $conn->query($query);
      if ($result) {
        echo json_encode(true);
      } else {
        echo json_encode(false);
      }
    }
} else {
    echo json_encode(false);
}

//$result = $conn->query($query);
//if ($result) {
//    $users = $result->fetchAll();
//    echo json_encode($users);
//} else {
//    echo json_encode(false);
//}
?>