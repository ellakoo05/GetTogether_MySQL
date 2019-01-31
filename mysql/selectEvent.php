<?php
//header('Access-Control-Allow-Origin: https://developer.mozilla.org
//Vary: Origin');
//header('Access-Control-Allow-Methods: GET, POST');
//header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    $ret = [
        'result' => 'OK',
    ];
    print json_encode($ret);

try {
    $conn = new PDO("mysql:host=tk3mehkfmmrhjg0b.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=fvtmkfyz8ymzy8a1", "sbib1pmzgwmexs5g", "tk4m14h6yyt889va");
}
catch(PDOException $e)
{
    echo "Error: " .$e->getMessage();
}

$eventname=$_POST['eventname']
$eventdate =$_POST['eventdate'];
$eventlocation =$_POST['eventlocation'];
$eventtime =$_POST['eventtime'];

//$query = "SELECT * FROM users";
$query = "SELECT * FROM events WHERE eventname='$eventname', eventdate='$eventdate', eventlocation='$eventlocation', AND eventtime='$eventtime'";

$result = $conn->query($query);
if($result){
$users = $result->fetchAll();
echo json_encode($users);
} else {
    echo json_encode (false);
}
?>