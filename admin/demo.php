<?php 

 mysql_connect( 'localhost','root','mapapa1531') or die("Error Connecting to mysql".mysql_error());
mysql_select_db('globalmigration_db') or die("Error Connecting to database".mysql_error());

$username ='staff';


 $sql = "select * from users where username = '$username'";
 
 $result = mysql_query($sql);
 
while($row=  mysql_fetch_array($result)){
    
    echo '<table><tr><td>Username</td><td>Password</td></tr>';
    echo '<tr><td>'.$row['username'].'</td><td>'.$row['password'].'</td></tr></table>';
} 

?> 
