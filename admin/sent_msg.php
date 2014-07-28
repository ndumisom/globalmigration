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
<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
    <tr>
        <td>

            <table>
                <tr>
                    <td width="100%">
                        <?php
                        session_start();
                        require_once('class.php');
                        include("nicePaging1.php");
                        $call = new globalm;
                        $paging = new nicePaging;
                        $rowsPerPage=10;
                        $user = $_SESSION['log'];
                        $to = $user;
                      
                        $Query = $paging->pagerQuery("SELECT * FROM  `message` WHERE  `sender` = '$user' and del = 0 ORDER BY msg_id DESC", $rowsPerPage) or die(mysql_error());
                        $zero = mysql_num_rows($Query);
                        ?>
                        <div class="post">
                            <h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;">Sent </a></h2>
                            <div class="entry">
                                 <p><?php if (isset($_SESSION['message'])) {
                    echo '<span id="msg">' . $_SESSION['message'] . '</span>';
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error'])) {
                    echo '<span id="error">' . $_SESSION['error'] . '</span>';
                    unset($_SESSION['error']);
                }?></p>
                                <div class="present">
                                    <form method="post" action="delete_sent.php">
                                        <table border="0" widht="100%">
                                            <tr>
                                                <td height="47"  colspan="3"><div class='cssmenu'> <ul><li><input type="submit" name="del_mult" id="search-submit"  value="delete" class="login"/></li><li><a href="admin_index.php?m=compose" alt="Write new message"> Compose </a></li><li><a href="admin_index.php?m=msg" alt="Inbox"> Inbox </a></li></ul></div><br /></td>
                                            </tr> 
                                            <tr>
                                                <td class="tad" width="199"><em><strong style="color: #0000FF;">To</strong></em></td>
                                                <td class="tad" width="449"><em><strong style="color: #0000FF;">Subject</strong></em></td>
                                                <td class="tad" width="230"><em><strong style="color: #0000FF;">sent time</strong></em></td>
                                            </tr>
                                            <tr>
                                                <td align="center" colspan="3"><?php if ($zero == null) { ?> <br/><a style="color: #FF0000;" href="#">You have no sent messages</a> <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><?php } else { ?> </td>
                                            </tr>
<?php
while ($row = mysql_fetch_array($Query)) {
    if ($row['del'] == 0 ) {
        ?>     
                                                    <tr>
                                                        <td class="tad"><input type="checkbox" name="myCheckbox[]" id="myCheckbox" value="<?php echo $row['msg_id']; ?>" /><?php echo $row['to']; ?></td>
                                                        <td class="tad">
        <?php echo strip_tags(substr($row['subject'], 0, 35)); ?><a style="color: #0000FF;" href="admin_index.php?m=read_sent&id=<?php echo $row['msg_id']; ?>" onClick="loadPage( 'read', 'include_files.php', '<?php echo $row['msg_id']; ?>' );">...read more</a>
                                                        </td>
                                                        <td class="tad"><?php echo $row['msg_date']; ?></td>
                                                    </tr>
    <?php } else  ?>
                                                        
    <?php 
   
} ?>    <tr><td align="center"><div align="center"><?
                                                    $link="admin_index.php?m=sent_msg";

$paging->setMaxPages(4);
echo $paging->createPaging($link); }?></div></td></tr>
                                            
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
