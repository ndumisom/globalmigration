<? session_start(); ?>
<div id="refresh1">
<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
<tr>
<td>

<table>
    <tr>
        <td width="691">
<?php  session_start();
require_once('class.php');
$call = new globalm;
$user= $_SESSION['log'];
$to = $user;
 				  $SqL = "SELECT * FROM  `process_task_allocation` WHERE  `allocated_to` =  '$user' GROUP BY task_all_id DESC";
				  $Query = mysql_query( $SqL ) or die(mysql_error());
 ?>
<div class="post">
<div class="entry">
<p><?php if( isset($_SESSION['msg']) ){echo '<span id="contact_form_session">'. $_SESSION['message'].'</span>'; unset($_SESSION['msg']);}?></p>
<h2 class="title"><a href="#">Tasks </a></h2>

<div class="present">
<form method="post" action="delete_msg.php">
<table cellpadding="3" cellspacing="3" border="0">
      <tr>
        <td height="47" colspan="3"><a href="index.php?m=show_task" onClick="loadPage( 'show_task', 'view_task.php','none' );"><b style="background-color: #0066FF; color: white; border:1px solid white;">refresh</a></td>
      </tr> 
      <tr>
          <td width="199"><em><strong>From</strong></em></td>
          <td width="449"><em><strong>Task</strong></em></td>
          <td width="230"><em><strong>sent time</strong></em></td>
      </tr>
 <?php $t = 0; while( $row = mysql_fetch_array( $Query ) ) { 
                    if( $row['status'] == 0 ){          
  ?>     
      <tr>
          <td><?php echo $row['allocated_by'];?></td>
          <td>
           <?php echo strip_tags( substr($row['allocated_task'],0,35));?><a href="index.php?m=show_task&id=<?php echo $row['task_all_id'];?>" onClick="loadPage( 'view', 'show_task.php', '<?php echo $row['task_all_id'];?>' );">...read more</a>
          </td>
          <td><?php echo $row['date_allocated'];?></td>
      </tr>
  <?php    } else { ?>
      <tr bgcolor="#D8D8D8">
          <td><b><?php echo $row['allocated_by'];?></b></td>
          <td>
           <b><?php echo strip_tags( substr($row['allocated_task'],0,35));?><a href="index.php?m=view&id=<?php echo $row['task_all_id'];?>" onClick="loadPage( 'view', 'include_files.php', '<?php echo $row['task_all_id'];?>' );">...read more</a></b>
          </td>
          <td><b><?php echo $row['date_allocated'];?></b></td>
      </tr>     
  <?php 	}
   $t++;} ?>    
      <tr>
          <td align="center" colspan="3"><?php if( $t == 0 ){ ?> <a href="#">You have no tasks </a><?php } ?> </td>
      </tr>
</table>
</form>
</div>
</div>
</div>
      <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></td>
</tr>
</table>

</td>
</tr>
</table>
</div>
