
<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
<tr><td><p><h3> <a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;">Upload Files for <? echo $call->getClient($_GET['id']);?>  <a/></h3></p>
        <p>&nbsp;</p>
        <?php
define("FILEREPOSITORY", "../client_files/");
include_once 'class.php';
$call = new globalm;

$max_size = 1000000;
$file_size=$HTTP_POST_FILES['pdf']['size'];
$clientID = $_POST['ClientID'];
$username = $_SESSION['log']; //Session username
$pdf_name = $_POST['pdf_name'];
  
   
        
if (isset($_FILES['pdf'])) {
      
     if($pdf_name == ''){
        echo "<p>Please enter the PDF File Name</p>";
    }
    
    if ($_FILES['pdf']['size']> $max_size ){
       
        echo "<p>File size is too bigs.</p>";
    }

    if (is_uploaded_file($_FILES['pdf']['tmp_name'])) {

        if ($_FILES['pdf']['type'] != "application/pdf") {
            echo "<p>File must be uploaded in PDF format.</p>";
        } else {
            $pdf_url = $call->getClient($clientID);
            if (!is_dir(FILEREPOSITORY . $pdf_url)) {
                mkdir(FILEREPOSITORY . $pdf_url);
            }



            $result = move_uploaded_file($_FILES['pdf']['tmp_name'], FILEREPOSITORY . $pdf_url . "/" . "$pdf_name.pdf");
            $result .= $call->upload_pdf($clientID, $username, $pdf_name, $pdf_url);
            
            if ($result)
                
                echo "<span id='msg'><p>File successfully uploaded.</p>";
            else
                echo "<span id='error'><p>There was a problem uploading the file.</p>";
        }
    }
}
?>
<form action=" " enctype="multipart/form-data" method="post" id="form1">
    <input type="hidden" name="ClientID" value="<? echo $_GET['id']; ?>" />
    
    <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $up_id; ?>"/>
    
    PDF File Name:<br /> <input type="text" name="pdf_name" value="" /><br /> 
    <br /> <input type="file" name="pdf" id="file" size="30"/><br />
    <br />
    
    <p><input type="submit" name="submit" value=" Upload " class="login"/></p>
</form>


<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
    </td>
</tr>
</table>