<table class="table table-bordered" width="100%">
    <tr style="background-color: #0088cc; color: #FFF;">
        <td> 
            <?php
                include 'class.php';
                $call = new globalm;

                if( $call->markMSGasRead( $_GET['id'] ) ){} if( $row = $call->showMSGById( $_GET['id'] ) ) { 
            ?>
            <span class="icon-trash"></span> <a class="label label-info" hhref="pages/delete_sent.php?id=<?php echo $row['msg_id'];?>" id="search-submit" onclick="return confirm('Are you sure you want to delete?')"alt="Delete"/>Delete</a> 
      </td>
    </tr>
    <tr>
        <td align="center">

        <div class="post">
         <p>
            <b>To &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;: </b><a style="color: #0000FF;" href="#"><?php echo $row['to'].'';?></a> 
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

        </td>
    </tr>
</table>
<p>&nbsp;</p>