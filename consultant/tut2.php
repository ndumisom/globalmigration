<?php
require_once("../dompdf/dompdf_config.inc.php");

$id =$_GET['id'];
$html = file_get_contents('http://localhost/globalmigration/consultant/view_quotes.php?i='.$id);

$dompdf = new DOMPDF(); 
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("Masande_Mbondwana.pdf", array("Attachment" => 0));
?>