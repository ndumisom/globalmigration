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
}else if ($_GET['m'] == 'read_sent') {
    require("read_sent.php");
}

 else if ($_GET['m'] == 'reply') {
    require("reply.php");
} else if ($_GET['m'] == 'alter_permit') {
    require'alter_permtapp.php';
} else if ($_GET['m'] == 'edit_client') {
    require("edit_client.php");
} else if ($_GET['m'] == 'e_task') {
    require 'edit_task';
} else if ($_GET['m'] == 'e_permit') {
    require 'edit_permit.php';
} else if ($_GET['m'] == 'show_task') {
    require 'tasks.php';
} 
//Search function
else if ($_GET['name']) {
    require 'search2.php';
} else if ($_GET['m'] == 'view_client') {
    require 'view_client1.php';
} else if ($_GET['m'] == 'edit_client') {
    require 'edit_client.php';
} else if ($_GET['m'] == 'redirect') {
    require 'redirect.php';
} else if ($_GET['m'] == 'send_memo') {
    require 'send_memo.php';
} else if ($_GET['m'] == 'status') {
    require 'permit_status.php';
} else if ($_GET['m'] == 'view') {
    require 'view_task.php';
} else if ($_GET['m'] == 'update_client') {
    require '';
} else if ($_GET['m'] == 'sent_task') {
    require 'sent_task.php';
} else if ($_GET['m'] == 'new_permit') {
    require 'new_permit.php';
} else if ($_GET['m'] == 'sent_msg') {
    require 'sent_msg.php';
} else if ($_GET['m'] == 'view_users') {
    require 'view_users.php';
} else if ($_GET['m'] == 'view_permit') {
    require 'view_permit.php';
} else if ($_GET['m'] == 'activity') {
    require 'client_activity_sheet.php';
} else if ($_GET['m'] == 'cas') {
    require 'cas.php';
} else if ($_GET['m'] == 'e_c_permit') {
    require 'edit_c_permit.php';
} else if ($_GET['m'] == 'reports') {
    require 'reports.php';
} else if ($_GET['m'] == 'view_report') {
    require 'view_report.php';
} else if($_GET['m']=='expiry'){
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
} else if($_GET['m'] == 'upload_file'){
    require 'upload_file.php';
} 
else if($_GET['m'] == 'view_file'){
    require 'view_file.php';
} 
//Permits in countries
else if($_GET['m'] == 'botswana'){
    require 'permit_countries/botswana.php';
} else if($_GET['m'] == 'burundi'){
    require 'permit_countries/burundi.php';
} else if($_GET['m'] == 'ethiopia'){
    require 'permit_countries/ethiopia.php';
} else if($_GET['m'] == 'kenya'){
    require 'permit_countries/kenya.php';
} else if($_GET['m'] == 'malawi'){
    require 'permit_countries/malawi.php';
} else if($_GET['m'] == 'mozambique'){
    require 'permit_countries/mozambique.php';
} else if($_GET['m'] == 'rwanda'){
    require 'permit_countries/rwanda.php';
} else if($_GET['m'] == 'tanzania'){
    require 'permit_countries/tanzania.php';
} else if($_GET['m'] == 'uganda'){
    require 'permit_countries/uganda.php';
} else if($_GET['m'] == 'zimbabwe'){
    require 'permit_countries/zimbabwe.php';
 
} else if($_GET['m'] == 'zambia'){
    require 'permit_countries/zambia.php';
 
}else if($_GET['m'] == 'e_a_permit'){
    require 'edit_african_permit.php';
 
}else if($_GET['m'] == 'add_permit'){
    require 'add_permitapp.php';
    
}else if($_GET['m'] == 'updates'){
    require 'updates.php';
}
else if($_GET['m'] == 'pr_pending'){
    require 'pr_pending.php';
}else if($_GET['m'] == 'trp_pending'){
    require 'trp_pending.php';
}
else if($_GET['m'] == 'history'){
    require 'status_history.php';
}else if($_GET['m'] == 'empty_fields'){
    require 'empty_field_report.php';
}
else if($_GET['m'] == 'view_empty'){
    require 'view_empty_report.php';
}else if($_GET['m'] == 'file_opened'){
    require 'file_opened_report.php';
}else if($_GET['m'] == 'view_file_opened'){
    require 'view_file_opened_report.php';
}else if($_GET['m'] == 'ministerial'){
	require 'ministerial.php';
}else if($_GET['m'] == 'edit_ministerial'){
	require 'edit_ministerial.php';
}else if($_GET['m'] == 'ministerial_report'){
	require 'ministerial_report.php';
}else if($_GET['m'] == 'view_ministerial_report'){
	require 'view_ministerial_report.php';
}else if($_GET['m'] == 'invoice'){
	require 'invoice.php';
}else if($_GET['m'] == 'view_invoice'){
	require 'view_invoice.php';
}
    else {

    require("client_details.php");
}
?>
