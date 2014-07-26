<HTML>
<HEAD>
<TITLE> PHP File Upload Script </TITLE>
</HEAD>
<BODY>
<?php
if( isset($_POST['submit1'])) {
// $_FILES is the array auto filled when you upload a file and submit a form.
$userfile_name = $_FILES['file1']['name']; // file name
$userfile_tmp  = $_FILES['file1']['tmp_name']; // actual location
$userfile_size  = $_FILES['file1']['size']; // file size
$userfile_type  = $_FILES['file1']['type']; // mime type of file sent by browser. PHP doesn't check it.
$userfile_error  = $_FILES['file1']['error']; // any error!. get from here

// Content uploading.
$file_data = '';
if ( !empty($userfile_tmp))
{
// We encode the data just to make it more database friendly
$file_data = base64_encode(@fread(fopen($userfile_tmp, 'r'), filesize($userfile_tmp) ) );
}

switch (true)
{
// Check error if any
case ($userfile_error == UPLOAD_ERR_NO_FILE):
case empty($file_data):
echo 'You must select a document to upload before you can save this page.';
exit;
break;
case ($userfile_error == UPLOAD_ERR_INI_SIZE):
case ($userfile_error == UPLOAD_ERR_FORM_SIZE):
echo 'The document you have attempted to upload is too large.';
break;

case ($userfile_error == UPLOAD_ERR_PARTIAL):
echo 'An error occured while trying to recieve the file. Please try again.';
break;

}

if( !empty($userfile_tmp))
{
// only MS office and text file is accepted.
if( !(($userfile_type=="application/msword") || ($userfile_type=="text/plain")) )
{echo 'Your File Type is:'. $userfile_type;
echo '<br>File type must be text(.txt) or msword(.doc).';

exit;
}
}
echo filesize($userfile_tmp);
}
?>

<form name="profile" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" target="_self" enctype="multipart/form-data" >

<P align ="center"><input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="file1" value="AttachFile" device="files" accept="text/*" tabindex=18 >

<input type="submit" name="submit1" value="Submit" />
</P>

</form>

</BODY>
</HTML>