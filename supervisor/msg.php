<? session_start(); ?>
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
<table  class="tab"  width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
    <tr>
        <td>

            <table width="100%" >
                <tr>
                    <td >
                        <?php
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
                        <div class="post">
                            <h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;">Inbox </a></h2>
                            <div class="entry">
                                <p><?php   if (isset($_SESSION['message'])) {
                    echo '<span id="msg"><b>' . $_SESSION['message'] . '</span></b>';
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error'])) {
                    echo '<span id="error"><b>' . $_SESSION['error'] . '</span></b/>';
                    unset($_SESSION['error']);
                } ?></p>
                                <div class="present">
                                    <form method="post" action="delete_msg.php">
                                        <table width="100%"  cellpadding="2" cellspacing="2" border="0">
                                        <table  width="100%" cellpadding="2" cellspacing="2" border="0">
                                            <tr>
                                                <td height="47" colspan="3"><div class='cssmenu'>
<ul>
    <li><input type="submit" name="del_mult" id="search-submit"  value="Delete" class="login"/></li><li><a type="button" href="index.php?m=compose" alt="write new message"/>Compose</a></li><li><a  href="index.php?m=sent_msg"  alt="View sent messages" /> Sent </a> </li><li><a href="index.php?m=msg" onClick="loadPage( 'msg', 'msg.php');" >refresh</a></li></ul></div><br /></td>
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
        <?php echo strip_tags(substr($row['subject'], 0, 10)); ?><a style="color: #0000FF;" href="index.php?m=read&id=<?php echo $row['msg_id']; ?>" onClick="loadPage( 'read', 'read_message.php');">...read more</a>
                                                        </td>
                                                        <td class="tad"><?php echo $row['msg_date']; ?></td>
                                                    </tr>
    <?php } elseif ($row['status'] == 1 || $row['status'] == 3) { ?>
                                                    <tr bgcolor="#D8D8D8">
                                                        <td class="tad"><input type="checkbox" name="myCheckbox[]" id="myCheckbox" value="<?php echo $row['msg_id']; ?>" /><b><?php echo $row['sender']; ?></b></td>
                                                        <td class="tad">
                                                            <b><?php echo strip_tags(substr($row['subject'], 0, 35)); ?><a style="color: #0000FF;" href="index.php?m=read&id=<?php echo $row['msg_id']; ?>" onClick="loadPage( 'read', 'read_message.php');">...read more</a></b>
                                                        </td class="tad">
                                                        <td class="tad"><b><?php echo $row['msg_date']; ?></b></td>
                                                    </tr>     
    <?php }

} ?>    <tr><td align="center"><div align="center"><?
                                                    $link="index.php?m=msg";

$paging->setMaxPages(4);
echo $paging->createPaging($link); } ?></div></td></tr>
                                           
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <p>&nbsp;</p></td>
                </tr>
            </table>

        </td>
    </tr>
</table>
