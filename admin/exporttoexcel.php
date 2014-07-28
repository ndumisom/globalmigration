<?php
header('Content-Type: application/force-download');
header('Content-Type: text/html; charset=utf-8'); 
header('Content-disposition: attachment; filename=Report.xls');
// Fix for crappy IE bug in download.
header("Expires: ");
header("Pragma: ");
header("Cache-Control: ");
header("Content-Transfer-Encoding: none ");
echo $_REQUEST['datatodisplay'];
?>
