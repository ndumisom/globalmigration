<?

session_start();
require_once('class.php');
$call = new globalm;

if (isset($_POST['submit'])) {

    $file_no = $_POST['file_no'];
    $title = $_POST['title'];
    $surname = $_POST['surname'];
    $firstnames = $_POST['firstnames'];
    $application_type = $_POST['application_type'];
    $dob = $_POST['dob'];
    $passport_no = $_POST['passport_no'];
    $passport_expiry_date = $_POST['passport_expiry_date'];
    $country_of_origin = $_POST['country_of_origin'];
    $marital_status = $_POST['marital_status'];
    $dependents = $_POST['dependents'];
    $corporate = $_POST['corporate'];
    $business_unit = $_POST['business_unit'];
    $hr_department = trim($_POST['hr_department']);
    $in_care_of = $_POST['in_care_of'];
    $in_care_email = $_POST['in_care_email'];
    $contact_no = $_POST['contact_no'];
    $mobile_no = $_POST['mobile_no'];
    $fax_no = $_POST['fax_no'];
    $email = $_POST['email'];
    $street_address = $_POST['street_address'];
    $suburb = $_POST['suburb'];
    $city = $_POST['city'];
    $country = $_POST['country'] ;
    $code = $_POST['code'];
    $consultant = $_POST['consultant'];
    $source_media = $_POST['source_media'];
    $responsible_for_acc = trim($_POST['responsible_for_acc']);
    $pip = $_POST['pip'];
    $captured_by = $_POST['captured_by'];
    $comments = $_POST['comments'];
    $clientID = $_POST['clientID'];
    
    
   $sql = mysql_query("UPDATE client_details SET  file_no =  '$file_no', title = '$title', surname =  '$surname', firstnames =  '$firstnames', application_type =  '$application_type', dob =  '$dob', passport_no =  '$passport_no', passport_expiry_date =  '$passport_expiry_date', country_of_origin =  '$country_of_origin', marital_status =  '$marital_status', dependents =  '$dependents', corporate =  '$corporate', business_unit =  '$business_unit', hr_department = '$hr_department', in_care_of = '$in_care_of', in_care_email = '$in_care_email', contact_no = '$contact_no', mobile_no = '$mobile_no', fax_no = '$fax_no', email = '$email', street_address = '$street_address', suburb = '$suburb', city = '$city', country = '$country', code ='$code', captured_by = '$captured_by', consultant = '$consultant', source_media = '$source_media',responsible_for_acc = '$responsible_for_acc', pip = '$pip', comments = '$comments' WHERE  clientID =' $clientID'");
    if ($sql) {
        $_SESSION['msg'] = "  Client details was updated successful....";
        header("location:admin_index.php?m=edit_client&id=" . $clientID . "");
        exit;
    } else {
        $_SESSION['error'] = 'Failure please try again.';


        header("location:admin_index.php?m=edit_client&id=" . $clientID . "");
        exit;
    }

    
}
?>