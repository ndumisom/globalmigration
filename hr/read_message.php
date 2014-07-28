<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
<tr>
<td align="center">
<div class="post">
<h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;">Text Message </a></h2>
<div class="entry">
<p>
  
 <?php if( $call->markMSGasRead( $_GET['id'] ) ){} if( $row = $call->showMSGById( $_GET['id'] ) ) { ?>
 <div class="present">
  <div align="left">
  <b><a  href="index.php?m=reply&id=<?php echo $row['msg_id'];?>" id="search-submit" onClick="loadPage( 'reply', 'reply.php');" ><b style="background-color: #0066FF; color: white; border:1px solid white; text-decoration:none;"> &nbsp;&nbsp; Reply&nbsp;&nbsp;  </b> </a>&nbsp;&nbsp;
  <b><a href="delete_msg.php?id=<?php echo $row['msg_id'];?>" id="search-submit" ><b style="background-color: #0066FF; color: white; border:1px solid white; text-decoration:none;"> &nbsp;&nbsp; Delete&nbsp;&nbsp;  </b></a></b>  </div>
  <p><br />
    <b>From &nbsp;&nbsp; : </b><a style="color: #0000FF;" href="#"><?php echo $row['sender'].'';?></a> 
    </p>
  <p><b>Subject : </b><a style="color: #0000FF;" href="#"><?php echo $row['subject'].'';?></a></p>
  <p>
    <b> Date&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;: </b><a style="color: #0000FF;" href="#"><?php echo $row['msg_date'].'';?></a>
  </p>
  <div style="background-color: #0066FF; color: white; border:1px solid white; text-decoration:none;"><b>Message</b></div><br />
 <?php echo nl2br(strip_tags($row['text']));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><hr />
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
  
 <?php } ?>
</p>
     
</div>
</div> 
<p>&nbsp;</p>
</td>
</tr>
</table>