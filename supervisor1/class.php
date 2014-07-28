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

    function addPermit($clientID, $service, $permit, $permit_status, $permit_number, $submission_office, $submission_date, $date_endorsed, $expiry_date, $dha_reference_no, $dha_case_no, $fee, $invoice_no, $j_invoice_no, $comments) {


        if (mysql_query(" insert into process_task_allocation values(0,'$clientID', '$service', '$permit', '$permit_status', '$permit_number', '$submission_office', '$submission_date', '$date_endorsed', '$expiry_date', '$dha_reference_no', '$dha_case_no', '$fee, $invoice_no', '$j_invoice_no', '$comments') ")) {
            $isAdded = true;
        }


        return $isAdded;
    }

    function printUserDetails($user_id) {

        return( mysql_fetch_array(mysql_query(" select *from users where userID = '$user_id' ")) );
    }

    function sendMAil() {
        
    }

    function isMSGdeleted($msg_id) {

        $isDeleted = false;

        if (mysql_query(" delete from message where msg_id = '$msg_id' ")) {
            $isDeleted = true;
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

    function getUserLevel($username) {

        $level = '';

        if ($row = mysql_fetch_array(mysql_query(" select * from users where username = '$username' "))) {
            $level = $row['level'];
        }


        return $level;
    }

    function showTask($userID) {

        return mysql_fetch_array(mysql_query(" select * from  process_task_allocation where username = '$msg_id' "));
    }

    function send_message($msg_id, $sender, $subject, $text, $msg_date, $To, $status) {

        $isSent = false;

        if (mysql_query(" insert into message values( $msg_id, '$sender', '$subject', '$text', '$msg_date',  '$To', '$status' ) ")) {
            $isSent = true;
        }


        return $isSent;
    }

    function isPswdCorrect($pswd, $userID) {

        $encrypt = $pswd;
        $isFound = false;

        if ($row = mysql_fetch_array(mysql_query(" select * from users where userID = '$userID' "))) {
            if ($encrypt == $row['password']) {
                $isFound = true;
            }
        }

        return $isFound;
    }

    function updatePSWD($userID, $password) {

        $isUpdated = false;
        $userPSWD = $password;

        if (mysql_query(" update users set password = '$userPSWD' where userID= '$userID' ")) {
            $isUpdated = true;
        }


        return $isUpdated;
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

    function showTaskId($task_all_id) {

        return mysql_fetch_array(mysql_query(" select * from  process_task_allocation where task_all_id = '$task_all_id' "));
    }

    function markTaskasRead($task_all_id) {

        $isUpdated = false;

        if (mysql_query(" update  process_task_allocation set status = 0 where task_all_id = '$task_all_id' ")) {
            $isUpdated = true;
        }


        return $isUpdated;
    }

    function getEmail($userID) {

        $email = '';

        if ($row = mysql_fetch_array(mysql_query(" select * from users where userID = '$userID' "))) {
            $email = $row['email'];
        }


        return $email;
    }

    function getUserClientID($username) {

        $clientID = '';

        if ($row = mysql_fetch_array(mysql_query(" select clientID from users where username = '$username' "))) {
            $clientID = $row['clientID'];
        }


        return $clientID;
    }

    function get_permit_status($clientID) {

        $permit = '';

        if ($row = mysql_fetch_array(mysql_query(" select permit_status from permit_applications where clientID=$clientID "))) {
            $permit = $row['permit_status'];
        }


        return $permit;
    }

//Check  does the user exist
    function GetUserFromEmail($email, $user_rec) {


        $result = mysql_query("Select * from users where email='$email'");

        if (!$result || mysql_num_rows($result) <= 0) {
            return false;
        }


        return $user_rec = mysql_fetch_assoc($result);
        ;
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

    // Send confirmation link
    function SendResetPasswordLink($email, $user_rec) {


        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Host = "mail.gmims.co.za";
        $mailer->SMTPAuth = true;                  // enable SMTP authentication
        $mailer->Host = "mail.gmims.co.za"; // sets the SMTP server
        $mailer->Port = 25;                    // set the SMTP port for the GMAIL server
        $mailer->Username = "admin@gmims.co.za"; // SMTP account username
        $mailer->Password = "minda2011";        // SMTP account password


        $mailer->CharSet = 'utf-8';

        $mailer->AddAddress($email, $this->GetInfo($email));

        $mailer->Subject = "Your reset password request at " . 'http://remote.gmims.co.za/';

        $mailer->From = "admin@gmims.co.za";

        $link = $this->GetAbsoluteURLFolder() .
                '/reset.php?email=' .
                $email . '&code=' .
                md5(urlencode($this->GetResetPasswordCode($email)));

        $mailer->Body = "Hello " . $this->GetInfo($email) . "\r\n\r\n" .
                "There was a request to reset your password at " . 'http://remote.gmims.co.za/' . "\r\n" .
                "Please click the link below to complete the request: \r\n" . $link . "\r\n" .
                "Regards,\r\n" .
                "Global Migration\r\n" .
                'www.globalimsa.com';

        if (!$mailer->Send()) {

            return false;
        }
        return true;
    }

    function GetAbsoluteURLFolder() {
        $scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
        $scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
        return $scriptFolder;
    }

    function GetResetPasswordCode($email) {

        return substr(md5($email . $this->GetAbsoluteURLFolder()), 0, 10);
    }

    function GetInfo($email) {

        $name = '';
        $sql = mysql_query("Select * from users where email='$email'");
        $row = mysql_fetch_assoc($sql);
        return $name = $row['firstname'];
    }

    function SendNewPassword($email, $new_password) {

        $sql = mysql_query("Select * from users where email='$email'");
        $user_rec = mysql_fetch_array($sql);

        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Host = "mail.gmims.co.za";
        $mailer->SMTPAuth = true;                  // enable SMTP authentication
        $mailer->Host = "mail.gmims.co.za"; // sets the SMTP server
        $mailer->Port = 25;                    // set the SMTP port for the GMAIL server
        $mailer->Username = "admin@gmims.co.za"; // SMTP account username
        $mailer->Password = "minda2011";        // SMTP account password


        $mailer->CharSet = 'utf-8';

        $mailer->AddAddress($email, $user_rec['firstname']);

        $mailer->Subject = "Your new password for http://remote.gmims.co.za/";

        $mailer->From = "admin@gmims.co.za";

        $mailer->Body = "Hello " . $user_rec['name'] . "\r\n\r\n" .
                "Your password is reset successfully. " .
                "Here is your updated login:\r\n" .
                "username:" . $user_rec['username'] . "\r\n" .
                "password:$new_password\r\n" .
                "\r\n" .
                "Login here: " . $this->GetAbsoluteURLFolder() . "/index.php\r\n" .
                "\r\n" .
                "Regards,\r\n" .
                "Webmaster\r\n" .
                'www.satrafficupdates.co.za';

        if (!$mailer->Send()) {
            $_SESSION['error'] = ("Error the message was not sent to: $email");

            exit;
            return false;
        }
        header('location:index.php?page=reset_m');
        return true;
    }

    function ChangePasswordInDB($user_rec, $newpwd) {


        $qry = "Update users Set password='" . $newpwd . "'  where  userID=" . $user_rec . "";

        if (!mysql_query($qry)) {
            $_SESSION['error'] = ("Error updating the password \nquery:$qry");
            header('location:forgot_password.php');
            exit;
            return false;
        }
        return true;
    }

    function ResetUserPasswordInDB($email) {
        $sql = mysql_query("Select * from users where email='$email'");
        $user_rec = mysql_fetch_array($sql);

        $new_password = substr(md5(uniqid()), 0, 10);

        if (false == $this->ChangePasswordInDB($user_rec['userID'], $new_password)) {
            return false;
        }
        return $new_password;
    }

}

?>