<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

$hostname = "tk3mehkfmmrhjg0b.cbetxkdyhwsb.us-east-1.rds.amazonaws.com"; 
$username = "sbib1pmzgwmexs5g"; 
$password = "tk4m14h6yyt889va";
$dbname = "fvtmkfyz8ymzy8a1";
$port = "3306";

// Check connection
$conn = mysqli_connect($hostname, $username, $password, $dbname, $port);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
else {
$sql = "INSERT INTO users (username, password, email) VALUES ('{$_POST["username"]}','{$_POST["password"]}','{$_POST["email"]}')";
}

$res2 = mysqli_query($conn,$sql);

//if($res2 === TRUE){
//echo "New record created successfully"; 
//}
//else{
//echo "Insert failed"; 
//};
//
//header("Location:http://localhost:8080/mainpage");
//exit;

?>