<? session_start(); ?>
<style  type="text/css" media="screen"> 
    ul  li{ 
        list-style-type:none; 
    } 
    table{
        font-size: 12px;
    }
</style> 

<?php

if (isset($_GET['submit'])) {

    if (preg_match("/^[  a-zA-Z]+/", $_GET['name'])) {
        $name = $_GET['name'];
        
        include("pages/nicePaging1.php");


        include("pages/config.php");
        //connect  to the database 
        $con = mysql_connect($host, $user, $password);
        mysql_select_db($database, $con);

        // Create instance
        $paging = new nicePaging($con);
        $rowsPerPage = 15;
        //-query  the database table 
        $result = $paging->pagerQuery("SELECT  *FROM client_details WHERE corporate LIKE '%".$name."%' OR firstnames LIKE '%" . $name . "%' OR surname LIKE '%" . $name . "%' OR CONCAT(firstnames, ' ', surname) LIKE '%" . $name . "%' OR file_no LIKE '%" . $name . "%'", $rowsPerPage);
        //-run  the query against the mysql query function 
        
        
        //-create  while loop and loop through result set 
        echo "<div class='panel panel-primary'><div class='panel-heading'>Search Results</div><table width='100%' border='0' cellspacing='0' cellpadding='0' class='table table-bordered'><tr valign='top'><th>File no</th><th>Title</th><th>Firstnames</th><th>Surname</th><th>Application&nbsp;Type</th><th>Passport&nbsp;No</th><th>Corporate</th><th>Email</th><th>Action&nbsp&nbsp&nbsp&nbsp<a href='javascript:window.print()'><div class='icon-print'></div></a></th></tr>";
        while ($row = @mysql_fetch_array($result)) {
            if ($result == 0) {
                echo'<th><td><h2>NO results for' . $name . '</h2></th></tr>';
            }
            $isSearchFound = true;
            if ($isSearchFound) {
                //-display the result of the array 


                echo "<tr class='r'><td>" . $row['file_no'] . "</td><td>" . $row['title'] . "</td><td>" . $row['firstnames'] . " </td><td>  " . $row['surname'] . " </td><td>" . $row['application_type'] . "</td><td>" . $row['passport_no'] . "</td><td>" . $row['corporate'] . "</td><td>" . $row['email'] . '</td><td>
                    
 
  <div class="btn-group">
    <button class="btn btn-small dropdown-toggle btn-primary" data-toggle="dropdown">
      Action
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="">Send Memo</a></li>
	<li><a href="index.php?page=edit_client&id=' . $row['clientID'] . '">Details</a></li>
	<li><a href="index.php?page=view_permit&id=' . $row['clientID'] . '">Permit</a></li>
	<li><a href="index.php?page=activity&id=' . $row['clientID'] . '">Activity</a></li>
	<li><a href="index.php?page=request&id=' . $row['clientID'] . '">Request</a></li>
	<li><a href="index.php?page=history&id=' . $row['clientID'] . '">History</a></li>
    </ul>
  </div>

                </td></tr>';
            } else {
                echo "<h1>No results found.</h1>";
            }
        }
    }
    if(!$result){
                    die( "<tr><td colspan='9' bgcolor='aliceblue'><br/><b><div align='center'> 0 results found for   <font color='red'>" . $name . "</div></font></b><br></td></tr>");

        }
    $numrows = @mysql_num_rows($result);
    if ($numrows == 0) {
        echo "<tr><td colspan='9' bgcolor='aliceblue'><br/><b><div align='center'> 0 results found for   <font color='red'>" . $name . "</div></font></b><br></td></tr>";
    }

    echo "</table>";
    //Edited in 2013/004/26 Masande
    $link = $_SERVER['PHP_SELF'].'?name='.$_GET['name'].'&submit=Search';//"index.php?m=search2"; // Page name

    $paging->setMaxPages(4); // Number of paging links that will be displayed per page
    // Create links for paging
    echo $paging->createPaging($link);
    // Close database connection
    mysql_close($con);
}
?> 
</div>



