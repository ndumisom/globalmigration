<?php

session_start();
require_once('class.php');
$call = new globalm;

$file_no = trim($_POST['file_no']);
$title = trim($_POST['title']);
$surname = ucfirst(trim($_POST['surname']));
$firstnames = ucfirst(trim($_POST['firstnames']));
$application_type = trim($_POST['application_type']);
$dob = trim($_POST['dob']);
$passport_no = trim($_POST['passport_no']);
$passport_expiry_date = trim($_POST['passport_expiry_date']);
$country_of_origin = trim($_POST['country_of_origin']);
$marital_status = trim($_POST['marital_status']);
$dependents = trim($_POST['dependents']);
$corporate = trim($_POST['corporate']);
$business_unit = trim($_POST['business_unit']);
$hr_department = trim($_POST['hr_department']);
$in_care_of = trim($_POST['in_care_of']);
$in_care_email = trim($_POST['in_care_email']);
$contact_no = trim($_POST['contact_no']);
$mobile_no = trim($_POST['mobile_no']);
$fax_no = trim($_POST['fax_no']);
$email = trim($_POST['email']);
$street_address = trim($_POST['street_address']);
$suburb = trim($_POST['suburb']);
$city = trim($_POST['city']);
$country = trim($_POST['country']);
$code = trim($_POST['code']);
$date_captured = date('d-m-y : H:i:s');
$captured_by = trim($_POST['captured_by']);
$consultant = trim($_POST['consultant']);
$responsible_for_acc = trim($_POST['responsible_for_acc']);
$source_media = trim($_POST['source_media']);
$pip = trim($_POST['pip']);
$comments = trim($_POST['comments']);
$destination_country = $_POST['destination_country'];


$username = $_POST['email'];
$firstname = $_POST['firstnames'];
$level = 4;

//Message
$im_sender = "Notice";
$im_subject = "File opened for";
$im_text = 'Client Name : ' . $firstnames. '\t\t\t';
$im_text .= ' ' . $surname . '\n';
$im_text .= 'File No : ' . $file_no . '\n\n';
$im_text .= 'Consultant : ' . $consultant . '\n\n';
$arrto = array("superkeith", "superwendy", "supertarine");
$im_status = 1;



$random_id_length = 10;

//generate a random id encrypt it and store it in $rnd_id
$rnd_id = crypt(uniqid(rand(), 1));

//to remove any slashes that might have come
$rnd_id = strip_tags(stripslashes($rnd_id));

//Removing any . or / and reversing the string
$rnd_id = str_replace(".", "", $rnd_id);
$rnd_id = strrev(str_replace("/", "", $rnd_id));

//finally I take the first 10 characters from the $rnd_id
$password = substr($rnd_id, 0, $random_id_length);



$to = $_POST['email'];
$subject = 'Check your login details';
$message = 'Dear ' . $firstnames . ' ' . $surname . "\r\n" . 'Welcome to Global Migration' . "\r\n" . '' . "\r\n";
$message.= 'Here are your login details' . "\r\n" . 'username :' . $username . "\r\n" . 'Password :' . $password . ' ' . "\r\n" . 'To login click to the link http://localhost/globalmigration/' . "\r\n";
$message.= 'Warm Regards' . "\r\n" . 'Global Migration South Africa';
$headers = 'From: none-reply@globalimsa.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();



if (isset($_POST['Submit'])) {

    if (trim($file_no == '')) {
        $_SESSION['error'] = "Please enter file number.";
        header("location:admin_index.php?m=client");
        exit;
    } else if (trim($title == '----Select----' || $title == null)) {
        $_SESSION['error'] = "Please select a title.";
        header("location:admin_index.php?m=client");
        exit;
    } else if (trim($surname == '')) {
        $_SESSION['error'] = "Please enter Surname.";
        header("location:admin_index.php?m=client");
        exit;
    } else if (trim($firstnames == '')) {
        $_SESSION['error'] = "Please enter the email.";
        header("location:admin_index.php?m=client");
        exit;
    } else if (trim($email == '')) {
        $_SESSION['error'] = "Please enter  email address.";
        header("location:admin_index.php?m=client");
        exit;
       
    }
    $sql = mysql_query(" insert into client_details values( 0,'$file_no','$title','$firstnames','$surname','$application_type','$dob','$passport_no','$passport_expiry_date','$country_of_origin','$marital_status','$dependents','$corporate', '$business_unit','$hr_department','$in_care_of','$in_care_email','$contact_no','$mobile_no','$fax_no','$email','$street_address','$suburb','$city','$country','$code',NOW(),'$captured_by','$consultant','$source_media','$responsible_for_acc','$pip','$comments','$destination_country') ");
    //$insert = mysql_query(" insert into users  values( 0, '$username', '$password', '$fname','$surname','$email','$mobile_no',$level') ");
    if ($sql) {
        if (mysql_query("insert into users  values( 0, '$username', '$password', '$firstname','$surname','$email','$mobile_no','$level')")) {
            mail($to, $subject, $message, $headers);
        }
        $_SESSION['msg'] = "The client was created succesfuly";
    } else {
        $_SESSION['error'] = "Failure please try again.";
        
        header("location:admin_index.php?m=client");
        exit;
      
    }
    if ($sql) {
        foreach ($arrto as $im_to) {
            mysql_query(" insert into message values( NULL, '$im_sender', '$im_subject', '$im_text', NOW(), '$im_to', '$im_from', '$im_status' ,0) ");
        }
    }
}
?>