<?php
/*

A quick script to demo the use of the export-xls.class.php script.

*/


#include the export-xls.class.php file
require('export-xls.class.php');

mysql_connect ("localhost", "root", "mapapa1531") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("globalmigration_db");

$filename = 'Reports.xls'; // The file name you want any resulting file to be called.

#create an instance of the class
$xls = new ExportXLS($filename);


#lets set some headers for top of the spreadsheet

#add blank line
$header = null;
$xls->addHeader($header);

#add 2nd header as an array of 3 columns\
/*
$header[] = "Name";
$header[] = "Age";
$header[] = "Height";

$xls->addHeader($header);

*/
# Lets add some sample data
#
# Of course this can be from a SQL query or anyother data source
#

#first line
$sql = mysql_query("SELECT * FROM client_details,permit_applications WHERE client_details.clientID=permit_applications.clientID");

$field = mysql_num_fields($sql);

for($i = 0; $i<$field; $i++){
    
    $names[] = mysql_field_name($sql, $i);
}

$xls->addRow($names);

while ($row = mysql_fetch_assoc($sql)) {
    $xls->addRow($row);
}


/*#second line
$row = array();
$row[] = "Jim";
$row[] = "22";
$row[] = "5ft 5";
$xls->addRow($row);

#add a multi dimension array
$row = array();
$row[] = array(0 =>'Jess', 1=>'54', 2=>'4ft');
$row[] = array(0 =>'Luke', 1=>'6', 2=>'2ft');
$xls->addRow($row);

*/
# You can return the xls as a variable to use with;
# $sheet = $xls->returnSheet();
#
# OR
#
# You can send the sheet directly to the browser as a file 
#
$xls->sendFile();


?>