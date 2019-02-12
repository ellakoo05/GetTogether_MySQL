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

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

//$query = "SELECT * FROM users";
$query = "SELECT * FROM users WHERE username='$username'";

$result = $conn->query($query);

if ($result) {
    $users = $result->fetchAll();
    if (!empty($users)) {
        
        echo json_encode(array(
            "status" => true,
            "id" => $users[0]["id"],
            "username" => $username
            "email" => $email
        ));
    } else {
        echo json_encode(false);
    }
} else {
    echo json_encode(false);
}
?>