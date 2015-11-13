<?php
include('connectionData.txt');

$mysqli = new mysqli($server, $user, $pass, $dbname, $port);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
/* create a prepared statement */
$sql = "SELECT s.description as 'Item Description', sum(i.total_price) as 'Revenues' FROM stock s JOIN manufact m using(manu_code) JOIN items i using(stock_num) WHERE m.manu_name = ? group by s.description";
if (!($stmt = $mysqli->prepare($sql))) {
	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

/* Prepared statement, stage 2: bind and execute */
$m = $_POST['state'];
if (!$stmt->bind_para("s", $m)) { // bind variables
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
 
if (!$stmt->execute()) {
	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

//$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
//or die('Error connecting to MySQL server.');

?>

<html>
<head>
  <title>Another Simple PHP-MySQL Program</title>
  </head>
  
  <body bgcolor="white">
  
  
  <hr>
  
  
<?php
  
//$state = $_POST['state'];

//$state = mysqli_real_escape_string($conn, $state);
// this is a small attempt to avoid SQL injection
// better to use prepared statements

//$query = "SELECT DISTINCT firstName, lastName, city FROM customer WHERE state = ";
//$query = $query."'".$state."' ORDER BY 2;";

?>

<p>
The query:
<p>
<?php
//print $query;
?>

<hr>
<p>
Result of query:
<p>

<?php
//$result = mysqli_query($conn, $query)
//or die(mysqli_error($conn));

print "<pre>";
//while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  //{
    //print "\n";
    //print "$row[firstName]  $row[lastName] $row[city]";
  //}
print "</pre>";

//mysqli_free_result($result);

//mysqli_close($conn);

?>

<p>
<hr>

<p>
<a href="findCustState.txt" >Contents</a>
of the PHP program that created this page. 	 
 
</body>
</html>