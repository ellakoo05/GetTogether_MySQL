<!DOCTYPE html>
<html lang="en">
    <head>  
  
    </head>
    <body>
        
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
  echo "<h1>Events</h1>";
  
  $res2 = mysqli_query($conn,"SELECT * FROM events");
  
  if (mysqli_num_rows($res2) > 0) {
        //echo "we have some results";
        
        //we will generate some dymaic sql
        while($row = mysqli_fetch_assoc($res2)) {
          
          echo "{$row['eventname']}";
          echo "{$row['eventdate']}";
          echo "{$row['eventlocation']}";
            
    }}}

mysqli_close($conn);

//header("Location:http://localhost:8080/mainpage");
//exit;

?>
<br>
</body>
</html>