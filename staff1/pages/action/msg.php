<? session_start(); 
    require_once('class.php');
    include("nicePaging1.php");
    $call = new globalm;
    $paging = new nicePaging;
    $rowsPerPage= 10;
    $user = $_SESSION['log'];
    $to = $user;

    $Query = $paging->pagerQuery("SELECT * FROM  `message` WHERE  `to` = '$user' and (status = 3 or status = 0 or status = 1)  ORDER BY msg_id DESC", $rowsPerPage) or die(mysql_error());
    $zero = mysql_num_rows($Query);
?>
<style>
   
.cssmenu ul{
	margin:0;
	padding:0;
	list-style-type:none;
	width:auto;
	position:relative;
	display:block;
	height:25px;
	background:transparent url('images/blue.jpg') repeat-x top left;
	
}
.cssmenu li{
	display:block;
	float:left;
	margin:0;
	pading:0;
	border-right:1px solid #ffffff;
	}
.cssmenu li a{
	display:block;
	float:left;
	color:#ffffff;
	text-decoration:none;
	padding:6px 16px 0 20px;
	height:15px;
	height:15px;
	}
        .cssmenu li input{
	display:block;
	float:left;
	color:#ffffff;
        font-weight: bolder;
	text-decoration:none;
	

	}
</style>


            <table class="table table-bordered"  width="100%" >
                <tr style="background-color: #0088cc; color: #FFF;">
                    <td >
                        <span class="icon-trash"></span> <a class="label label-info" href="index.php?page=delte" alt="Delete"/>Delete</a> <span class="icon-pencil"></span> <a class="label label-info" href="index.php?page=compose" alt="write new message"/>Compose</a>  <span class="icon-ok"></span><a class="label label-info" href="index.php?page=sent_msg"  alt="View sent messages" /> Sent </a><span class="icon-refresh"></span> <a class="label label-info" href="index.php?page=message" onClick="loadPage( 'msg', 'msg.php');" >refresh</a></td>
           </td></tr>
                <tr><td>
                       
                                <?php if (isset($_SESSION['message'])) {
                                        echo '<p><span id="msg">' . $_SESSION['message'] . '</span></p>';
                                        unset($_SESSION['message']);
                                    }
                                    if (isset($_SESSION['error'])) {
                                        echo '<p><span id="error">' . $_SESSION['error'] . '</span></p>';
                                        unset($_SESSION['error']);
                                    } 
                                 ?>
                            
                                    <form method="post" action="delete_msg.php">
                                      
                                        <table  width="100%" cellpadding="2" cellspacing="2" border="0">
                                            <tr>
                                                <td>
                                     </tr> 
                                            <tr >
                                                <td class="tad" width="199"><em><strong style="color: #0000FF;">From</strong></em></td>
                                                <td class="tad" width="449"><em><strong style="color: #0000FF;">Subject</strong></em></td>
                                                <td class="tad" width="230"><em><strong style="color: #0000FF;">sent time</strong></em></td>
                                            </tr>
                                            <tr>
                                                <td align="center" colspan="3"><?php if($zero == null) { ?> <br/><a style="color: #FF0000;" href="#">You have no messages</a> <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><?php } else{ ?> </td>
                                             </tr>
                                            
                                                    <?php
                                                            while ($row = mysql_fetch_array($Query)) {
                                                                 if ($row['status'] == 0 || $row['status'] == 3) {
                                                    ?>     
                                                    <tr>
                                                        <td class="tad"><input type="checkbox" name="myCheckbox[]" id="myCheckbox" value="<?php echo $row['msg_id']; ?>" /><?php echo $row['sender']; ?></td>
                                                        <td class="tad">
                                                            <?php echo strip_tags(substr($row['subject'], 0, 10)); ?>
                                                            <a style="color: #0000FF;" href="index.php?page=read&id=<?php echo $row['msg_id']; ?>" onClick="loadPage( 'read', 'read_message.php');">...read more</a>
                                                        </td>
                                                        <td class="tad"><?php echo $row['msg_date']; ?></td>
                                                    </tr>
                                                    <?php } elseif ($row['status'] == 1 || $row['status'] == 3) { ?>
                                                    <tr bgcolor="#D8D8D8">
                                                        <td class="tad"><input type="checkbox" name="myCheckbox[]" id="myCheckbox" value="<?php echo $row['msg_id']; ?>" /><b><?php echo $row['sender']; ?></b></td>
                                                        <td class="tad">
                                                            <b><?php echo strip_tags(substr($row['subject'], 0, 35)); ?><a style="color: #0000FF;" href="index.php?page=read&id=<?php echo $row['msg_id']; ?>" onClick="loadPage( 'read', 'read_message.php');">...read more</a></b>
                                                        </td>
                                                        <td class="tad"><b><?php echo $row['msg_date']; ?></b></td>
                                                    </tr>     
                                                        <?php   
                                                        
                                                                            }

                                                                    } 
                                                         ?>   
                                                    <tr><td align="center"><div align="center">
                                                        <?
                                                            $link="index.php?page=msg";

                                                            $paging->setMaxPages(4);
                                                            echo $paging->createPaging($link); } 
                                                        ?>
                                                            </div></td></tr>
                                           
                                        </table>
                                    </form>
                                </div>
                       
                       
                        <p>&nbsp;</p></td>
                </tr>
            </table>

   
