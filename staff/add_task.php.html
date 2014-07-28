<?php

session_start();

require('class.php');
$call = new globalm;
$clientID = $_POST['clientID'];
$consultant = trim($_POST['consultant']);
$allocated_task = trim($_POST['allocated_task']);
$allocated_by = trim($_POST['allocated_by']);
$allocated_to = trim($_POST['allocated_to']);
$due_date = trim($_POST['due_date']);
$date_completed = trim($_POST['date_completed']);
$details = trim($_POST['details']);
$date = date("Y-m-d H:i:s");
$status = 1;


if (isset($_POST['Submit'])) {

    if (trim($consultant == '')) {
        $_SESSION['error'] = "Please enter consultant.";
        header("location:index.php?m=task");
        exit;
    } else if (trim($allocated_task == '')) {
        $_SESSION['error'] = "Please enter the task";
        header("location:index.php?m=task");
        exit;
    } else if (trim($allocated_by == '')) {
        $_SESSION['error'] = "Enter the task allocater";
        header("location:index.php?m=task");
        exit;
    } else if (trim($due_date == '')) {
        $_SESSION['error'] = "Please enter the due date.";
        header("location:index.php?m=task");
        exit;
    } else if (trim($details == '')) {
        $_SESSION['error'] = "Please enter the details.";
        header("location:index.php?m=task");
        exit;
    }


    $sql = mysql_query(" insert into process_task_allocation values(0,'$clientID','$consultant', '$allocated_task', '$allocated_by', '$allocated_to','$date' , '$due_date', '$date_completed', '$details','$status') ");
    //  $sql1 = mysql_query("insert into  message values(0, '$allocated_by','$allocated_task','$details','$date' ,'$allocated_to', '$consultant', '$status')");

    if ($sql) {

        $_SESSION['msg'] = "The task was allocated to " . $allocated_to;
        ;
        header("location:index.php?m=task");
        exit;
    } else {
        $_SESSION['error'] = "Failure please try again.";


        header("location:index.php?m=task");
        exit;
    }
}
?>