<?php
session_start();

define("FILEREPOSITORY", "../client_files/");
include_once 'class.php';
$call = new globalm;

$max_size = 100000;
$file_size=$HTTP_POST_FILES['pdf']['size'];
$clientID = $_POST['ClientID'];
$username = $_SESSION['log']; //Session username
$pdf_name = $_POST['pdf_name'];
  if(isset($_POST['submit'])){
    if($pdf_name == ''){
        $_SESSION['error'] = "<p>Please enter the PDF File Name</p>";
        header("location:admin_index.php?m=upload_file&id=$clientID");
        exit;
    }
    if($HTTP_POST_FILES['pdf'] == NULL){
        $_SESSION['error'] = "<p>Please choose a PDF File</p>";
         header("location:admin_index.php?m=upload_file&id=$clientID");
         exit;
    }
    if ($_FILES['pdf']['type']> $max_size = 100000){
       
        $_SESSION['error'] = "<p>File size is too bigs.</p>";
        header("location:admin_index.php?m=upload_file&id=$clientID");
         exit;
    }
        
if (isset($_FILES['pdf'])) {
  

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
  }
?>