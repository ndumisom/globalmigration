<?php

//$pages = array('profile' => 'pages/profile.php', 'message' => 'pages/msg.php', 'task' => 'pages/task_allocation.php', 'view_details' => 'pages/edit_client.php', 'view_permit' => 'pages/view_permit.php');
//if(isset($_GET['page']))
//{
//    if(array_key_exists($_GET['page'],$pages))
//    {
//          include($pages[$_GET['page']]);
//    }
//
//if(isset(array_key_exists($_GET['page']))
//{   
	if ($_GET['page'] == 'profile') {
		require("pages/profile.php");
	} else if ($_GET['page'] == 'message') {
		require("pages/msg.php");
	} else if ($_GET['page'] == 'task') {
		require("pages/task_allocation.php");
	} else if ($_GET['page'] == 'change_password') {
		require("change_password.php");
	} else if ($_GET['page'] == 'task') {
		require("task_allocation.php");
	} else if ($_GET['name']) {
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
	} else if ($_GET['page'] == 'cas') {
		require 'pages/cas.php';
	}else if($_GET['page'] == 'history'){
		require 'pages/status_history.php';
	} else if ($_GET['page']== 'read') {
                require("pages/read_message.php");
        }else if($_GET['page'] == 'compose'){
		require 'pages/compose.php';
	} else if($_GET['page'] == 'sent_msg'){
		require 'pages/sent_msg.php';
	}else if($_GET['page'] == 'read_sent'){
		require 'pages/read_sent.php';
	}
	//Supervisor sub menu
	else if($_GET['page'] == 'status'){
		require 'pages/permit_status.php';
	}else if($_GET['page'] == 'task_request'){
		require 'pages/list_request.php';
	}else if($_GET['page'] == 'view_request'){
		require 'pages/view_task_request.php';
	}
    
    //Allocate Task
    else if($_GET['page'] == 'allocate_task'){
		require 'pages/task_allocation.php';
	}else if($_GET['page'] == 'task_request'){
		require 'pages/task_request.php';
	} else if ($_GET['page'] == 'sent_task') {
        require 'pages/sent_task.php';
    }  else if ($_GET['page'] == 'show_task') {
        require 'pages/tasks.php';
    } else if ($_GET['page'] == 'list_to') {
        require 'pages/list_to.php';
    } else if ($_GET['page'] == 'list_task') {
        require 'pages/list_task.php';
    }else if ($_GET['page'] == 'list_details') {
        require 'pages/list_details.php';
    }else if($_GET['page'] == 'view_chart'){
        require 'pages/view_pieChart.php';
    }
    
    //reports
     else if ($_GET['page'] == 'reports') {
        require 'pages/reports.php';
    } else if ($_GET['page'] == 'view_report') {
        require 'pages/view_report.php';
    }
	   else {
		require 'pages/view_client1.php';
	}
//}
?>
