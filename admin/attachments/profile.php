<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
<tr>
<td>
<div class="post">
<h2 class="title"><a href="#">Information About <? echo $_SESSION['log']; ?></a></h2>
<div class="entry">
<p>
<p><?php 
require_once 'class.php';
$call = new globalm ;
if( isset($_SESSION['message']) ){echo '<span id="contact_form_session">'. $_SESSION['message'].'</span>'; unset($_SESSION['message']);}?></p>
<?php if( $row = $call->printUserDetails( $_SESSION['log'] ) ){  ?>
<p><strong style="color: white; background-color: #0066FF">&nbsp;&nbsp;My login details&nbsp;&nbsp;</strong></p>

<p> 
 <div id="profile">
 <table cellspacing="1" cellpadding="1">
  <tr>
    <td width="142" height="31">Username</td>
    <td width="252">:&nbsp;<?php echo strip_tags( $row['username'] );?></td>
  </tr>
  <tr>
      <td height="31" style="text-decoration:underline"><div style="text-decoration:underline"><a href="admin_index.php?m=change_p">Change password </a></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31"></td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </div>
  </p>
    <p><strong style="color: white; background-color: #0066FF;">&nbsp;&nbsp; Personal Details &nbsp;&nbsp;</strong></p>
 
 <p>
<div id="profile">
<table cellspacing="1" cellpadding="1">  
  <tr>
    <td width="140" height="31">First name</td>
    <td width="252">:&nbsp;<?php //elseif ($row=$call->printClient()) {
        
    if( $row['firstname'] =='' ){echo'----------------------';}else{echo strip_tags($row['firstname'],'<br><b><strong><em><i><link>');}?></td>
  </tr>
  <tr>
    <td height="31">Last name</td>
    <td>:&nbsp;<?php if( $row['surname'] =='' ){echo'----------------------';}else{echo strip_tags($row['surname'],'<br><b><strong><em><i><link>');}?></td>
  </tr>
  <tr>
    <td height="31">Email </td>
    <td>:&nbsp;<?php if( $row['email'] =='' ){echo'----------------------';}else{echo strip_tags( $row['email'] );}?></td>
   </tr>
  
</table>
</div>
</p>
</div>

<?php }//}  ?>  
</div>
    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
    

</td>
</tr>
</table>