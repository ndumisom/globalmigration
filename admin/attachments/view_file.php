<?php 
 include_once 'class.php';
 
 $call = new globalm;
 $clientID = $_GET['id'];
 
 ?>

<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
<tr><td>
        <h3> <a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> Files for <? echo $call->getClient($clientID);?>  <a/></h3>
        <p>
            <?
            if( isset($_SESSION['msg']) ){echo '<span id="msg"><b>'. $_SESSION['msg'].'</b></span><br/><br/>'; unset($_SESSION['msg']);}
             if( isset($_SESSION['error']) ){echo '<span id="error"><b>'. $_SESSION['error'].'</b></span><br/><br/>'; unset($_SESSION['error']);}
        ?></p>
   <table width="80%" border="0" cellspacing="3" cellpadding="0"><tr class="header"><td><b>Added By</b></td><td><b>File Name</b> </td><td><b>Date</b> </td><td><b>View File</b></td></tr>
<?php 

 //Retrieves data from MySQL 
 $data = mysql_query("SELECT * FROM pdf_file where clientID = $clientID ") or die(mysql_error()); 
 $num = mysql_num_rows($data);
 //Puts it into an array 
 while($info = mysql_fetch_array( $data )) 
 { 
 
 
 Echo "<tr class='r'><td> ".$info['username'] . "</td> "; 
 Echo "<td>".$info['pdf_name'] . ".pdf </td>"; 
 Echo "<td>".$info['date']."</td>"; 
 Echo "<td><a href='../client_files/".$info['pdf_url']."/".$info['pdf_name'].".pdf' target='_blank'><b>Download</b> </a></td></tr>"; 
 }
 if($num == 0){
      Echo "<td colspan=4><center><p> No Files for <b><font color='red'>".$call->getClient($clientID)."</font></b></p></center></td>"; 
 }
 ?><tr> <td colspan="4" valign="top">
      
<a href="admin_index.php?m=upload_file&id=<?echo $clientID ;?>"  style="color: #0000FF;"><b>Upload File</b></a>
</td>
 </tr>
   </table
        <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
   </td>
</tr>
</table>
