<?php

if ($_GET['m'] == 'add') {
    require("add_user.php");
} else if ($_GET['m'] == 'client') {
    require("client_details.php");
} else if ($_GET['m'] == 'task') {
    require("task_allocation.php");
} else if ($_GET['m'] == 'permit') {
    require("permit_application.php");
} else if ($_GET['m'] == 'profile') {
    require 'profile.php';
} else if ($_GET['m'] == 'msg') {
    require("msg.php");
} else if ($_GET['m'] == 'compose') {
    require("compose.php");
} else if ($_GET['m'] == 'read') {
    require("read_message.php");
} else if ($_GET['m'] == 'seach') {
    require("seach.php");
} else if ($_GET['m'] == 'change_p') {
    require 'change_password.php';
} else if ($_GET['m'] == 'send_memo') {
    require 'send_memo.php';
} else if ($_GET['m'] == 'status') {
    require 'permit_status.php';
} else if ($_GET['m'] == 'reply') {
    require("reply.php");
} else if ($_GET['m'] == 'view_permit') {
    require 'view_permit.php';
} else if ($_GET['m'] == 'edit_client') {
    require("edit_client.php");
} else if ($_GET['m'] == 'show_task') {
    require 'tasks.php';
} else if ($_GET['m'] == 'view') {
    require 'view_task.php';
} else if ($_GET['m'] == 'memo') {
    require 'checklist.php';
} else if ($_GET['m'] == 'sent_msg') {
    require 'sent_msg.php';
} else if ($_GET['m'] == 'sent_task') {
    require 'sent_task.php';
} //Calling search page by Masande
else if ($_GET['name']) {
    require 'search2.php';
} else if ($_GET['m'] == 'name') {
    require 'search2.php';
} else if ($_GET['m'] == 'activity') {
    require 'client_activity_sheet.php';
} else if ($_GET['m'] == 'cas') {
    require 'cas.php';
} else if ($_GET['m'] == 'list_to') {
    require 'list_to.php';
} else if ($_GET['m'] == 'list_task') {
    require 'list_task.php';
} else if ($_GET['m'] == 'list_details') {
    require 'list_details.php';
} else if ($_GET['m'] == 'kick') {
    require 'kickout.php';
} else if ($_GET['m'] == 'read_sent') {
    require 'read_sent.php';
} else if ($_GET['m'] == 'reports') {
    require 'reports.php';
} else if ($_GET['m'] == 'view_report') {
    require 'view_report.php';
}  else if($_GET['m']=='expiry'){
            require 'expiry_dates.php';
 }else if($_GET['m']=='view_request'){
            require 'view_task_request.php';
 }
 else if($_GET['m']=='show_request'){
            require 'show_task_request.php';
 }
  else if($_GET['m']=='p_task'){
            require 'p_task_request.php';
 }
  else if($_GET['m']=='update_task'){
            require 'update_task_request.php';
 } else if($_GET['m']=='task_request'){
            require 'list_request.php';
 }
 else if($_GET['m']=='request'){
            require 'task_request.php';
} else if ($_GET['m'] == 'edit_request') {
    require 'edit_task_request.php';
}
else if($_GET['m'] == 'history'){
    require 'status_history.php';
}else if($_GET['m'] == 'view_chart'){
    require 'view_pieChart.php';
} else {
    require("view_client1.php");
}
?>
