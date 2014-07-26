


<div class="post">
<h2 class="title"><a href="#"></a></h2>
<div class="entry">
<p>
<p><?php 
require_once 'class.php';
$call = new globalm ;
if( $row = $call->printUserDetails( $_SESSION['log'] ) ){  ?>


  <p><strong style="text-decoration:underline">Personal Details :</strong></p>
 
 <p>
<div class="present">
<table cellspacing="1" cellpadding="1">  
  <tr>
    <td width="140" height="31">Name</td>
    <td width="252">:&nbsp;<?php //elseif ($row=$call->printClient()) {
        
    if( $row['firstname'] =='' ){echo'----------------------';}else{echo strip_tags($row['firstname'],'<br><b><strong><em><i><link>');}?></td>
  </tr>
  <tr>
    <td height="31">Surname</td>
    <td>:&nbsp;<?php if( $row['surname'] =='' ){echo'----------------------';}else{echo strip_tags($row['surname'],'<br><b><strong><em><i><link>');}?></td>
  </tr>
  <tr>
    <td height="31">Email </td>
    <td>:&nbsp;<?php if( $row['email'] =='' ){echo'----------------------';}else{echo strip_tags( $row['email'] );}?></td>
   </tr>
  
</table>
</div>
</p>


</p>

</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php }//}  ?>
</p>  
</div>

