<?php 
 
 //This is the directory where images will be saved 
 $target = "PDF/"; 
 $target = $target . basename( $_FILES['photo']['name']); 
 
 //This gets all the other information from the form 
 $pdf_id = 0;
 $clientID = 12;
 $username = "Masande"; //Session username
 $pdf_name=$_POST['pdf_name'];
 $pdf_url=$_POST['pdf_url']; 
 $pdf=($_FILES['photo']['name']); 
 
 // Connects to your Database 
 mysql_connect("localhost", "root", "mapapa1531") or die(mysql_error()) ; 
 mysql_select_db("globalmigration_db") or die(mysql_error()) ; 
 
 //Writes the information to the database 
 mysql_query("INSERT INTO `pdf_file` VALUES ('$pdf_id ', '$clientID', '$username', '$pdf_name', NOW(), '$pdf_url')") ; 
 
 //Writes the photo to the server 
 if(move_uploaded_file($_FILES['photo']['name'], $target)) 
 { 
 
 //Tells you if its all ok 
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 ?> 