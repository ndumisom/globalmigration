<?php
session_start();
?> 
<div id="refresh3">
    <table width="100%" cellspacing="0" cellpadding="0" border="1" bordercolor="#0000FF">
        <tr>
            <td>

                <table>
                    <tr>
                        <td width="691">
                            <?php
                            session_start();
                            require_once('class.php');
                            $call = new globalm;
                            $user = $_SESSION['log'];
                            $to = $user;
                            $SqL = "SELECT * FROM  `process_task_allocation` WHERE  `allocated_by` =  '$user' GROUP BY task_all_id DESC";
                            $Query = mysql_query($SqL) or die(mysql_error());
                            ?>
                            <div class="post">
                                <div class="entry">
                                    <p><?php
                            if (isset($_SESSION['msg'])) {
                                echo '<span id="contact_form_session">' . $_SESSION['message'] . '</span>';
                                unset($_SESSION['msg']);
                            }
                            ?></p>
                                    <div align="left">Sent tasks </div>
                                    <br />
                                    <div class="present">
                                        <form method="post" action="delete_msg.php">
                                            <table cellpadding="3" cellspacing="3" border="0">
                                                <tr>
                                                    <td height="47" colspan="3">&nbsp;</td>
                                                </tr> 
                                                <tr>
                                                    <td width="199"><em><strong>To</strong></em></td>
                                                    <td width="449"><em><strong>Task</strong></em></td>
                                                    <td width="230"><em><strong>sent time</strong></em></td>
                                                    <td width="400"><em><strong>Status</strong></em></td>
                                                </tr>
                                                <?php
                                                $t = 0;
                                                while ($row = mysql_fetch_array($Query)) {
                                                    ?>     
                                                    <tr bgcolor="#D8D8D8">
                                                        <td><?php echo $row['allocated_to']; ?></td>
                                                        <td>
                                                            <?php echo strip_tags(substr($row['allocated_task'], 0, 35)); ?>
                                                        </td>
                                                        <td><?php echo $row['date_allocated']; ?></b></td>
                                                        <td><? if ($row['status'] == 1) {
                                                            echo '<font color="red">Not read</font> &nbsp;'; ?> <a href="delete_task.php?id=<?php echo $row['task_all_id']; ?>"  id="search-submit" >Cancel</a><?
                                                    } elseif ($row['status'] == 0) {
                                                        echo '<font color="#FF6600">In progress&nbsp;';
                                                    } elseif ($row['status'] == 2) {
                                                        echo '<font color="green">Completed&nbsp; ' . $row['date_completed'];
                                                    }
                                                            ?></td>
                                                    </tr>     
                                                  <?php $t++;
}                                                 ?>    
                                                <tr>
                                                    <td align="center" colspan="3"><?php if ($t == 0) { ?> <a href="#">You have no tasks </a><?php } ?> </td>
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