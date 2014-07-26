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
var url="viwe_checklist.php";
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
    <table>
        <tr>
            <td>
                
  <form name="search" action="" method="post">
  <table width="20%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><input type="text" name="name" id="search-text1"/></td>
    <td><input  type="submit" name="submit" id="search-submit" value="Search" class="login"/></td>
  </tr>
</table>
</form>

<?
 if(isset($_POST['submit'])){ 
	  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ 
	  $name=$_POST['name']; 
	  //connect  to the database 
	  $db=mysql_connect  ("localhost", "root",  "mapapa1531") or die ('I cannot connect to the database  because: ' . mysql_error()); 
	  //-select  the database to use 
	  $mydb=mysql_select_db("globalmigration_db"); 
	  //-query  the database table 
	  $sql="SELECT  *FROM client_details WHERE firstnames LIKE '%" . $name .  "%' OR surname LIKE '%" . $name ."%' OR file_no LIKE '%" . $name ."%'"; 
	  //-run  the query against the mysql query function 
	  $result=mysql_query($sql); 
          $numrows=mysql_num_rows($result); 
	  //-create  while loop and loop through result set 
           echo "<a href=' http://localhost/globalmigration/admin/admin_index.php'>back</a>";
	  while($row=mysql_fetch_array($result)){ 
	          $firstname  =$row['firstnames']; 
	          $surname=$row['surname']; 
                  $file_no=$row['file_no']; 
	          $userID=$row['clientID']; 
                  $isSearchFound = true;
	 if($isSearchFound){
	  //-display the result of the array 
	
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"#\">"   .$firstname . " &nbsp;&nbsp;&nbsp;  " . $surname ."   &nbsp;&nbsp;&nbsp; ".$file_no. "</a></li>\n"; 
	  echo "</ul>"; 
	  }
 else {
              echo "<h1>No results found.</h1>";
}
	  } }

   
	  else{ 
	  echo  " <br/> <p>Please enter a search query</p>"; 
	  } 
	  
	  } 
	?>
                <br/>

Select a User:
<select name="doc" onchange="showUser(this.value)">
      <option value="2">visitors_permit</option>
      <option value="3">visitors_permit_academic</option>
      <option value="4">visitors_permit_voluntary</option>
      <option value="5">visitors_permit_research</option>
      <option value="6">visitors_permit_spousedependent</option>
      <option value="7">visitors_permit_prhold</option>
      <option value="8">study_permit</option>
      <option value="9">treaty_permit</option>
      <option value="10">business_permit</option>
      <option value="11">medical_permit</option>
      <option value="12">relative_permit</option>
      <option value="13">quota_permit</option>
      <option value="14">genral_work_permit</option>
      <option value="15">exceptional_skills</option>
      <option value="16">intra_company_transfer</option>
      <option value="17">retired_person_permit</option>
	  <option value="18">corporate_permit</option>
	  <option value="19">coporate_worker</option>
	  <option value="20">exchange_permit</option>
    </select>


<p>
<div id="txtHint"><b>User info will be listed here.</b></div>
</p>
        </td></tr></table>
</body>
</html>