<?php
require_once "database.php";

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "SELECT  *FROM client_details WHERE firstnames LIKE '%" . $q . "%' OR surname LIKE '%" . $q . "%' OR file_no LIKE '%" . $q . "%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['firstnames'].' '.$rs['surname'];
	echo "$cname\n";
}
?>