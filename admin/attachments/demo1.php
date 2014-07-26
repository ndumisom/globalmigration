<?

session_start();
require_once('class.php');
$call = new globalm;
if (isset($_POST['Submit'])) {

    $mobile_no = $_POST['cell_no'];
    $firstname = $_POST['fname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $status = 1;
    $sql = mysql_query("insert into users  values( 0, '$username', '$password', '$firstname','$surname','$email','$mobile_no','$level','$status','NOW()')");

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
    $username = $firstname;


// Please specify your Mail Server - Example: mail.yourdomain.com.
    ini_set("SMTP", "smtp.gmims.co.za");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
    ini_set("smtp_port", "25");
//ini_set("username","admin@gmims.co.za");
//ini_set("password","masande");
// Please specify the return address to use
    ini_set('sendmail_from', 'admin@globalimsa.com');

    $to = $_POST['email'];
// The message
    $message = 'Dear ' . $firstname . ' ' . $surname . "\r\n" . 'Welcome to Global Migration' . "\r\n" . '' . "\r\n";
    $message.= 'Here are your login details' . "\r\n" . 'username :' . $username . "\r\n" . 'Password :' . $password . ' ' . "\r\n" . 'To login click to the link http://localhost/globalmigration/' . "\r\n";
    $message.= 'Warm Regards' . "\r\n" . 'Global Migration South Africa';
    $subject = 'Check your login details';
    $headers = 'From: none-reply@globalimsa.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
// In case any of our lines are larger than 70 characters, we should use wordwrap()
    $message = wordwrap($message, 70);

// Send

    $i = mail($to, $subject, $message, $headers);
    if ($i) {

        $_SESSION['msg'] = "The user was entered succesfuly";
        header("location:admin_index.php?m=add");
        exit;
    } else {
        $_SESSION['error'] = "Failure please try again.";


        header("location:admin_index.php?m=add");
        exit;
    }
}
?>