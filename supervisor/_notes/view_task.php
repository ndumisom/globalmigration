<table width="100%" cellspacing="0" cellpadding="0" border="1" bordercolor="#0000FF">
<tr>
<td align="center">
<p>&nbsp;</p>

<div class="post">
<h2 class="title"><a href="#">Task </a></h2>
<div class="entry">
<p>
  
 <?php
 require_once('class.php');
$call = new globalm; 
 if( $call->markTaskasRead( $_GET['id'] ) ){} if( $row = $call->showTaskId( $_GET['id'] ) ) { ?>
 <div class="present">
  <div align="left">&nbsp;
  <b><a href="delete_msg.php?id=<?php echo $row['task_all_id'];?>" onclick="return confirm('Are you sure you have completed the task?')" id="search-submit" >DELETE</a></b>  </div>
  <br />
 <b>From : </b><?php echo $row['allocated_by'].'<br />';?> 
 <b>Task : </b><?php echo $row['allocated_task'].'<br />';?>
 <b>Date : </b><?php echo $row['date_allocated'].'<br /><br />';?>
 <b>Due date : </b><?php echo $row['due_date'].'<br /><br />';?>
 <div style="text-decoration:underline"><strong>Details</strong></div>
 <br/>
 <?php echo nl2br(strip_tags($row['details']));?><br /><hr />
 <?php } ?>
</p>
</div>
</div> 
<p>&nbsp;</p>
</td>
</tr>
</table>