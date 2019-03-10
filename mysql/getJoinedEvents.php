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

$userID = $_POST['userID'];
$email    = $_POST['email'];
$password = $_POST['password'];
$eventCode = $_POST['eventCode'];

$query = "SELECT * FROM events INNER JOIN joinevents ON events.eventCode=joinevents.eventCode WHERE userID='$userID'";

error_log($query);
$result = $conn->query($query);

if ($result) {
    $joinedEvents = $result->fetchAll();
  if(!empty($joinedEvents)){ 
    $joinedEventsArray = array();
    for ($i=0;$i<sizeof($joinedEvents);$i++) {
      array_push($joinedEventsArray, array(
    "id"=>$joinedEvents[$i]["id"],
    "eventname"=>$joinedEvents[$i]["eventname"],
    "eventdate"=>$joinedEvents[$i]["eventdate"],
    "eventlocation"=>$joinedEvents[$i]["eventlocation"],
    "eventCode"=>$joinedEvents[$i]["eventCode"],
    "userID"=>$joinedEvents[$i]["userID"]
    ));
      
    }
    echo json_encode($joinedEventsArray);
  } else {
    echo json_encode($joinedEvents);
}} else {
    echo json_encode(false);
}
?>