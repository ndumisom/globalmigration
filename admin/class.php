<?php

include('dbinter.php');

class globalm extends dbInteraction {

    function __construct() {
        parent::__construct('localhost', 'root', 'mapapa1531', 'globalmigration_db');
    }

    function login($username, $password) {

        $isFound = false;
        $userID = mysql_real_escape_string($username);
        $userPSWD = md5(mysql_real_escape_string($password));

        if (mysql_num_rows(mysql_query(" select * from users where username = '$username' and password= '$password' ")) == 1) {
            $isFound = true;
        }


        return $isFound;
    }

    function addUser($username, $password, $fname, $surname, $email, $mobile_no, $level) {


        if (mysql_query(" insert into users  values( 0, '$username', '$password', '$fname','$surname','$email','$mobile_no',$level') ")) {
            $isAdded = true;
        }


        return $isAdded;
    }

    function addClient($file_no, $title, $firstnames, $surname, $application_types, $dob, $passport_no, $passport_expiry_date, $country_of_origin, $marital_status, $dependents, $coperate, $business_unit, $in_care_of, $contact_no, $mobile_no, $fax_no, $email, $street_address, $suburb, $city, $country, $code, $date_captured, $captured_by, $consultant, $source_media, $pip, $comments) {


        if (mysql_query(" insert into client_details values( 0,'$file_no','$title','$firstnames','$surname','$application_type','$dob','$passport_no','$passport_expiry_date','$country_of_origin','$marital_status','$dependents','$coperate', '$business_unit','$in_care_of','$contact_no','$mobile_no','$fax_no','$email','$street_address','$suburb','$city','$country','$code','$date_captured','$captured_by','$consultant','$source_media','$pip','$comments') ")) {
            $isAdded = true;
        }


        return $isAdded;
    }

    function addTask($clientID, $consultant, $allocated_task, $allocated_by, $allocated_to, $date_allocated, $due_date, $date_completed, $details) {

        $isAdded = '';
        if (mysql_query(" insert into process_task_allocation values(0,'$clientID','$consultant', '$allocated_task', '$allocated_by', '$allocated_to', '$date_allocated', '$due_date', '$date_completed', '$details') ")) {
            $isAdded = true;
        }


        return $isAdded;
    }

    function addUserEmail($username, $password, $firstname, $surname, $email, $mobile_no, $level, $status) {

        $isAdded = '';
        if (mysql_query(" insert into users  values( 0, '$username', '$password', '$firstname','$surname','$email','$mobile_no','$level','$status','NOW()')")) {
            $isAdded = true;
        }


        return $isAdded;
    }

    function addLog($user_browser, $user_ip, $user_http, $username, $login_time, $logout_time) {

        $isAdded = '';
        if (mysql_query(" insert into logs  values( 0, '$username', '$user_browser', '$user_ip','$user_http','$username','$login_time','$logout_time')")) {
            $isAdded = true;
        }


        return $isAdded;
    }

    function addPermit($clientID, $service, $permit, $permit_status, $permit_number, $submission_office, $submission_date, $date_endorsed, $expiry_date, $dha_reference_no, $dha_case_no, $fee, $invoice_no, $j_invoice_no, $comments) {


        if (mysql_query(" insert into process_task_allocation values(0,'$clientID', '$service', '$permit', '$permit_status', '$permit_number', '$submission_office', '$submission_date', '$date_endorsed', '$expiry_date', '$dha_reference_no', '$dha_case_no', '$fee, $invoice_no', '$j_invoice_no', '$comments') ")) {
            $isAdded = true;
        }


        return $isAdded;
    }

    function printUserDetails($username) {

        return( mysql_fetch_array(mysql_query(" select * from users where username = '$username' ")) );
    }

    function sendMAil() {
        
    }

    function isMSGdeleted($msg_id) {

        $isDeleted = false;

        if (mysql_query(" delete from message where msg_id = '$msg_id' ")) {
            $isDeleted = true;
        }
    }

    function isSENTMSGdeleted($msg_id) {

        $isUpdated = false;

        if (mysql_query(" update message set del = 1 where msg_id = '$msg_id' ")) {
            $isUpdated = true;
        }
    }

