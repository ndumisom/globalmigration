<? session_start(); ?>
<style type="text/css">
.button4 {
	-webkit-box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	background-color:#0000FF;    
	font-size:12px;
	color:#FFF;
	border-radius:0;
	-webkit-border-radius:0;
	-moz-border-radius:0;
	border:1px solid #999;
	
	font-family:'Lucida Grande',Tahoma,Verdana,Arial,Sans-serif;
	font-size:11px;
	font-weight:700;
	padding:2px 6px;
	height:28px
}

</style>
<input type="hidden" id="reload_now" value="now"/>
                          <?
            if (isset($_SESSION['message'])) {
                echo '<span id="msg"><b>' . $_SESSION['message'] . '</span></b>';
                unset($_SESSION['message']);
            }
            if (isset($_SESSION['error'])) {
                echo '<span id="error"><b>' . $_SESSION['error'] . '</span></b/>';
                unset($_SESSION['error']);
            }
            ?>
<div id="refresh3">
    <?php
                            session_start();
                            require_once('class.php');
                            include("nicePaging1.php");
                            $call = new globalm;
                            $paging = new nicePaging;
                            $rowsPerPage = 10;
                            $user = $_SESSION['log'];
                            $to = $user;

                            $Query = $paging->pagerQuery("SELECT * FROM  `process_task_allocation`  GROUP BY task_all_id DESC", $rowsPerPage) or die(mysql_error());
                            ?>
	<div class="style3" id="print_content">
    <table valign="top" class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
        <tr valign="top" >
            <td valign="top">

                <table valign="top">
                    <tr valign="top">
                        <td valign="top">
                            
                            <div class="post">
                                <div class="entry">
                                    
                                    <h2 class="title"><b style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;">Sent Tasks</b></h2>
                                  &nbsp;<a class="button4" href="index.php?m=view_chart"> Chart Drawing</a>
          
                                   <div class="present">
                                        <form method="post" action="delete_msg.php">
                                            <table width="100%" cellpadding="3" cellspacing="3" border="0">
                                                <tr bgcolor="#B6B6B6">
                                                    <td width="169"><strong>From</strong></td>
                                                    <td width="161"><strong>To</strong></td>
                                                    <td width="200"><strong>Task</strong></td>
                                                    <td width="161"><strong>Details</strong></td>
                                                    <td width="191"><strong>Sent time</strong></td>
                                                    <td width="191"><strong>Due time</strong></td>
                                                    <td width="335"><strong>Status &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:Clickheretoprint()"><img title="print" src="images/Print.png" alt="print" width="30" height="15" /></a></strong></td>
                                                </tr>
<?php $t = 0;
while ($row = mysql_fetch_array($Query)) { ?>     
                                                    <tr bgcolor="#D8D8D8">
                                                        <td><?php echo $row['allocated_by']; ?></td>
                                                        <td><a href="index.php?m=list_to&allocated_to=<?echo $row['allocated_to']; ?>"><?php echo $row['allocated_to']; ?></a></td>
                                                        <td><a href="index.php?m=list_task&allocated_task=<?echo $row['allocated_task']; ?>">
    <?php echo strip_tags(substr($row['allocated_task'], 0, 35)); ?></a>
                                                        </td>
                                                        <td><a href="index.php?m=list_details&details=<?echo $row['details']; ?>"><?php echo $row['details']; ?></a></td>
                                                        <td><?php echo $row['date_allocated']; ?></b></td>
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
                                                            } ?>    <tr><td align="center" colspan="5"><div align="center"><?
                                                            $link = "index.php?m=sent_task";

                                                            $paging->setMaxPages(4);
                                                            echo $paging->createPaging($link);
                                                            ?></div></td></tr>
                                                <tr>
                                                    <td align="center" colspan="3"><?php if ($t == 0) { ?> <a href="#">You have no tasks </a><?php } ?> </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</div>
