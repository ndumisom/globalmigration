<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
   require_once 'add_client_details.php';
//$_SESSION['file_no']= trim($_POST['file_no']);
//$_SESSION['firstname'] = ucfirst(trim($_POST['firstnames']));
$file_no = trim($_POST['file_no']);

$firstname = ucfirst(trim($_POST['firstnames']));
$id = mysql_query("select clientID from client_details where firstnames='$firstnames' and file_no ='$file_no' ");
$row = mysql_fetch_array($id);
$clientID = $row['clientID'];
$destination_country = $_POST['destination_country'];


if($destination_country == 'Botswana' ){
    
 

  header("location:admin_index.php?m=botswana&id=$clientID");
    exit;
}
else if ($destination_country == 'Burundi') {
    
    header("location:admin_index.php?m=burundi&id=$clientID");
    exit;

}
else if($destination_country == 'Ethiopia' ){
    
    header("location:admin_index.php?m=ethiopia&id=$clientID");
    exit;
}
else if($destination_country == 'Kenya' ){
    
   header("location:admin_index.php?m=kenya&id=$clientID");
    exit;
}
else if($destination_country == 'Malawi' ){
    
    header("location:admin_index.php?m=malawi&id=$clientID");
    exit;
}
else if($destination_country == 'Mauritius' ){
    
   header("location:admin_index.php?m=mauritius&id=$clientID");
    exit;
}
else if($destination_country == 'Mozambique' ){
    
   header("location:admin_index.php?m=mozambique&id=$clientID");
    exit;
}
else if($destination_country == 'Rwanda' ){
    
  header("location:admin_index.php?m=rwanda&id=$clientID");
    exit;
}
else if($destination_country == 'Tanzania' ){
    
   header("location:admin_index.php?m=tanzania&id=$clientID");
    exit;
}
else if($destination_country == 'Uganda' ){
    
   header("location:admin_index.php?m=uganda&id=$clientID");
    exit;
}
else if($destination_country == 'Zimbabwe' ){
    
   header("location:admin_index.php?m=zimbabwe&id=$clientID");
    exit;
}
else if($destination_country == 'Zambia' ){
    
   header("location:admin_index.php?m=zambia&id=$clientID");
    exit;
}

?>
