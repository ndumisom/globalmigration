<?php
require_once "database.php";

$q = stripslashes(mysql_real_escape_string(strtolower($_GET["q"])));

if (!$q) { echo 'No results';}

$sql = "SELECT  *FROM client_details WHERE firstnames LIKE '%" . $q . "%' OR surname LIKE '%" . $q . "%' OR file_no LIKE '%" . $q . "%'";
$rsd = mysql_query($sql);
if(!$rsd ){
   die("Enter valid data");
}
$no = mysql_num_rows($rsd);

if($no <1 ){
    echo 'No results';
}
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['firstnames'].' '.$rs['surname'];
	echo "$cname\n";
}

?>