<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

        >


        <title>Login</title>

        <style type="text/css">
            #error{

                border:1px solid #FF0033;
                width:350px; 
                padding-left:15px;
                padding-right:15px; 
                padding-bottom:8px; 
                padding-top:8px; 
                text-align:left;
                text-decoration:blink; 
                background-color:#33CC00; 
                font-size:14px;
                color:#FF3300;

            }
            #notice{
                border: 2px solid #FF0000;
                width: 460px;
                font-family: Verdana;
                font-size: 14px;
                color: #FF0000;
                margin: 10px auto;
                padding: 10px;
                background: #FFFFCC
                

            }
        </style>
    </head
    <body>
        <p> LOGIN</p>
        <div id="notice"> <b><u>Notice</u></b></div>
        <form method="post" action="p_l.php" name="log" class="log" id="" onsubmit="return contactUs( this );">
            <table width="35%" border="0" cellspacing="3" cellpadding="2">
                <tr>
                    <td colspan="3" valign="top"><?php if (isset($_SESSION['error'])) {
    echo'<span id="error">' . $_SESSION['error'] . '</span>';
    unset($_SESSION['error']);
} ?></td>
                </tr>
                <tr>
                    <td width="16%"  valign="top">Username</td>
                    <td width="3%" align="center"  valign="top">:</td>
                    <td width="81%" valign="middle"><input type="text" name="username" id="username" class="required"/></td>
                </tr>
                <tr>
                    <td  valign="top">Password </td>
                    <td align="center"  valign="top">:</td>
                    <td valign="top"><input type="password" name="password" id="password" class="requred"/></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input name="login" type="submit" id="login" value=" Login "/></td>
                </tr>
            </table>
        </form>
        <p>&nbsp;</p>

    </body>
</html>
