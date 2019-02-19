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
//$eventCode = $_POST['eventCode'];

//$query = "SELECT * FROM users";
//$query = "SELECT * FROM events INNER JOIN joinevents ON events.eventCode=joinevents.eventCode WHERE userID='$userID'";
$query = "SELECT * FROM events INNER JOIN tasks ON events.eventCode=tasks.eventCode WHERE events.eventCode='$eventCode'";

error_log($query);
$result = $conn->query($query);

if ($result) {
    $eventTasks = $result->fetchAll();
  if(!empty($joinedEvents)){ 
    $eventTasksArray = array();
    for ($i=0;$i<sizeof($eventTasks);$i++) {
      array_push($eventTasksArray, array(
    "id"=>$eventTasks[$i]["id"],
    "tasks"=>$eventTasks[$i]["tasks"],
    ));
      
    }
    echo json_encode($joinedEventsArray);
  } else {
    echo json_encode($joinedEvents);
}} else {
    echo json_encode(false);
}
?>