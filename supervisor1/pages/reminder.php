<?  
$time = strtotime('5:00');
$exp = date("H:i", strtotime('+5 minutes', $time));
$exp = $start;

if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else{
  $_SESSION['count']++;
  }

 $expiry_date =  date( 'Y-m-d',time( ) + (90 * 24 * 60 * 60) );

        $objConnect = mysql_connect("localhost", "root", "mapapa1531") or die(mysql_error());
        $objDB = mysql_select_db("globalmigration_db");

        

        $strSQL = "SELECT * FROM client_details, permit_applications WHERE permit_applications.expiry_date = '$expiry_date' AND client_details.clientID=permit_applications.clientID ORDER BY expiry_date DESC LIMIT 4";
        $objQuery = mysql_query($strSQL);
        $numrows = mysql_num_rows($objQuery);
        //pop up 3 times 
 
if($numrows > 0 && $_SESSION['count'] < 1 ){?>
<div id="overlay" class="overlay"></div>
<div id="boxpopup" class="box">
	<a onclick="closeOffersDialog('boxpopup');" class="boxclose"></a>
	<div id="content1">
            <h3> <font color="red"><b> * <u>Expiring Permits</u> *</b></font></h3>
           
            <? while ($row = mysql_fetch_array($objQuery)) {
         echo "<ol> &nbsp; " . $row['firstnames'] . " &nbsp;
                   &nbsp; " . $row['surname'] . " &nbsp;
                   &nbsp; " . $row['expiry_date'] . " &nbsp; </ol><br/>";
            }
                ?>
            
        <br/>
          click <a href="index.php?m=expiry"> here </a> to view expiring permit list.
   
	</div>
</div>
<?

}
?>