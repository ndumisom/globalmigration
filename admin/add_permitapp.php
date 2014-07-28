<?php

session_start();
require_once('class.php');
$call = new globalm;


$clientID = $_POST['clientID'];
$servic = $_POST['service'];
if ($servic != 0) {
    $service = implode("; ", $servic);
} else {
    $service = $_POST['service'];
}

$permit = mysql_real_escape_string(trim(($_POST['permit'])));
$permit_status = trim($_POST['permit_status']);
$pre_submission_date = trim($_POST['pre_submission_date']);
$memo_issue_date = trim($_POST['memo_issue_date']);
$permit_no = trim($_POST['permit_no']);
$submission_office = trim($_POST['submission_office']);
$submission_date = trim($_POST['submission_date']);
$date_endorsed = trim($_POST['date_endorsed']);
$expiry_date = trim($_POST['expiry_date']);
$process_by = trim($_POST['process_by']);
$dha_reference_no = trim($_POST['dha_reference']);
$dha_case_no = trim($_POST['dha_case_no']);
$fee = trim($_POST['fee']);
$invoice_no = trim($_POST['invoice_no']);
$j_invoice_no = trim($_POST['j_invoice_no']);
$eligible_for_pr = trim($_POST['eligible_for_pr']);
$comments = trim($_POST['comments']);
//Current permit
$current_permit = trim($_POST['current_permit']);
$c_permit = trim($_POST['c_permit']);
$c_permit_status = trim($_POST['c_permit_status']);
$c_permit_no = trim($_POST['c_permit_no']);
$c_permit_expiry = trim($_POST['c_permit_expiry']);
$c_permit_comment = trim($_POST['c_permit_comment']);


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
        $sql1 = mysql_query("insert into permit_applications VALUES ( NULL ,  '$clientID ',  '$service',  '$permit',  '$permit_status', '$pre_submission_date', '$memo_issue_date', '$permit_no',  '$submission_office',  '$submission_date',  '$date_endorsed',  '$expiry_date', '$process_by',  '$dha_reference_no',  '$dha_case_no',  '$fee',  '$invoice_no',  '$j_invoice_no', '$eligible_for_pr', '$comments')");
        if ($sql && $sql1) {
            $_SESSION['msg'] = "Permit application was entered succesfuly";
            header("location:admin_index.php?m=redirect");
            exit;
        } else {
            $_SESSION['error'] = "Failure please try again.";


            header("location:admin_index.php?m=permit&id=" . $clientID . "");
            exit;
        }
    }

    //Requested permit	 
    if ($current_permit == 'no') {

        $sql3 = mysql_query("insert into permit_applications VALUES ( NULL ,  '$clientID',  '$service',  '$permit',  '$permit_status', '$pre_submission_date', '$memo_issue_date', '$permit_no',  '$submission_office',  '$submission_date',  '$date_endorsed', '$process_by',  '$expiry_date',  '$dha_reference_no',  '$dha_case_no',  '$fee',  '$invoice_no',  '$j_invoice_no', '$eligible_for_pr', '$comments')");
        if ($sql3) {
            $_SESSION['msg'] = "Permit application was entered succesfuly";
            header("location:admin_index.php?m=redirect");
            exit;
        } else {
            $_SESSION['error'] = "Failure please try again.";


            header("location:admin_index.php?m=new_permit&id=" . $clientID . "");
            exit;
        }
    }
}
?>