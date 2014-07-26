<?php
session_start();

mysql_connect('localhost', 'root', 'mapapa1531') or die("Error Connecting to mysql" . mysql_error());
mysql_select_db('globalmigration_db') or die("Error Connecting to database" . mysql_error());

$error = $_GET['error'];
if($error ==1){
    
      $sql =  "select * from online where level=4";
      $query = mysql_query($sql);
      $row = mysql_fetch_assoc($query);
    
    $_SESSION['er'] = "You have been kicked out because <u>".$row['username']."</u> has logged in ";
    header("location:../index.php");
    
}else{
$username = $_SESSION['log'];
$delete = "DELETE FROM online WHERE username='$username'";
$query = mysql_query($delete);
session_unset();
session_destroy();
header("location:../index.php");
}
?>