    function unreadMSG($to) {

        return mysql_num_rows(mysql_query(" select * from message where to = '$to' and status = 0 "));
    }

    /*  function send_message( $msg_id, $sender, $subject, $text, $msg_date, $From, $to, $status ) {

      $isSent = false;

      if( mysql_query( " insert into message values( $msg_id, '$sender', '$subject', '$text', '$msg_date', '$From', '$To', '$status' ) " ) ) {
      $isSent = true;
      }


      return $isSent;

      } */

    function getUserLevel($permit_appID) {

        $level = '';

        if ($row = mysql_fetch_array(mysql_query(" select * from users where username = '$permit_appID' "))) {
            $level = $row['clientID'];
        }


        return $level;
    }
    
     function getClientID($username) {

        $level = '';

        if ($row = mysql_fetch_array(mysql_query(" select * from permit_applications where username = '$username' "))) {
            $level = $row['level'];
        }


        return $level;
    }
      function getClient($clientID) {

        $client_name = '';

        if ($row = mysql_fetch_assoc(mysql_query(" select * from client_details where clientID = $clientID "))) {
            $client_name = $row['firstnames'].' '.$row['surname'];
        }


        return $client_name ;
    }

    function getUsername($username) {

        $user = '';

        if ($row = mysql_fetch_array(mysql_query(" select * from users where username = '$username' "))) {
            $user = $row['username'];
        }


        return $user;
    }

    function getEmail($username) {

        $email = '';

        if ($row = mysql_fetch_array(mysql_query(" select * from users where email = '$username' "))) {
            $email = $row['email'];
        }


        return $email;
    }

    function isPswdCorrect($pswd, $userID) {

        $encrypt = $pswd;
        $isFound = false;

        if ($row = mysql_fetch_array(mysql_query(" select * from users where username = '$userID' "))) {
            if ($encrypt == $row['password']) {
                $isFound = true;
            }
        }

        return $isFound;
    }

    function updatePSWD($userID, $password) {

        $isUpdated = false;
        $userPSWD = $password;

        if (mysql_query(" update users set password = '$userPSWD' where username = '$userID' ")) {
            $isUpdated = true;
        }


        return $isUpdated;
    }

    function showTask($userID) {

        return mysql_fetch_array(mysql_query(" select * from  process_task_allocation where username = '$msg_id' "));
    }

    function send_message($msg_id, $sender, $subject, $text, $msg_date, $to, $from, $status) {

        $isSent = false;

        if (mysql_query(" insert into message values( '$msg_id', '$sender', '$subject', '$text', NOW(), '$to', '$from', '$status',0 ) ")) {
            $isSent = true;
        }


        return $isSent;
    }

    function showMSGById($msg_id) {

        return mysql_fetch_array(mysql_query(" select * from message where msg_id = '$msg_id' "));
    }

    function markMSGasRead($msg_id) {

        $isUpdated = false;

        if (mysql_query(" update message set status = 0 where msg_id = '$msg_id' ")) {
            $isUpdated = true;
        }


        return $isUpdated;
    }

    function isTask($task_all_id) {

        $isUpdated = false;

        if (mysql_query(" delete from process_task_allocation where task_all_id = '$task_all_id' ")) {
            $isUpdated = true;
        }
    }
    
    function upload_pdf($clientID, $username, $pdf_name, $pdf_url){
        
        return mysql_query("INSERT INTO `pdf_file` VALUES (0, '$clientID', '$username', '$pdf_name', NOW(), '$pdf_url')") ; 
        
    }

    function contact_number_validation($number) {

        if (!ereg("^[0-9]{10}$", $number))
            return false;
        else
            return true;
    }

    function file_validation($file_no) {

        if (!ereg("^[0-9]{9}$", $snumber))
            return false;
        else
            return true;
    }

    function ID_number_validation($ID_number) {

        if (!ereg("^[0-9]{13}$", $ID_number))
            return false;
        else
            return true;
    }

    function unset_session($fname, $lname) {

        if (mysql_num_rows(mysql_query(" select * from users where fname = '$fname' ")) == 1) {

            unset($fname);
            unset($lname);
        }
    }

    function set_session($fname, $lname) {


        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
    }

}

?>