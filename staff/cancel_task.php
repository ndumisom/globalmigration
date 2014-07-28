<?
session_start();
require('class.php');
$call = new globalm;

if (isset($_GET['id'])) {
    if ($call->cancel_task($_GET['id'])) {
        $_SESSION['message'] = "Task has been cancelled.";
        header("location:index.php?m=show_task");
        exit;
    } else {
        $_SESSION['message'] = "Task has been cancelled.";
        header("location:index.php?m=show_task");
        exit;
    }
} else {
    header("location:index.php?m=show_task");
    exit;
}
?>		  
