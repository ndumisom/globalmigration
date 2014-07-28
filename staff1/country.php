<?php
$host = "localhost";
$uname = "root";
$pass = "mapapa1531";
$database = "globalmigration_db";

$connection=mysql_connect($host,$uname,$pass) or die("connection in not ready <br>");
$result=mysql_select_db($database) or die("database cannot be selected <br>");

if (isset($_REQUEST['query'])) {

	$q = $_REQUEST['query'];
	
	$sql = mysql_query ("SELECT  *FROM client_details WHERE firstnames LIKE '%" . $q . "%' OR surname LIKE '%" . $q . "%' OR file_no LIKE '%" . $q . "%'");
	$array = array();
	
	while ($row = mysql_fetch_assoc($sql)) {
		$array[] = $row['firstnames'].' '.$row['surname'];
	}
	
	echo json_encode ($array); //Return the JSON Array

}

?>
