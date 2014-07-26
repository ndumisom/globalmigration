<?php
session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 *  
 */

include_once 'email_updates.php';//email plus content
include_once 'send_sms.php';//get send sms_function
include_once 'database.php';//Config

$user = $_SESSION['log'];
$num = $_POST['num'];
$firstnames = $_POST['firstnames'];
$surname = $_POST['surname'];
$permit = $_POST['permit'];
$permit_status = $_POST['permit_status_history'];
$mobile_no = $_POST['mobile_no'];
$email = $_POST['email'];
$id = $_POST['id'];



// get user details by 

function get_user_details($id){
    
    
    @$query = mysql_query("select *from client_details, updated, permit_applications where updated.permit_appID = permit_applications.permit_appID and updated.clientID = client_details.clientID and sent = 0 and updated.id =$id");
     
     
     if($query  == null){
         return false;
     }else{
         while ($row = mysql_fetch_array($query)) {
             echo $file_no = $row['file_no'];
            echo $firstnames = $row['firstnames'];
            echo $surname = $row['surname'];
            echo  $permit = $row['permit'];
            echo $email = $row['email'];
            
            //send email while getting the user details
            send_update($firstnames, $surname, $permit, $email,$id);
            update($id);
         }
     }
    
}

//Get User info to send sms
function get_user_to_sms($id){
    
    
    @$query = mysql_query("select *from client_details, updated, permit_applications where updated.permit_appID = permit_applications.permit_appID and updated.clientID = client_details.clientID and sent = 0 and updated.id =$id");
     
     
     if($query  == null){
         return false;
     }else{
         while ($row = mysql_fetch_array($query)) {
		 
		    echo $firstnames = $row['firstnames'].' ';
            echo $surname = $row['surname'].' ';
            echo $permit = $row['permit'].' ';
			echo $permit_status = $row['permit_status'].' '; 
            echo $mobile_no = $row['mobile_no'].'<br/>';
            
            //send sms while getting the user details
            send_sms($firstnames, $permit, $permit_status, $mobile_no);
            //update($id);
         }
     }
    
}

//Update and set sent to be true if emil was sent
function update($id){
    if($id == null){
        return false;
    }else{
    return @mysql_query("update updated set sent = 1 where id = $id");
    }
}



if (isset($_POST['Submit'])) {
  
$user = $_SESSION['log'];
$num = $_POST['num'];
$firstnames = $_POST['firstnames'];
$surname = $_POST['surname'];
$permit = $_POST['permit'];
$permit_status = $_POST['permit_status_history'];
$email = $_POST['email'];
$id = $_POST['id'];
$sender = 'info@globalimsa.com';

//if the $id is empty rediret
if($id == null){
    $_SESSION['error']  = 'Please tick atleast one box ';
    header("location:admin_index.php?m=pr_pending");
}else{//else loop the the get user details function
for($i = 0; $i < count($id); $i++)
{


 $send_updates = get_user_details($id[$i]);
 


}//end of a for loop

if($send_updates ){
    $_SESSION['msg']  = 'Your email(s) was sent successfully ';
    header("location:admin_index.php?m=pr_pending");
}else{
    $_SESSION['error']  = 'Error occurred please try send again';
    header("location:admin_index.php?m=pr_pending");
}

}
}

if (isset($_POST['sms'])) {

$user = $_SESSION['log'];
$num = $_POST['num'];
$firstnames = $_POST['firstnames'];
$surname = $_POST['surname'];
$permit = $_POST['permit'];
$permit_status = $_POST['permit_status_history'];
$mobile_no = $_POST['mobile_no'];
$id = $_POST['id'];


 //if the $id is empty rediret
if($id == null){
    $_SESSION['error']  = 'Please tick atleast one box ';
    header("location:admin_index.php?m=pr_pending");
}else{//else loop the the get user details function
for($i = 0; $i < count($id); $i++)
{


//$send_sms = send_sms($firstnames[$i], $permit[$i], $permit_status[$i], $mobile_no[$i]);
$send_sms = get_user_to_sms($id[$i]);


}//end of a for loop
	
if($send_sms){
    $_SESSION['msg']  = 'Your sms(s) was sent successfully ';
   header("location:admin_index.php?m=pr_pending");
}else{
    $_SESSION['error']  = 'Error occurred please try send again';
   header("location:admin_index.php?m=pr_pending");
}	

}

}





?>
