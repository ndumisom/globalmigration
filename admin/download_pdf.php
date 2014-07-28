<?php
// your file to upload
$file = '2007_SalaryReport.pdf';
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-type: application/pdf");
// tell file size
header('Content-length: '.filesize($file));
// set file name
header('Content-disposition: attachment; filename='.basename($file));
readfile($file);
// Exit script. So that no useless data is output-ed.
exit;
?>



<form action="<?php print $PHP_SELF?>" enctype="multipart/form-data" method="post">
   Last Name:<br /> <input type="text" name="name" value="" /><br />
   Class Notes:<br /> <input type="file" name="classnotes" value="" /><br />
   <p><input type="submit" name="submit" value="Submit Notes" /></p>
</form>

<?php
   define ("FILEREPOSITORY","./");

   if (is_uploaded_file($_FILES['classnotes']['tmp_name'])) {

      if ($_FILES['classnotes']['type'] != "application/pdf") {
         echo "<p>Class notes must be uploaded in PDF format.</p>";
      } else {
         $name = $_POST['name'];
         $result = move_uploaded_file($_FILES['classnotes']['tmp_name'], FILEREPOSITORY."/$name.pdf");
         if ($result == 1) echo "<p>File successfully uploaded.</p>";
         else echo "<p>There was a problem uploading the file.</p>";
      } #endIF
   } #endIF
?>


<html>
<head>
<title>A file upload script</title>
</head>
<?php
$file_dir = ".";
$file_url = ".";
if ( isset( $fupload ) ){
   print "path: $fupload<br>\n";
   print "name: $fupload_name<br>\n";
   print "size: $fupload_size bytes<br>\n";
    print "type: $fupload_type<p>\n\n";
   if ( $fupload_type == "image/gif" ){
     copy ( $fupload, "$file_dir/$fupload_name") or die ("Couldn't copy");
     print "<img src=\"$file_url/$fupload_name\"><p>\n\n";
   }
}
?>
<body>
<form enctype="multipart/form-data" action="<?php print $PHP_SELF?>" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="51200">
    <input type="file" name="fupload">
    <input type="submit" value="Send file!">
</form>
</body>
</html>

