<?php

session_start();
require_once('class.php');
$call = new globalm;


$clientID = $_POST['clientID'];
$country = $_POST['country'];
$servic = $_POST['service'];
if ($servic != 0) {
    $service = implode("; ", $servic);
} else {
    $service = $_POST['service'];
}

$permit = $_POST['permit'];
$permit_status = $_POST['permit_status'];
$fees = $_POST['fees'];
$contact_dept = $_POST['contact_dept'];
$contact_partner = $_POST['contact_partner'];
$contact_embassy = $_POST['contact_embassy'];
$expiry_date = $_POST['expiry_date'];
$comments = $_POST['comments'];

//Current Permit Application
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

        $sql = mysql_query("insert into current_permit VALUES ( NULL , '$clientID', '$c_permit',  '$c_permit_status',  '$c_permit_no ', '$c_permit_expiry',  '$c_permit_comment')");
        $sql1 = mysql_query("insert into african_permit VALUES ( NULL , '$clientID ', '$country', '$service',  '$permit',  '$permit_status', '$fees',  '$contact_dept',  '$contact_partner', '$contact_embassy',  '$expiry_date', '$comments')");
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

        $sql3 = mysql_query("insert into african_permit VALUES ( NULL , '$clientID ', '$country', '$service',  '$permit',  '$permit_status', '$fees',  '$contact_dept',  '$contact_partner', '$contact_embassy',  '$expiry_date', '$comments')");
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