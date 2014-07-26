
<script >
    var xmlHttp;
    function showUser(str)
    { 
        xmlHttp=GetXmlHttpObject();
        if (xmlHttp==null)
        {
            alert ("Browser does not support HTTP Request");
            return;
        }
        var url="getuser.php";
        url=url+"?q="+str;
        url=url+"&sid="+Math.random();
        xmlHttp.onreadystatechange=stateChanged;
        xmlHttp.open("GET",url,true);
        xmlHttp.send(null);
    }
    function stateChanged() 
    { 
        if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
        { 
            document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
        } 
    }
    function GetXmlHttpObject()
    {
        var xmlHttp=null;
        try
        {
            // Firefox, Opera 8.0+, Safari
            xmlHttp=new XMLHttpRequest();
        }
        catch (e)
        {
            //Internet Explorer
            try
            {
                xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e)
            {
                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        return xmlHttp;
    }


</script>
<table width="100%" cellspacing="0" cellpadding="0" border="1" bordercolor="#0000FF">


    <tr><td>

            <form name="memo" action="emailbody.php" method="post" onSubmit="return checkdate(this.mydate)">
                <p>&nbsp;</p>
                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                    <tr>
                        <td>&nbsp;</td>
                        <td>	  <?
if (isset($_SESSION['msg'])) {
    echo '<span id="msg"><b>' . $_SESSION['msg'] . '</span></b>';
    unset($_SESSION['msg']);
}
if (isset($_SESSION['error'])) {
    echo '<span id="error"><b>' . $_SESSION['error'] . '</span></b/>';
    unset($_SESSION['error']);
}
?>
                        </td>
                    </tr>
                    <tr>
                        <td width="26%"><b>Send memo to </b></td>
                        <td width="74%"> <?
                            $id = $_GET['id'];
                            $sql = mysql_fetch_assoc(mysql_query("select *from client_details where clientID=" . $id . ""));
                            echo 'Send to : <b>' . $sql['firstnames'] . '</b>';
                            $to = $sql['email'];
?></td>
                    </tr>
                    <tr>
                        <td><b>Select a permit type</b></td>
                        <td><input type="hidden" name="to" value="<? echo $to; ?>" />
                            <input type="hidden" name="id" value="<? echo $id; ?>" />
                            <select name="permit" onChange="showUser(this.value)" >
                                <option value="">                                           ---SELECT A PERMIT---                                        </option>
      
                                <option value="1">11(1)(b)(i) - Extension  </option>
                                <option value="2.1">11(2)- Extention</option>
                                <option value="2.2">11(2)- Airport</option>
                                <option value="2.3">11(2)- Mission</option>
                                <option value="3">11(6)(a)</option>
                                <option value="4.1">11(6)(b)-Employment submit in RSA</option>S
                                <option value="4.2">11(6)(b)-Own Business submit in RSA</option>
                                <option value="4.3">11(6)(b)-Study submit in RSA</option>
                                <option value="5.1">13 - Majors Extension </option>
                                <option value="5.2">13 - Majors submit in RSA</option>
                                <option value="5.3">13 - Majors submit Abroad </option>
                                <option value="5.4">13 - Minors Extension</option>
                                <option value="5.4">13 - Minors submit in RSA</option>
                                <option value="5.6">13 - Minors submit Abroad</option>
                                <option value="6.1">15 - Extension</option>
                                <option value="6.2">15 - submit in RSA</option>
                                <option value="6.3">15 - submit Abroad</option>
                                <option value="17.1">17 - Extension</option>
                                <option value="17.2">17 - submit in RSA</option>
                                <option value="7.1">18 - Extension</option>
                                <option value="7.2">18 -  submit in RSA</option>
                                <option value="7.2">18 - submit Abroad</option>
                                <option value="8.1">19(1) - Extension</option>
                                <option value="8.2">19(1) - submit in RSA</option>
                                <option value="8.3">19(1) - submit Abroad</option>
                                <option value="9.1">19(2) - Extension</option>
                                <option value="9.2">19(2) -  submit in RSA</option>
                                <option value="9.3">19(2) -  submit Abroad</option>
                                <option value="9.4">19(2) + part-time Studies</option>
                                <option value="10.1">19(4) - Extension</option>
                                <option value="10.2">19(4) - submit in RSA</option>
                                <option value="10.3">19(4) - submit Abroad</option>
                                <option value="18">19(4) + wife & child Submit Abroad</option>
                                <option value="11.1">19(5) -  submit in RSA</option>
                                <option value="11.2">19(5) -  submit Abroad</option>
                                <option value="12.1">20 - couple Extension</option>
                                <option value="12.2">20 - couple in RSA</option>
                                <option value="12.3">20 - couple Abroad</option>
                                <option value="12.4">20 - single Extension</option>
                                <option value="12.5">20 - single in RSA</option>
                                <option value="12.6">20 - single Abroad</option>
                                <option value="13">21 + (dd) submit in RSA</option>
                                
                               







                            </select>	</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td valign="top"><b>Additional information</b></td>
                        <td ><textarea name="text" rows="5" cols="30"></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="send" value=" Send "  class="login" /></td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </form>

        </td>
    </tr>
</table>