

<?php
session_start();
require_once('class.php');
include("nicePaging1.php");
$call = new globalm;
$paging = new nicePaging;
$rowsPerPage = 10;
$user = $_SESSION['log'];
$to = $user;

$Query = $paging->pagerQuery("SELECT * FROM  `message` WHERE  `sender` = '$user' and del=0 ORDER BY msg_id DESC", $rowsPerPage) or die(mysql_error());
$zero = mysql_num_rows($Query);
?>
<div class="post">

<table class="table table-bordered"  width="100%" >
    <tr style="background-color: #0088cc; color: #FFF;">
        <td >
           <input type="checkbox" id="checkAll"> All  <span class="icon-trash"></span> <a class="label label-info" href="index.php?page=delte" alt="Delete"/>Delete</a> <span class="icon-pencil"></span> <a class="label label-info" href="index.php?page=compose" alt="write new message"/>Compose</a>  <span class="icon-envelope"></span><a class="label label-info" href="index.php?page=message"  alt="Messages" /> Inbox </a><span class="icon-refresh"></span> <a class="label label-info" href="index.php?page=message" onClick="loadPage( 'msg', 'msg.php');" >refresh</a></td>
    </tr>
    <tr>
        <td>
            <?php
             if (isset($_SESSION['message'])) {
                 echo '<span id="msg">' . $_SESSION['message'] . '</span>';
                 unset($_SESSION['message']);
             }
             if (isset($_SESSION['error'])) {
                 echo '<span id="error">' . $_SESSION['error'] . '</span>';
                 unset($_SESSION['error']);
             }
             ?>
                <div class="present">
            <form method="post" action="delete_sent.php">
                <table width="100%">

                    <tr>
                        <td align="center" colspan="3"><?php if ($zero == null) { ?> <br/><a style="color: #FF0000;" href="#">You have no sent messages</a> <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><?php } else { ?> </td>
                    </tr>
                        <?php

                        while ($row = mysql_fetch_array($Query)) {
                            if ($row['del'] == 0) {
                                ?>     
                    <tr>
                        <td class="tad"><input type="checkbox" name="myCheckbox[]" id="myCheckbox" value="<?php echo $row['msg_id']; ?>" /><?php echo $row['to']; ?></td>
                        <td class="tad">
                            <?php echo strip_tags(substr($row['subject'], 0, 35)); ?><a style="color: #0000FF;" href="index.php?page=read_sent&id=<?php echo $row['msg_id']; ?>" onClick="loadPage( 'read_sent', 'include_files.php', '<?php echo $row['msg_id']; ?>' );">...read more</a>
                        </td>
                        <td class="tad"><?php echo $row['msg_date']; ?></td>
                    </tr>
                            <?php } else  ?>

                            <?php

                        }
                        ?>   
                    <tr>
                        <td align="center">
                            <div align="center">
                        <?
                        $link = "index.php?page=sent_msg";

                        $paging->setMaxPages(4);
                        echo $paging->createPaging($link);
                        }?>
                            </div>
                        </td>
                    </tr>

                </table>
            </form>

        </td>
    </tr>
</table>