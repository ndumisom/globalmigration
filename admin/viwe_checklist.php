<?php
require('class.php');
$call = new globalm;

$q=$_GET["q"];
$to='test@localhost';
$subject = 'Required documents';
$headers = "\r\n". 'From: none-reply@globalimsa.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$sql = mysql_query("select *from doc_required");
 echo '<table border="1">';
 
 while( $row = mysql_fetch_array($sql)){


if($q == 2){
  $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['visitors_permit'].'</td></tr>';
  }
 
  
 if($q == 3){
  $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['visitors_permit_academic'].'</td></tr>';
  
  }
  
  else if( $q == 4 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['visitors_permit_voluntary'].'</td></tr>';
  }
   
  else if( $q == 5 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['vvisitors_permit_research'].'</td></tr>';
  }
  
     else if( $q == 6 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['visitors_permit_spousedependent'].'</td></tr>';
  }
  
      else if( $q == 7 ){
    $message ='<tr><td>'.$row['essential'].'</td><td>' .$row['visitors_permit_prhold'].'</td></tr>';
  }
      else if( $q == 8 ){
    $message ='<tr><td>'.$row['essential'].'</td><td>' .$row['study_permit'].'</td></tr>';
  }
      else if( $q == 9 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['treaty_permit'].'</td></tr>';
  }
      else if( $q == 10 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['business_permit'].'</td></tr>';
  }
      else if( $q == 11 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['medical_permit'].'</td></tr>';
  }
      else if( $q == '12' ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['relative_permit'].'</td></tr>';
  }
      else if( $q == 13 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['quota_permit'].'</td></tr>';
  }
      else if( $q == 14 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['genral_work_permit']. '</td></tr>';
  }
      else if( $q == 15 ){
   $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['exceptional_skills'].'</td></tr>';
  }
  else if( $q == 16 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['intra_company_transfer'].'</td></tr>';
  }
  else if( $q == 17 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['retired_person_permit'].'</td></tr>';
  }
  else if( $q == 18 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['corporate_permit'].'</td></tr>';
  }
  else if( $q == 19 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['coporate_worker'].'</td></tr>';
  }
  else if( $q == 20 ){
    $message = '<tr><td>'.$row['essential'].'</td><td>' .$row['exchange_permit'].'</td></tr>';
  }
 
   
  }
  
  echo '</table>';
  if($q){
  $msg = 'Dear '.$firstname .' '.$surname."\r\n" .'Welcome to Global Migration'. "\r\n" .''. "\r\n"."Please read the required documents carefully"."\r\n"."\r\n";
  $msg.= $message."\r\n" ."\r\n";
  $msg.= 'Warm Regards'."\r\n".'GLOBAL MIGRATION SOUTH AFRICA';
  mail($to, $subject, $message, $headers);
  }
 
  ?>