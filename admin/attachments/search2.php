<? session_start(); ?>
<style  type="text/css" media="screen"> 
    ul  li{ 
        list-style-type:none; 
    } 
</style> 
<?php
if (isset($_GET['submit'])) {
    
         if (preg_match("/^[  a-zA-Z]+/", $_GET['name'])) {
        $name = $_GET['name'];
        
			
			

            include("nicePaging1.php");


            include("config.php");
            //connect  to the database 
            $con = mysql_connect($host, $user, $password);
            mysql_select_db($database, $con);

            // Create instance
            $paging = new nicePaging($con);
            $rowsPerPage=15; 
            //-query  the database table 
            $result = $paging->pagerQuery("SELECT  *FROM client_details WHERE corporate LIKE '%".$name."%' OR firstnames LIKE '%" . $name . "%' OR surname LIKE '%" . $name . "%' OR CONCAT(firstnames, ' ', surname) LIKE '%" . $name . "%' OR file_no LIKE '%" . $name . "%'  OR firstnames LIKE '%" . $name . "%'OR  surname LIKE '%" . $name . "%'", $rowsPerPage);
            //-run  the query against the mysql query function 
            //$data = mysql_fetch_array($result);
           // $client_id = $data['clientID'];
            $numrows = mysql_num_rows($result);
            //-create  while loop and loop through result set 
            echo "<table width='100%' bgcolor='#0000CC'><tr style='color:#FFFFFF' valign='top'><th bgcolor='#0000CC'>File no</th><th bgcolor='#0000CC'>Title</th><th bgcolor='#0000CC'>Firstnames</th><th bgcolor='#0000CC'>Surname</th><th bgcolor='#0000CC'>Application Type</th><th bgcolor='#0000CC'>Passport No</th><th bgcolor='#0000CC'>Corporate</th><th bgcolor='#0000CC'>Email</th><th bgcolor='#0000CC'>Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:window.print()'><img title='print' src='images/Print.png' alt='print' width='40' height='27' /></a></th></tr>";
            while ($row = mysql_fetch_array($result)) {
                
                if( $row['file_no'] == null || $row['title'] == null || $row['surname'] == null || $row['firstnames'] == null || $row['dob'] == 0000-00-00 || $row['passport_no'] == null || $row['passport_expiry_date'] == 0000-00-00 || $row['corporate'] == null || $row['business_unit'] == null || $row['in_care_email'] == null || $row['contact_no'] == null || $row['email'] == null || $row['consultant'] == null){
                    require_once 'empty_field alert.php';
                }
               
                
              if ($numrows) {
                    //-display the result of the array 
                  

                   echo "<tr><td bgcolor='aliceblue'>" . $row['file_no'] . "</td><td bgcolor='aliceblue'>" . $row['title'] . "</td><td bgcolor='aliceblue'>" . $row['firstnames'] . " </td><td bgcolor='aliceblue'>  " . $row['surname'] . " </td><td bgcolor='aliceblue'>" . $row['application_type'] . "</td><td bgcolor='aliceblue'>" . $row['passport_no'] . "</td><td bgcolor='aliceblue'>" . $row['corporate'] . "</td><td bgcolor='aliceblue'>" . $row['email'] . '</td><td bgcolor="aliceblue"><a style="color: #0000FF;" href="#"> <b>Send memo</b></a>|<a style="color: #0000FF;" href="admin_index.php?m=edit_client&id=' . $row['clientID'] . '"> <b>Details</b></a>|<a style="color: #0000FF;" href="admin_index.php?m=view_permit&id=' . $row['clientID'] . '"> <b>Permit</b></a>| <a style="color: #0000FF;" href="admin_index.php?m=activity&id='.$row['clientID'].'"><b>Activity </b></a> | <a style="color: #0000FF;" href="admin_index.php?m=request&id=' . $row['clientID'] . '"><b>Request</b></a>| <a style="color: #0000FF;" href="admin_index.php?m=history&id=' . $row['clientID'] . '"><b>History</b></a></td></tr>';
                }
				else {
                   echo "<tr><td colspan='5' bgcolor='aliceblue'><h2>NO results for". $name . "</h2><br/><br></td></tr>";
                }
            }
        }
       // require_once 'empty_field alert.php';
        if($numrows == 0) {
                   echo "<tr><td colspan='9' bgcolor='aliceblue'><br/><b><div align='center'> 0 results found for   <font color='red'>". $name . "</div></font></b><br></td></tr>";
        }
     
    echo "</table>";
    //Edited in 2013/004/26 Masande
    $link = $_SERVER['PHP_SELF'].'?name='.$_GET['name'].'&submit=Search';; // Page name

    $paging->setMaxPages(4); // Number of paging links that will be displayed per page
    // Create links for paging
    echo $paging->createPaging($link);
    // Close database connection
    mysql_close($con);
}
?> 
<p>&nbsp;</p>

