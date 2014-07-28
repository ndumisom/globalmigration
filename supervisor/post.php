<?php
/**
 * @author Marijan Šuflaj <msufflaj32@gmail.com>
 * @link http://www.php4every1.com
 */

$return['error'] = false;

while (true) {
    if (empty($_POST['consultant'])) {
        $return['error'] = true;
        $return['msg'] = 'Please select a consultant.';
        break;
    }
    if (empty($_POST['allocated_task'])) {
        $return['error'] = true;
        $return['msg'] = 'Please select a task';
        break;
    }
    
    /*if ($_POST['allocated_by'] == NULL || $_POST['allocated_by']== '') {
    	$return['error'] = true;
    	$return['msg'] = 'Please make sure you are logged in.';
    	break;
    }
*/
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
    $return['msg'] = 'You\'ve entered: ' . $_POST['allocated_by'] . ' as email, ' . $_POST['allocated_to'] . ' as name and ' . $_POST['detais'] . ' as url.';
}
echo json_encode($return);