<html>
<head>
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
</head>
<body>
    <? 
       
       $id = $_GET['id'];
       $sql = mysql_fetch_assoc(mysql_query("select *from client_details where clientID=".$id.""));
       echo 'Email to : <b>'.$sql['firstnames'].'</b>';
       $to= $sql['email'];
     ?>
    <br/>
<form> 
<b>Select a permit type:</b>
<select name="users" onChange="showUser(this.value)">
      <option>                                           ---SELECT A PERMIT---                                        </option>
      <option value="2">VISITORS PERMIT 11(1)(b)(i) and 11(2)</option>
      <option value="3">VISITORS PERMIT 11(1)(b)(ii)(aa) – Academic Sabbatical</option>
      <option value="4">VISITORS PERMIT 11(1)(b)(ii)(bb) – Voluntary Work</option>
      <option value="5">VISITORS PERMIT 11(1)(b)(ii)(cc) – Research</option>
      <option value="6">VISITORS PERMIT 11(1)(b)(ii)(dd) – Spouse / Dependant child acc a holder of a permit issued ito sec 11,13,14,15,17,19 or 22</option>
      <option value="7">VISITORS PERMIT (SPOUSE OF SAC/PR HOLDER WHO WORK OR STUDY) – SEC 11(6)</option>
      <option value="8">STUDY PERMIT – SEC 13</option>
      <option value="9">TREATY PERMITS – SEC 14</option>
      <option value="10">BUSINESS PERMIT – SEC 15</option>
      <option value="11">MEDICAL PERMIT – SEC 17</option>
      <option value="12">RELATIVE PERMIT – SEC 18</option>
      <option value="13">QUOTA WORK PERMIT – SEC 19(1)</option>
      <option value="14">GENERAL WORK PERMIT  - SEC 19(2)</option>
      <option value="15">EXCEPTIONAL SKILLS – SEC 19(4)  </option>
      <option value="16">INTRA-COMPANY TRANSFER – SEC 19(5)</option>
      <option value="17">RETIRED PERSONS PERMIT – SEC 20</option>
	  <option value="18">CORPORATE PERMIT – SEC 21</option>
	  <option value="19">CORPORATE WORKER – SEC 19(2) read with SEC 21 & Reg 18(6)</option>
	  <option value="20">EXCHANGE PERMIT – SEC 22</option>
</select>
</form>
<p>
<div id="txtHint">Documents will be listed here.</div>
<? require 'getuser.php'; ?>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</p>
</body>
</html>
