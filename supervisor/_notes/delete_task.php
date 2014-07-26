<?php

session_start();
require('class.php');
$call = new globalm;

if (isset($_GET['id'])) {
    
    if ($call->deleteTask($_GET['id'])) {
        $_SESSION['message'] = "Task has been cancelled";
        header("location:index.php?m=sent_task");
        exit;
    } else {
        $_SESSION['error'] = "Error task was not completed.";
        header("location:index.php?m=sent_task");
        exit;
    }
} else {
    header("location:index.php?m=sent_task");
    exit;
}
?>		  
