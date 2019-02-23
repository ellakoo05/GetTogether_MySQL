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
$userID = $_POST['userID'];

$checkEventQuery = "SELECT * FROM events WHERE eventCode = '$eventCode'";
$checkJoined = "SELECT * FROM joinevents WHERE userID = '$userID' AND eventCode = '$eventCode'";
$query = "INSERT INTO joinevents (userID, eventCode) VALUES ('$userID','$eventCode')";
$isSuccessful = false;

$result = $conn->query($checkEventQuery);
if ($result) {
    $event = $result->fetchAll();
    if(!empty($event)) {
      $joinedResult = $conn->query($checkJoined);
        if ($joinedResult) {
          $joined = $joinedResult->fetchAll();
          if(empty($joined)) {
            $insertResult = $conn->query($query);
            if ($insertResult) {
              $isSuccessful = true;
              echo json_encode(true);
            }
          }
        }
    }
} 
if (!$isSuccessful) {
  echo json_encode(false);

}
?>