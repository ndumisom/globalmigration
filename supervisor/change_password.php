<table class="tab"  border="0" cellspacing="0" cellpadding="0" width="100%" align="center" bordercolor="#0000CC"><tr><td>
<p><strong style="color: white; background-color: #0066FF">&nbsp;&nbsp;Change my password&nbsp;&nbsp;</strong></p>

<p> 
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
<form method="post" action="p_change_password.php" onsubmit="return changePswdForm( this );">
 <div class="present">
 <table cellspacing="1" cellpadding="1">
 <tr>
    <td width="124" height="49">Old Password</td>
    <td width="170"><input type="password" name="opassword" id="search-text" autocomplete="off" onKeyUp="veriyOldPswdHint(this.value,'oldPswdHint.php')"/></td>
    <td width="193">&nbsp;<span id="opswd">* Required</span></td>
  </tr>
  <tr>
    <td width="124" height="49">New Password</td>
    <td width="170"><input type="password" name="npassword" id="search-text" /></td>
    <td width="193">&nbsp;<span id="pswd">* Required</span></td>
  </tr>
  <tr>
    <td height="37">Verify password</td>
    <td><input type="password" name="vpassword" id="search-text"></td>
    <td valign="baseline">&nbsp;<span id="vpswd">* Required</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="change" value="Change" class="login"/></td><td>&nbsp;</td>
  </tr>
  </table>
  </div>
  <p>
  </p>
</form>
  </p>
  </p>
  <div id="overlay">
       <div><br />    
      </div>
    </div>
  </div>
 <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
  </td>
 
  </tr>
  </table>