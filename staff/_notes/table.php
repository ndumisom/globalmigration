<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
<title>BAND Function</title>

</head>

<style type="text/css">

    body {

        font-family:Verdana, Arial, Helvetica, sans-serif;

        font-size:12px;

        margin:0px;

        padding:0px;

    }

    #atd td{

        padding:3px;

        font-weight:bold;

    }

    #avg_col{

        background-color:#CCFFCC;

    }

    #ctbl, #ctbl td{

        padding:5px;

        border: 1px solid black;

        border-collapse:collapse;

    }
</style>

<html>

<body>

<?
   require_once 'class.php';
$call = new globalm ;
$table_name = users;

$query = "SELECT *
FROM $table_name";	
$result = mysql_query($query) or die(mysql_error());


while($data = mysql_fetch_array($result, MYSQL_NUM))
{
$pattern[] = implode("\t", $data);
$html[] = "<tr><td>" . implode("</td><td>", $data) . "</td></tr>";
}

$pattern = implode("\r\n", $pattern);
$html = "<table>" . implode("\r\n", $html) . "</table>";
$date = date('Y-m-d');
$file_name = $table_name . $date . "_report.xls";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file_name");
echo $pattern;
?>

THIS IS THE CODE MADE INTO A FUNCTION :

<?php
function convertToExcel($table_name)
{
require_once "db_connect.php";
//be sure to connect to db

$query = "SELECT *
FROM $table_name";	
$result = mysql_query($query) or die(mysql_error());


while($data = mysql_fetch_array($result, MYSQL_NUM))
{
$pattern[] = implode("\t", $data);
$html[] = "<tr><td>" . implode("</td><td>", $data) . "</td></tr>";
}

$pattern = implode("\r\n", $pattern);
$html = "<table>" . implode("\r\n", $html) . "</table>";
$date = date('Y-m-d');
$file_name = $table_name . "_" . $date . "report.xls";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file_name");
echo $pattern;

}

?>

</body>

</html>
