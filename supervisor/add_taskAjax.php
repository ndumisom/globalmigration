<?php
/**
 * @author Marijan Šuflaj <msufflaj32@gmail.com>
 * @link http://www.php4every1.com
 */
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

$return['error'] = false;

while (true) {
    if (empty($consultant)) {
        $return['error'] = true;
        $return['msg'] = 'Please select a consultant.';
        break;
    }
    if (empty($_POST['allocated_task'])) {
        $return['error'] = true;
        $return['msg'] = 'Please select a task';
        break;
    }
    
    if ($_POST['allocated_by'] == NULL || $_POST['allocated_by']== '') {
    	$return['error'] = true;
    	$return['msg'] = 'Please make sure you are logged in.';
    	break;
    }

    if (empty($_POST['allocated_to'])) {
        $return['error'] = true;
        $return['msg'] = 'Pleaase select allocated to.';
        break;
    }

    if (empty($_POST['due_date'])) {
        $return['error'] = true;
        $return['msg'] = 'Please enter a valid date.';
        break;
    }
     if (empty($_POST['details'])) {
        $return['error'] = true;
        $return['msg'] = 'Please enter client name.';
        break;
    }


    break;
}

if (!$return['error']){
    $sql=mysql_query(" insert into process_task_allocation values(0,'$clientID','$consultant', '$allocated_task', '$allocated_by', '$allocated_to','$date' , '$due_date', '$date_completed', '$details','$status') ");
    if ($sql){
    $return['msg'] = 'The task was sent..... click cancel ';
    }else{$return['error'] = true;}
 /*else {
        $return['error'] = true;
        $return['msg'] = 'The task was not send please try again.';
        break;
    }*/
}
echo json_encode($return);