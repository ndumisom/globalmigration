<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
<tr>
<td>
<div class="post">
<h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;">Text Message </a></h2>
<div class="entry">
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?
                if (isset($_SESSION['message'])) {
                    echo '<span id="msg"><b>' . $_SESSION['message'] . '</span></b>';
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error'])) {
                    echo '<span id="error"><b>' . $_SESSION['error'] . '</span></b/>';
                    unset($_SESSION['error']);
                }
                ?><br/>
<form method="post" action="p_compose.php" onSubmit="return send_message( this );">
 <div class="present">
 <p>
 <div align="right"></div>
 </p>
 <table width="470" cellpadding="1" cellspacing="1">
     <tr>
    <td> To </td>
        <td><input type="text" name="to" id="search-text" value=""/></td>
        <td> </b></a></td>
  </tr>
  <tr>
    <td> Subject</td>
        <td><input type="text" name="subject" id="search-text" value=""/></td>
        <td> </b></a></td>
  </tr>
  <tr>
    <td height="149" >Text Message</td>
    <td valign="middle" align="left"><textarea name="msg" rows="8" cols="35"></textarea></td>
    <td valign="middle" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td height="149" >&nbsp;</td>
        <td valign="top">
          <input name="text-msg" type="submit" id="search-submit" onclick="overlay( )" value="send message" class="login"/></td>
        <td valign="middle" align="left">&nbsp;</td>
  </tr>
</table>
</div>
  <p>
  <div align="right">&nbsp;&nbsp</div>
  </p>
</form>
</p>

</div>
</div>
</td>
</tr>
</table> 