<?php
$q=$_GET["q"];



$con = mysql_connect('localhost', 'root', 'mapapa1531');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("globalmigration_db", $con);

$sql="SELECT * FROM doc_required";

$result = mysql_query($sql);

$message ="\r\n" ;

while($row = mysql_fetch_array($result))
 { 
  
if($q == 2){
  $message.= ''.$row['essential']."\r\n" .$row['visitors_permit'].' ';
  }
 
  
 if($q == 3){
  $message.= ''.$row['essential']."\r\n" .$row['visitors_permit_academic'].' ';
  
  }
  
  else if( $q == 4 ){
    $message.= ''.$row['essential']."\r\n" .$row['visitors_permit_voluntary'].' ';
  }
   
  else if( $q == 5 ){
    $message.= ''.$row['essential']."\r\n" .$row['vvisitors_permit_research'].' ';
  }
  
     else if( $q == 6 ){
    $message.= ''.$row['essential']."\r\n" .$row['visitors_permit_spousedependent'].' ';
  }
  
      else if( $q == 7 ){
    $message.=''.$row['essential']."\r\n" .$row['visitors_permit_prhold'].' ';
  }
      else if( $q == 8 ){
    $message.=''.$row['essential']."\r\n" .$row['study_permit'].' ';
  }
      else if( $q == 9 ){
    $message.= ''.$row['essential']."\r\n" .$row['treaty_permit'].' ';
  }
      else if( $q == 10 ){
    $message.= ''.$row['essential']."\r\n" .$row['business_permit'].' ';
  }
      else if( $q == 11 ){
    $message.= ''.$row['essential']."\r\n" .$row['medical_permit'].' ';
  }
      else if( $q == '12' ){
    $message.= ''.$row['essential']."\r\n" .$row['relative_permit'].' ';
  }
      else if( $q == 13 ){
    $message.= ''.$row['essential']."\r\n" .$row['quota_permit'].' ';
  }
      else if( $q == 14 ){
    $message.= ''.$row['essential']."\r\n" .$row['genral_work_permit']. ' ';
  }
      else if( $q == 15 ){
   $message.= ''.$row['essential']."\r\n" .$row['exceptional_skills'].' ';
  }
  else if( $q == 16 ){
    $message.= ''.$row['essential']."\r\n" .$row['intra_company_transfer'].' ';
  }
  else if( $q == 17 ){
    $message.= ''.$row['essential']."\r\n" .$row['retired_person_permit'].' ';
  }
  else if( $q == 18 ){
    $message.= ''.$row['essential']."\r\n" .$row['corporate_permit'].' ';
  }
  else if( $q == 19 ){
    $message.= ''.$row['essential']."\r\n" .$row['coporate_worker'].' ';
  }
  else if( $q == 20 ){
    $message.= ''.$row['essential']."\r\n" .$row['exchange_permit'].' ';
  }
 
 
 }




echo $message;
 
mysql_close($con);
?>