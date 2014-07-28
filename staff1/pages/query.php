<?php
define("EMAIL", "test@localhost");
 
if(isset($_POST['submit'])) {
 
  include('p_query.php');
 
  //assign post data to variables
  $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
 
  //start validating our form
  $v = new validate();
  $v->validateStr($name, "name", 3, 75);
  $v->validateEmail($email, "email");
  $v->validateStr($message, "message", 5, 1000); 
 
  if(!$v->hasErrors()) {
        $header = "From: $email\n" . "Reply-To: $email\n";
        $subject = "Contact Form Subject";
        $email_to = EMAIL;
 
        $emailMessage = "Name: " . $name . "\n";
        $emailMessage .= "Email: " . $email . "\n\n";
        $emailMessage .= $message;
 
    //use php's mail function to send the email
        @mail($email_to, $subject ,$emailMessage ,$header ); 
 
    //grab the current url, append ?sent=yes to it and then redirect to that url
        $url = "http". ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        header('Location: '.$url."?sent=yes");
 
    } else {
    //set the number of errors message
    $message_text = $v->errorNumMessage();      
 
    //store the errors list in a variable
    $errors = $v->displayErrors();
 
    //get the individual error messages
    $nameErr = $v->getError("name");
    $emailErr = $v->getError("email");
    $messageErr = $v->getError("message");
  }//end error check
}// end isset
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow"/>
<title>Simple PHP Form Demo | Box Model Junkie</title>
<style type="text/css">
body {
  margin:0;
  padding:0;
  font-family:Arial, Helvetica, sans-serif;
  font-size:12px;
 
  color:#fff;
}
#contact_form_wrap {
  margin:0 auto;
  margin-top:50px;
  padding:10px;
  width:350px;
}
.message {
  font-weight:bold;
}
.errors {
  color:#af1010;
}
label {
    font-weight:bold;
}
.textfield {
    padding:5px 0 0 3px;
    width:297px;
    height:20px;
    border: 1px solid #e9e9e9;
    background-color:#303942;
    color:#fff;
}
.textarea {
    padding:3px;
    width:294px;
    height:144px;
    border: 1px solid #e9e9e9;
    background-color:#303942;
    font-family:Arial, Helvetica, sans-serif;
    font-size:12px;
    color:#fff;
}
.button {
    padding:3px 0 5px 0;
    width:75px;
    height:25px;
    border: none;
    background-color:#303942;
    font-weight:bold;
    cursor:pointer;
    color: #fff;
    font-family:Arial, Helvetica, sans-serif;
}
.button:hover {
    background-color:#f1f1f1;
    color: #333;
}
</style>
</head>
<body>
  <div id="contact_form_wrap">
    <span class="message"><?php echo $message_text; ?></span>
    <?php echo $errors; ?>
    <?php if(isset($_GET['sent'])): ?><h2>Your message has been sent</h2><?php endif; ?>
    <form id="contact_form" method="post" action="">
      <p><label>Name:<br />
      <input type="text" name="name" class="textfield" value="<?php echo htmlentities($name); ?>" />
      </label><br /><span class="errors"><?php echo $nameErr; ?></span></p>
 
      <p><label>Email: <br />
      <input type="text" name="email" class="textfield" value="<?php echo htmlentities($email); ?>" />
      </label><br /><span class="errors"><?php echo $emailErr ?></span></p>         
 
      <p><label>Message: <br />
      <textarea name="message" class="textarea" cols="45" rows="5"><?php echo htmlentities($message); ?></textarea>
      </label><br /><span class="errors"><?php echo $messageErr ?></span></p>
 
      <p><input type="submit" name="submit" class="button" value="Submit" /></p>
    </form>
  </div>
 
</body>
</html>