<? session_start(); ?>
<input type="hidden" value="now" id=reload_now"/>
<div id="refresh3">
    <div class="style3" id="print_content">
    <table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
        <tr >
            <td valign="top">

                <table>
                    <tr>
                        <td valign="top">
                            <?php
                            session_start();
                            $allocated_task = $_GET['allocated_task'];
                            require_once('class.php');
                            include("nicePaging1.php");
                            $call = new globalm;
                            $paging = new nicePaging;
                            $rowsPerPage = 15;
                            $user = $_SESSION['log'];
                            $to = $user;

                            $Query = $paging->pagerQuery("SELECT * FROM  `process_task_allocation` WHERE allocated_task='$allocated_task' GROUP BY task_all_id DESC", $rowsPerPage) or die(mysql_error());
                            ?>
                            <div class="post">
                                <div class="entry">
                                    <p><?php
                            if (isset($_SESSION['msg'])) {
                                echo '<span id="contact_form_session">' . $_SESSION['message'] . '</span>';
                                unset($_SESSION['msg']);
                            }
                            ?></p>
                                    <div class="present">
                                        <form method="post" action="delete_msg.php">
										<div class="style3" id="print_content">
                                            <table width="100%" cellpadding="3" cellspacing="3" border="0">
                                              <tr bgcolor="grey">
                                                    <td width="199"><em><strong>From</strong></em></td>
                                                    <td width="199"><em><strong>To</strong></em></td>
                                                    <td width="449"><em><strong>Task</strong></em></td>
                                                    <td width="199"><em><strong>Details</strong></em></td>
                                                    <td width="230"><em><strong>Due date</strong></em></td>
                                                    <td width="400"><em><strong>Status &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:Clickheretoprint()"><div class="icon-print"></div></a></strong></em></td>
                                                </tr>
                                                    <?php $t = 0;
                                                    while ($row = mysql_fetch_array($Query)) { ?>     
                                                    <tr bgcolor="#D8D8D8">
                                                        <td><?php echo $row['allocated_by']; ?></td>
                                                        <td><?php echo $row['allocated_to']; ?></td>
                                                        <td>
                                                        <?php echo strip_tags(substr($row['allocated_task'], 0, 35)); ?>
                                                        </td>
                                                        <td><?php echo $row['details']; ?></td>
                                                        <td><?php echo $row['due_date']; ?></b></td>
                                                        <td><? if ($row['status'] == 1) {
                                                            echo '<font color="red">Not read</font> &nbsp;| '; ?><a href="delete_task.php?id=<?php echo $row['task_all_id']; ?>"  id="search-submit" >Cancel</a><?
                                                    } elseif ($row['status'] == 0) {
                                                        echo '<font color="#FF6600">In progress';
                                                    } elseif ($row['status'] == 2) {
                                                        echo '<font color="green">Completed ' . $row['date_completed'];
                                                    }
    ?></td>
                                                    </tr>     
                                                                <?php $t++;
                                                            } ?>    </td></tr>
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
