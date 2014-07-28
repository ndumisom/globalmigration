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
<div class="post">
<h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;">Text Message </a></h2>
<div class="entry">
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


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
    <br/>
    
<form method="post" action="p_compose.php" name="compose" onSubmit="return validateMsg();">
 <div class="present">
 <table width="100%" >
     <tr>
         <td height="47" colspan="3"><div class='cssmenu'> <ul><li><a href="admin_index.php?m=msg" alt="Inbox"> Inbox </a></li><li><a href="admin_index.php?m=sent_msg" alt="Sent messages"> Sent </a></li></ul></div><br /></td>
     </tr>
     <tr>
    <td align="right"> To </td>
        <td><input type="text" name="to" id="search-text" value=""/></td>
        <td> </b></a></td>
  </tr>
  <tr>
    <td align="right"> Subject</td>
        <td><input type="text" name="subject" id="search-text" value=""/></td>
        <td> </b></a></td>
  </tr>
  <tr>
    <td height="149" align="left" >Text Message</td>
    <td valign="middle" align="left"><textarea name="msg" rows="8" cols="35"></textarea></td>
    <td valign="middle" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td height="149" >&nbsp;</td>
        <td valign="top">
          <input name="text" type="submit" id="search-submit" onclick="overlay( )" value="send message" class="login"/></td>
        <td valign="middle" align="left">&nbsp;</td>
  </tr>
</table>
</div>
  <p>
  <div align="right">&nbsp;&nbsp;&nbsp;&nbsp; </div>
  </p>
</form>
</p>

</div>
</div>
</td>
</tr>
</table> 