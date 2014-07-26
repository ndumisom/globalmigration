<?php
session_start();
require "database.php";
$userfinal=$_SESSION['log'];
$user=$userfinal;
?>
<form name="message" action="messageck.php"
method="post">
<input type="text" name="message_title"> Title: <br>
<input type="text" name="message_to"> To: <br>
Message: <br>
<textarea rows="20" cols="50" name="message_content">
</textarea>
<?php
echo '<input type="hidden" name="message_from" value="'.$user.'"><br>';
?>
<input type="submit" value="Submit">
</form>