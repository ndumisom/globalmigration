<?php

//$pages = array('profile' => 'pages/profile.php', 'message' => 'pages/msg.php', 'task' => 'pages/task_allocation.php', 'view_details' => 'pages/edit_client.php', 'view_permit' => 'pages/view_permit.php');
//if(isset($_GET['page']))
//{
//    if(array_key_exists($_GET['page'],$pages))
//    {
//          include($pages[$_GET['page']]);
//    }
// 

if (isset($_GET['page'])) {  


if ($_GET['page'] == 'profile') {
    require("pages/profile.php");
} 

if ($_GET['page'] == 'reply1') {
    require("pages/reply1.php");
}if ($_GET['page'] == 'p_reply1') {
    require("pages/p_reply1.php");
}else if ($_GET['page'] == 'list_details') {
    require("pages/list_details.php");
}else if ($_GET['page'] == 'allocate_task') {
    require("pages/task_allocation.php");
}else if ($_GET['page'] == 'delete_task') {
    require("pages/delete_task.php");
} else if ($_GET['page'] == 'show_task') {
    require 'pages/tasks.php';
}else if ($_GET['page'] == 'view_chart') {
    require("pages/view_pieChart.php");
}else if ($_GET['page'] == 'list_task') {
    require("pages/list_task.php");
}
else if ($_GET['page'] == 'list_to') {
    require("pages/list_to.php");
}else if ($_GET['page'] == 'sent_task') {
    require("pages/sent_task.php");
}
else if ($_GET['page'] == 'message') {
    require("pages/msg.php");
}else if ($_GET['page'] == 'exporttoexcel') {
    require("pages/exporttoexcel.php");
}
else if ($_GET['page'] == 'search_results') {
    require("pages/results_of_search.php");
}

 else if ($_GET['page'] == 'task') {
    require("pages/task_allocation.php");
} else if ($_GET['page'] == 'change_password') {
    require("change_password.php");
} else if ($_GET['page'] == 'task') {
    require("task_allocation.php");
} else if (isset($_GET['name'])) {
    require 'pages/search2.php';
} else if ($_GET['page'] == 'edit_client') {
    //To Do Change the name to view client
    require 'pages/edit_client.php';
} else if ($_GET['page'] == 'view_permit') {
    require 'pages/view_permit.php';
} else if ($_GET['page'] == 'activity') {
    require 'pages/client_activity_sheet.php';
}  else if($_GET['page']=='request'){
            require 'pages/task_request.php';
}
  else if($_GET['page']=='task_request'){
            require 'pages/task_request.php';
} 
  else if($_GET['page']=='p_task_allocation'){
            require 'pages/p_task_allocation.php';
} 


else if ($_GET['page'] == 'cas') {
    require 'pages/cas.php';
}else if($_GET['page'] == 'history'){
    require 'pages/status_history.php';
}else if($_GET['page'] == 'compose'){
    require 'pages/compose.php';
}else if($_GET['page'] == 'send_msg'){
    require 'pages/p_compose.php';
} 


 else if($_GET['page'] == 'sent_msg'){
    require 'pages/sent_msg.php';
}
//Staff sub menu
else if($_GET['page'] == 'status'){
    require 'pages/permit_status.php';
// }else if($_GET['page'] == 'task_request'){
//     require 'pages/task_request.php';
// }

}else if($_GET['page'] == 'view_clients'){
    require 'pages/view_client1.php';
}  
else if($_GET['page'] == 'view_request'){
    require 'pages/view_task_request.php';
}
else if($_GET['page'] == 'update_task_request'){
    require 'pages/update_task_request.php';
}





  else if ($_GET['page'] == 'searchname') {
    require 'Searchcategory.php';
}
 else if ($_GET['page'] == 'reports') {
    require 'pages/repor.php';
}
 else if ($_GET['page'] == 'quotes') {
    require 'pages/quotes.php';
}

 else if ($_GET['page'] == 'send_quotes') {
    require 'pages/p_quotes.php';
}

 else if ($_GET['page'] == 'list_quote') {
    require 'pages/list_quotes.php';
}
 else if ($_GET['page'] == 'test') {
    require 'pages/repor.php';
}

else if ($_GET['page'] == 'tests') {
    require 'pages/report.php';
}

else if ($_GET['page'] == 'view_report') {
    require 'pages/view_report.php';
}

else if ($_GET['page'] == 'read') {
    require("pages/read_message.php");
}
else if ($_GET['page'] == 'read_sent') {
    require("pages/read_sent.php");
}
else if ($_GET['page'] == 'delete_msg') {
    require("pages/delete_msg.php");
}
else if ($_GET['page'] == 'msg') {
    require("pages/msg.php");
}
else if ($_GET['page'] == 'reply') {
    require("pages/reply.php");
}
else if ($_GET['page'] == 'p_reply') {
    require("pages/p_reply.php");
}
}
   else {
    require 'pages/view_client1.php';
}
?>
