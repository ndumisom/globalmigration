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
    function add_task_request($file_no, $client_name, $required_by, $request, $request_other, $invoice_no, $receipt_no, $approved_by, $consultant, $allocated_to, $allocated_date, $completed_by, $completed_date) {

        $isAdded = '';
        if (mysql_query(" insert into task_request VALUES(NULL ,  '$file_no',  '$client_name',  '$required_by',  '$request',  '$request_other',  '$invoice_no',  '$receipt_no',  '$approved_by',  '$consultant',  '$allocated_to',  '$allocated_date',  '$completed_by',  '$completed_date')")) {
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
    
      function printUserDetails( $username ) {
		  
				  return( mysql_fetch_array( mysql_query( " select * from users where username = '$username' " ) ) );
		  }
    function sendMAil(){
        
    }
	function isMSGdeleted( $msg_id ) {
		        
				   $isUpdated = false; 
				   
			    if( mysql_query( " update message set status = 2 where msg_id = '$msg_id' " ) ) {	
				    $isUpdated = true;
		         }
			 }
                         function isTask( $task_all_id ) {
		        
				   $isUpdated = false; 
				   
			    if( mysql_query( " update process_task_allocation set date_completed=NOW(), status = 2 where task_all_id = '$task_all_id' " ) ) {	
				    $isUpdated = true;
		         }
			 }
			 
			 function isSENTMSGdeleted( $msg_id ) {
		        
				   $isUpdated = false; 
				   
			    if( mysql_query( " update message set del = 1 where msg_id = '$msg_id' " ) ) {	
				    $isUpdated = true;
		         }
			 }
                   
    
      function unreadMSG( $to ) {
				
			    return mysql_num_rows( mysql_query( " select * from message where to = '$to' and status = 0 " ) ); 
		  }
                  
                   function getEmail( $userID ) {
		        
				   $email = '';
				   
			    if( $row = mysql_fetch_array( mysql_query( " select * from users where username = '$userID' " ) ) ) {	
				    $email = $row['email'];
		         }
			 	
				
			 return $email;
				   
		    }
                  
               function send_message( $msg_id, $sender, $subject, $text, $msg_date, $to, $from, $status )  {
		        
				   $isSent = false;
				   				   
			    if( mysql_query( " insert into message values( '$msg_id', '$sender', '$subject', '$text', NOW(), '$to', '$from', '$status' ,0) " ) ) {	
				    $isSent = true;
		         }
			 	
				
			 return $isSent;
				   
		    }

    function getUserLevel($username) {

        $level = '';

        if ($row = mysql_fetch_array(mysql_query(" select * from users where username = '$username' "))) {
            $level = $row['level'];
        }


        return $level;
    }
     function getUsername($username) {

        $user = '';

        if ($row = mysql_fetch_array(mysql_query(" select * from users where username = '$username' "))) {
            $user = $row['username'];
            
        }


        return $user;
    }
       function getFirstname($username) {

        $firstname = '';

        if ($row = mysql_fetch_array(mysql_query(" select * from users where username = '$username' "))) {
              $firstname = $row['firstname'];
            
        }


        return $firstname;
    }
       function getSurname($username) {

        $surname = '';

        if ($row = mysql_fetch_array(mysql_query(" select * from users where username = '$username' "))) {
            $surname = $row['surname'];
        }


        return $surname;
    }
    
     function isPswdCorrect( $pswd, $userID ) {
		        
				$encrypt = $pswd;
			    $isFound = false; 
				
			if( $row = mysql_fetch_array( mysql_query( " select * from users where username = '$userID' " ) ) ) {	
				if( $encrypt == $row['password'] ) {
				         $isFound = true;
				}
			}	
				
			 return $isFound;
			 	
		  }
                 function updatePSWD( $userID, $password ) {
		        
				   $isUpdated = false;
				   $userPSWD = $password;
				   
			    if( mysql_query( " update users set password = '$userPSWD' where username = '$userID' " ) ) {	
				    $isUpdated = true;
		         }
			 	
				
			 return $isUpdated;
				   
		    }

    
    
	function showTask( $userID ) {
		        
			  return mysql_fetch_array( mysql_query( " select * from  process_task_allocation where username = '$msg_id' " ) );
				   
		    }
    
     function showMSGById( $msg_id ) {
		  
				  return mysql_fetch_array( mysql_query( " select * from message where msg_id = '$msg_id' " ) );
		  }
		  
		  function markMSGasRead( $msg_id ) {
		        
				   $isUpdated = false; 
				   
			    if( mysql_query( " update message set status = 0 where msg_id = '$msg_id' " ) ) {	
				    $isUpdated = true;
		         }
			 	
				
			 return $isUpdated;
				   
		    }
                    
       function showTaskId( $task_all_id ) {
		  
				  return mysql_fetch_array( mysql_query( " select * from  process_task_allocation where task_all_id = '$task_all_id' " ) );
		  }
		  
		  function markTaskasRead( $task_all_id) {
		        
				   $isUpdated = false; 
				   
			    if( mysql_query( " update  process_task_allocation set status = 0 where task_all_id = '$task_all_id' " ) ) {	
				    $isUpdated = true;
		         }
			 	
				
			 return $isUpdated;
				   
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