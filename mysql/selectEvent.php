<?php
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: GET, POST");
//header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

if($_SERVER['HTTP_ORIGIN'] == "http://gettogetherbcit.herokuapp.com/mysql/selectEvent.php") {
    header('Access-Control-Allow-Origin: http://gettogetherbcit.herokuapp.com/mysql/selectEvent.php');
    header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
} else {    
  header('Content-Type: text/html');
  echo "<html>";
  echo "<head>";
  echo "   <title>Another Resource</title>";
  echo "</head>";
  echo "<body>",
       "<p>This resource behaves two-fold:";
  echo "<ul>",
         "<li>If accessed from <code>http://arunranga.com</code> it returns an XML document</li>";
  echo   "<li>If accessed from any other origin including from simply typing in the URL into the browser's address bar,";
  echo   "you get this HTML document</li>", 
       "</ul>",
     "</body>",
   "</html>";
}

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