<?php $random_id_length = 10;

//generate a random id encrypt it and store it in $rnd_id
$rnd_id = crypt(uniqid(rand(),1));

//to remove any slashes that might have come
$rnd_id = strip_tags(stripslashes($rnd_id));

//Removing any . or / and reversing the string
$rnd_id = str_replace(".","",$rnd_id);
$rnd_id = strrev(str_replace("/","",$rnd_id));

//finally I take the first 10 characters from the $rnd_id
$password = substr($rnd_id,0,$random_id_length);
$username = $surname;

$to      = 'masande@localhost';
$subject = 'Check your login details';
$message = 'Dear'. "\r\n" .'Welcome to Global Migration'. "\r\n" .''. "\r\n" ;
$message.= 'Here are your login details'. "\r\n" .'username : Masande'. "\r\n" .' Password :'.$password.' '. "\r\n" .'To login click to the link http://localhost/globalmigration/';
$headers = 'From: none-reply@globalimsa.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    	if(mail($to, $subject, $message, $headers)){
		echo 'the email was sent';
		}
		else{
		echo 'ERROR';		}
?>