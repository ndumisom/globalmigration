<style  type="text/css" media="screen"> 
    ul  li{ 
        list-style-type:none; 
    } 
</style> 
<?php
if (isset($_POST['submit'])) {

    if (preg_match("/^[  a-zA-Z]+/", $_POST['name'])) {
        $name = $_POST['name'];
        
        include("nicePaging1.php");
        include_once 'class.php';

        include("config.php");
        //connect  to the database 
        $con = mysql_connect($host, $user, $password);
        mysql_select_db($database, $con);

        // Create instance
        $paging = new nicePaging($con);
        $call = new globalm;
       $firstname = $call->getFirstname($_SESSION['log']);
       
        $rowsPerPage = 15;
        //-query  the database table 
        $result = $paging->pagerQuery("SELECT  *FROM client_details WHERE  corporate = '$firstname' AND (firstnames LIKE '%" . $name . "%' OR surname LIKE '%" . $name . "%' OR CONCAT(firstnames, ' ', surname) LIKE '%" . $name . "%') ORDER BY surname", $rowsPerPage);
        //-run  the query against the mysql query function 

        $numrows = mysql_num_rows($result);
        //-create  while loop and loop through result set 
        echo "<table width='100%'class='tb'  border='0' cellspacing='0' cellpadding='0'><tr style='color:#FFFFFF' valign='top'><th bgcolor='#0000CC'>File No</th><th bgcolor='#0000CC'>Surname</th><th bgcolor='#0000CC'>Firstnames</th><th bgcolor='#0000CC'>Application Type</th><th bgcolor='#0000CC'>Passport No</th><th bgcolor='#0000CC'>Corporate</th><th bgcolor='#0000CC'>Email</th><th bgcolor='#0000CC'>Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href='javascript:window.print()'><img title='print' src='images/Print.png' alt='print' width='40' height='27' /></a></th></tr>";
        while ($row = mysql_fetch_array($result)) {
            if ($result == 0) {
                echo'<th><td><h2>NO results for' . $name . '</h2></th></tr>';
            }
            $isSearchFound = true;
            if ($isSearchFound) {
                //-display the result of the array 


                echo "<tr class='r'><td bgcolor='aliceblue'>" . $row['file_no'] . " </td><td bgcolor='aliceblue'>" . $row['surname'] . " </td><td bgcolor='aliceblue'>  " . $row['firstnames'] . " </td><td bgcolor='aliceblue'>" . $row['application_type'] . "</td><td bgcolor='aliceblue'>" . $row['passport_no'] . "</td><td bgcolor='aliceblue'>" . $row['corporate'] . "</td><td bgcolor='aliceblue'>" . $row['in_care_email'] . '</td><td bgcolor="aliceblue"><a href="#"><a alt="click to view details" href="index.php?m=edit_client&id=' . $row['clientID'] . '"> <b>Details</b></a>|<a href="index.php?m=view_permit&id=' . $row['clientID'] . '"> <b>Permit</b></a></td></tr>';
            } else {
                echo "<h1>No results found.</h1>";
            }
        }
    } if ($numrows == 0) {
        echo "<tr><td colspan='9' bgcolor='aliceblue'><br/><b><div align='center'> 0 results found for   <font color='red'>" . $name . "</div></font></b><br></td></tr>";
    }

    echo "</table>";
    $link = "index.php?m=search2"; // Page name

    $paging->setMaxPages(4); // Number of paging links that will be displayed per page
    // Create links for paging
    echo $paging->createPaging($link);
    // Close database connection
    mysql_close($con);
}
?> 
<p>&nbsp;</p>


