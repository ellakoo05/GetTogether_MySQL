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

//$query = "SELECT * FROM users";
$query = "SELECT * FROM events INNER JOIN joinevents ON events.eventCode=joinevents.eventCode WHERE userID='$userID'";
error_log($query);
$result = $conn->query($query);

if ($result) {
    $joinedEvents = $result->fetchAll();
    error_log($userID);
    error_log(empty($joinedEvents));
  error_log(implode($joinedEvents));
  if(!empty($joinedEvents)){ 
    error_log($joinedEvents[0]["eventname"]);
    echo json_encode(array(
    "status"=>true,
    "id"=>$joinedEvents[0]["id"],
    "eventname"=>$joinedEvents[0]["eventname"],
    "eventdate"=>$joinedEvents[0]["eventdate"],
    "eventlocation"=>$joinedEvents[0]["eventlocation"]
    ));
  } else {
    echo json_encode($joinedEvents);
}} else {
    echo json_encode(false);
}
?>