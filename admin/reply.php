<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
<tr>
<td>
<div class="post">
<h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;">Reply </a></h2>
<div class="entry">
<p><?
                if (isset($_SESSION['message'])) {
                    echo '<span id="msg"><b>' . $_SESSION['message'] . '</span></b>';
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error'])) {
                    echo '<span id="error"><b>' . $_SESSION['error'] . '</span></b/>';
                    unset($_SESSION['error']);
                }
                ?><br/><br/>
 <form method="post" action="p_reply.php"> 
 <?php
 require_once('class.php');
 $call = new globalm; 
 if( $row = $call->showMSGById( $_GET['id'] ) ) { ?>
 <div class="present">
  <div align="left"><a href="delete_msg.php?id=<?php echo $row['msg_id'];?>" id="search-submit" onclick="return confirm('Are you sure you want to delete?')"> <b style="background-color: #0066FF; color: white; border:1px solid white; text-decoration:none;"> &nbsp;&nbsp; Delete&nbsp;&nbsp;  </b></a> </div>
  <br />
 <p> <b>To  &nbsp;&nbsp;&nbsp;: </b><a href="#" style="color: #0000FF;"><?php echo $row['sender'].'';?>  </a></p>
 <p><b>Date : </b><a href="#" style="color: #0000FF;"><?php echo $row['msg_date'].'<br />';?></a></p>
 <div style="background-color:#0066FF; border:1px solid #121649; color:#FFFFFF; font-weight:bold; padding:3px; text-align:left; width:98%;"><b>Message</b></div><br/>
 <input type="hidden" name="subject" value="<?php echo 'RE : '.$row['subject'];?>" />
 <?php $text ='<br><br><br>-------------------previous-----------------<br>'.$row['text'];  $text = str_replace("<br>","\n",$text);?>
 <textarea name="msg" rows="8" cols="35">
 <?php echo $text;?>
 </textarea><br /><br />
 <input type="submit" name="reply" value="Reply" class="login" id="search-submit" />
                         <input type="hidden" name="sender" value="<?php echo $row['sender'];?>"  />
                         <input type="hidden" name="msg_id" value="<?php echo $row['msg_id'];?>"  />
                         <br /><br />


 <?php } ?>
 </form>
</p>
     
</div>
</div>
</td>
</tr>
</table>