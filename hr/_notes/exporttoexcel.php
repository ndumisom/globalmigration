<?php
header('Content-Type: application/force-download');
header('Content-disposition: attachment; filename=Export_Data.xls');
// Fix for crappy IE bug in download.
header("Expires: ");
header("Pragma: ");
header("Cache-Control: ");
header("Content-Transfer-Encoding: binary ");
echo $_REQUEST['datatodisplay'];
?>
