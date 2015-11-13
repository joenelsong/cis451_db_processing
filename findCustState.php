<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)

    $mysqli = new mysqli("$server", "$user", "$passw", "$dbname");
if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>

<html>
<head>
  <title>Another Simple PHP-MySQL Program</title>
  </head>
  
  <body bgcolor="white">
  
  
  <hr>
  
  
<?php
  
$state = $_POST['state'];

$state = mysqli_real_escape_string($conn, $state);
// this is a small attempt to avoid SQL injection
// better to use prepared statements

//$query = "SELECT DISTINCT firstName, lastName, city FROM customer WHERE state = ";
//$query = $query."'".$state."' ORDER BY 2;";


/* Prepared statement, stage 1: prepare */
if (!($stmt = $mysqli->prepare("SELECT * FROM state"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

?>

<p>
The query:
<p>
<?php
print $query;
?>

<hr>
<p>
Result of query:
<p>

<?php
$result = mysqli_query($conn, $query)
or die(mysqli_error($conn));

print "<pre>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {
    print "\n";
    print "$row[firstName]  $row[lastName] $row[city]";
  }
print "</pre>";

mysqli_free_result($result);

mysqli_close($conn);

?>

<p>
<hr>

<p>
<a href="findCustState.txt" >Contents</a>
of the PHP program that created this page. 	 
 
</body>
</html>
	  
