 <?php 
 // Connects to your Database 
 mysql_connect("your.hostaddress.com", "root", "mapapa1431") or die(mysql_error()) ; 
 mysql_select_db("globalmigration_db") or die(mysql_error()) ; 
 
 //Retrieves data from MySQL 
 $data = mysql_query("SELECT * FROM pdf_file") or die(mysql_error()); 
 //Puts it into an array 
 while($info = mysql_fetch_array( $data )) 
 { 
 
 //Outputs the image and other data
 Echo "<img src=PDF/".$info['photo'] ."> <br>"; 
 Echo "<b>Name:</b> ".$info['pdf_name'] . "<br> "; 
 Echo "<b>Email:</b> ".$info['url'] . " <br>"; 
 Echo "<b>Phone:</b> ".$info['date'] . " <hr>"; 
 }
 ?> 