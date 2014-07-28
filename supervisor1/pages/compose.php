
<table class="table table-bordered"  width="100%">

    <tr style="background-color: #0088cc; color: #FFF;">
        <td>
            <span class="icon-trash"></span> <a class="label label-info" href="index.php?page=delte" alt="Delete"/>Delete</a> 
            <span class="icon-envelope"></span> <a class="label label-info" href="index.php?page=message" alt="Nssage"/>Inbox</a> 
            <span class="icon-ok"></span><a class="label label-info" href="index.php?page=sent_msg" alt="Sent Messages" /> Sent </a>
            <span class="icon-refresh"></span> <a class="label label-info" href="index.php?page=message" onClick="loadPage( 'msg', 'msg.php');" >refresh</a>
        </td>
    </tr>
    <tr>
        <td>

        <div class="message">
            <form method="post" action="p_compose.php" name="compose" onSubmit="return send_message( this );">
                 <?
                    if (isset($_SESSION['message'])) {
                        echo '<span id="msg">' . $_SESSION['message'] . '</span>';
                        unset($_SESSION['message']);
                    }
                    if (isset($_SESSION['error'])) {
                        echo '<span id="error">' . $_SESSION['error'] . '</span>';
                        unset($_SESSION['error']);
                    }
                   ?>


               To <b style="color:red"> * </b><br/>
               <input type="text" name="to" id="search-text" value=""/><br/>


               Subject 
               <b style="color:red"> * </b><br/>

               <input type="text" name="subject" id="search-text" value=""/><br/>

               Text Message 
               <b style="color:red"> * </b><br/>
               <textarea name="msg" rows="8" cols="55"></textarea><br/>


               <input name="text-msg" type="submit" id="search-submit" value="send message" class="btn btn-primary"/>
            </form>
        </div>
    </td>

    </tr>
</table>