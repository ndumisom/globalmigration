<?php

session_start();
require_once('class.php');
$call = new globalm;

$country = $_POST['country'];
$clientID = $_POST['clientID'];
$servic = $_POST['service'];
if ($servic != 0) {
    $service = implode("; ", $servic);
} else {
    $service = $_POST['service'];
}

$permit = $_POST['permit'];
$permit_status = $_POST['permit_status'];
$permit_no = $_POST['permit_no'];
$submission_office = $_POST['submission_office'];
$submission_date = $_POST['submission_date'];
$date_endorsed = $_POST['date_endorsed'];
$expiry_date = $_POST['expiry_date'];
$dha_reference_no = $_POST['dha_reference'];
$dha_case_no = $_POST['dha_case_no'];
$fee = $_POST['fee'];
$invoice_no = $_POST['invoice_no'];
$j_invoice_no = $_POST['j_invoice_no'];
$comments = $_POST['comments'];
$current_permit = $_POST['current_permit'];
$c_permit = $_POST['c_permit'];
$c_permit_status = $_POST['c_permit_status'];
$c_permit_no = $_POST['c_permit_no'];
$c_permit_expiry = $_POST['c_permit_expiry'];
$c_permit_comment = $_POST['c_permit_comment'];


if (isset($_POST['Submit'])) {
    /*
      if(trim($permit =='')){
      $_SESSION['error']="Please enter permit.";
      header("location:admin_index.php?m=permit");
      exit;

      }
      else if(trim($permit_no == '')){
      $_SESSION['error']="Please enter permit number";
      header("location:admin_index.php?m=permit");
      exit;

      }

      else if(trim($permit_status =='')){
      $_SESSION['error']="Please enter permit status.";
      header("location:admin_index.php?m=permit");
      exit;

      }
      else if(trim($submission_office =='')){
      $_SESSION['error']="Please enter the  Surname.";
      header("location:admin_index.php?m=permit");
      exit;

      }


     */
    //// current permit
    if ($current_permit == 'yes') {

        $sql = mysql_query("insert into current_permit VALUES ( NULL ,  '$clientID', '$c_permit',  '$c_permit_status',  '$c_permit_no ', '$c_permit_expiry',  '$c_permit_comment')");
        $sql1 = mysql_query("insert into permit_applications VALUES ( NULL ,  '$clientID ',  '$service',  '$permit',  '$permit_status',  '$permit_no',  '$submission_office',  '$submission_date',  '$date_endorsed',  '$expiry_date',  '$dha_reference_no',  '$dha_case_no',  '$fee',  '$invoice_no',  '$j_invoice_no',  '$comments')");
        if ($sql && $sql1) {
            $_SESSION['msg'] = "Permit application was entered succesfuly";
            header("location:admin_index.php?m=redirect");
            exit;
        } else {
            $_SESSION['error'] = "Failure please try again.";


            header("location:admin_index.php?m=$country&id=" . $clientID . "");
            exit;
        }
    }

    //Requested permit	 
    if ($current_permit == 'no') {

        $sql3 = mysql_query("insert into permit_applications VALUES ( NULL ,  '$clientID ',  '$service',  '$permit',  '$permit_status',  '$permit_no',  '$submission_office',  '$submission_date',  '$date_endorsed',  '$expiry_date',  '$dha_reference_no',  '$dha_case_no',  '$fee',  '$invoice_no',  '$j_invoice_no',  '$comments')");
        if ($sql3) {
            $_SESSION['msg'] = "Permit application was entered succesfuly";
            header("location:admin_index.php?m=redirect");
            exit;
        } else {
            $_SESSION['error'] = "Failure please try again.";


            header("location:admin_index.php?m=$country&id=" . $clientID . "");
            exit;
        }
    }
}
?>