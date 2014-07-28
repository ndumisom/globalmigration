<style type="text/css">
    #list { height: 100px; overflow: auto; width: 300px; border: 1px solid #cccccc; background-color: white; }
    #list ul { list-style-type: none; margin: 0; padding: 0; overflow-x: hidden; }
    #list li { margin: 0; padding: 0;}

</style>
<table class="tab" width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#0000FF" >
    <tr>
        <td>
            <form name="ministerial" action="p_ministerial.php" method="post" class="uniForm" onsubmit="return validatePermit()">
              <h3><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> Ministerial</a></h3>
                <table width="50%" border="0" cellspacing="3" cellpadding="0">
                    <tr>
                        <td colspan="2" align="center"> <div align="right">
						<p><?php
if (isset($_SESSION['msg'])) {
    echo '<span id="msg">' . $_SESSION['msg'] . '</span>';
    unset($_SESSION['msg']);
}
if (isset($_SESSION['error'])) {
    echo '<span id="error">' . $_SESSION['error'] . '</span>';
    unset($_SESSION['error']);
}
?></p></div>
                            </td>
                    </tr>
                    <tr> <td>  Ministerial Representation</td> <td><input type="text" name="mini_representation" size="36"/></td></tr>
                    <tr>
                        <td colspan="2"><div id="txtHint"></div></td>
                    </tr>
                    <tr>
                        <td>Client id</td>
                        <td><input type="text" name="permit_appID" value="<?php echo $_GET['id']; ?>" disabled="disabled" size="36"/>
							<input type="hidden" name="permit_appID" value="<?php echo $_GET['id']; ?>"/>
						</td>
                    </tr>
                     <tr>
                        <td>Date submitted</td>
                    <script type="text/javascript">
                        /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                        var bas_cal,dp_cal,ms_cal;      
                        window.onmousedown = function () {
                            dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('date_submitted'));
                        };
                    </script>
                    <td><input type="text" name="date_submitted" size="36" id="date_submitted"/></td>
                    </tr>
                    <tr>
                        <td>Ref  No </td>
                        <td><input type="text" name="ref_no" size="36"/></td>
                    </tr>
                    <tr>
                        <td>Date Recieved</td>
                    <script type="text/javascript">
                        /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                        var bas_cal,dp_cal,ms_cal;      
                        window.onload = function () {
                            dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('date_recieved'));
                        };
                    </script>
                    <td><input type="text" name="date_received" size="36" id="date_recieved"/></td>
                    </tr>
                    <tr>
                        <td valign="top">Comments</td>
                        <td><textarea name="comments" rows="5" cols="29"></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Submit" class="login" /></td>
                    </tr>
                </table>
            </form>&nbsp;&nbsp;

        </td>
    </tr>
</table>
