<?php
session_start();
require_once "database.php";
include_once 'class.php';



$q = strtolower($_GET["q"]);
if (!$q) return;
$call = new globalm;
$firstname = $call->getFirstname($_SESSION['log']);
$sql = "SELECT  *FROM client_details WHERE corporate = '$firstname'  AND  (firstnames LIKE '%" . $q . "%' OR surname LIKE '%" . $q . "%')";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['firstnames'].' '.$rs['surname'];
	echo "$cname\n";
}
?>