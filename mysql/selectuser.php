<?php
session_start(); 

$hostname = "tk3mehkfmmrhjg0b.cbetxkdyhwsb.us-east-1.rds.amazonaws.com"; 
$username = "sbib1pmzgwmexs5g"; 
$password = "tk4m14h6yyt889va";
$dbname = "fvtmkfyz8ymzy8a1";
// Check connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}


else {
$sql = "INSERT INTO events (eventname, eventdate, eventtime, eventlocation, eventend, eventenddate) VALUES ('{$_POST["eventname"]}','{$_POST["eventdate"]}','{$_POST["eventtime"]}','{$_POST["eventlocation"]}','{$_POST["eventend"]}','{$_POST["eventenddate"]}')";
}

echo $sql;  
$res2 = mysqli_query($conn,$sql);
//echo $res2;
//if($res2 === TRUE){
//echo "New record created successfully"; 
//}
//else{
//echo "Insert failed"; 
//};
//
header("Location:http://localhost:8080/eventpage");
exit;

?>