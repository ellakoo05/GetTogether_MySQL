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

$username     = $_POST['username'];
$email     = $_POST['email'];
$password = $_POST['password'];

//$query = "SELECT * FROM users";
$query = "INSERT INTO users (username, password, email) VALUES ('{$_POST['username']}','{$_POST['password']}','{$_POST['email']}')";

$result = $conn->query($query);
if ($result) {
    $events = $result->fetchAll();
    echo json_encode($events);
} else {
    echo json_encode(false);
}

header("Location:http://localhost:8080/mainpage");
exit;

?>