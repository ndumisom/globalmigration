<?
ob_start();
include_once("class.php");
$clientID = $_GET["id"];


$result = mysql_query("SELECT * FROM task_request where task_request.clientID = '$clientID' ");
$row = @mysql_fetch_array($result);
$num = @mysql_num_rows($result);
if($num>0){
    header("location:index.php?m=edit_request&id=".$clientID);
    exit;
}
else{
    $strSQL = "SELECT * FROM client_details WHERE client_details.clientID = '$clientID'";
	$objQuery = @mysql_query($strSQL);
	$row = @mysql_fetch_array($objQuery);

?>

<script type="text/javascript">
function check_date (d)
{
  var strMistakes="";

  var datePattern = /^\d{4}-\d{2}-\d{2}$/gi;
  var testDate = true;
  if (String(d).match(datePattern) == null) testDate = false;

  if (testDate)
  {
   var theDate, theMonth, theYear
     
   theDate = parseInt(d.substr(8,2));
   theMonth = parseInt(d.substr(5,2));
   theYear = parseInt(d.substr(0,4));
     
   if (theMonth < 0 || theMonth > 12) strMistakes = "Month is invalid\n";
   if (theDate < 0 || theDate > 31) strMistakes = "Date is invalid\n";  
   
   if (theDate >= 1 && theDate <= 31)
   {
    if (theMonth == 2)
    {
     if (theYear % 4 == 0)
     {
      if (theDate < 0 || theDate > 29) strMistakes = "Date is invalid\n";
     }
     else
     {
      if (theDate < 0 || theDate > 28) strMistakes = "Date is invalid\n";
     }
    }
   }
  }
  else
  {
   strMistakes = "Date format is invalid\n";
  }
  return strMistakes;
}

function checkDate(d){
	var valid_date = check_date(d);
	if (valid_date == "") {
		//alert("Valid Date");
	} else {
		alert(valid_date)
	}
}

/*function validateTask()
{
var x=document.forms["task"]["consultant"].value;
if (x==null || x=="")
  {
  alert("Please select the consultant name");
  return false;
  }
  
var y=document.forms["task"]["allocated_task"].value;
if (y==null || y=="")
  {
  alert("Please select the task ");
  return false;
  }
  

  
  var a=document.forms["task"]["allocated_to"].value;
if (a==null || a=="")
  {
  alert("Please select allocated person");
  return false;
  }
  
  var b=document.forms["task"]["due_date"].value;
if (b==null || b=="")
  {
  alert("Please enter the due date");
  return false;
  }
  var c=document.forms["taskr"]["allocated_to"].value;
if (c==null || c=="")
  {
  alert("Please select a staff");
  return false;
  }
  
    var d=document.forms["task"]["allocated_task"].value;
if (d==null || d=="")
  {
  alert("Please select a task");
  return false;
  }
  
  var d=document.forms["task"]["details"].value;
if (d==null || d=="")
  {
  alert("Please search for the client");
  return false;
  }
  
}
*/
</script>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
<script type="text/javascript">
        $(document).ready(
                function(){
                        $('#clear').fadeOut(3000);
                }
        );
</script>
<table class="table table-bordered">
    <tr>
        <td>
            <span id="clear"><?
                if (isset($_SESSION['message'])) {
                    echo '<span id="msg"><b>' . $_SESSION['message'] . '</span></b>';
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error'])) {
                    echo '<span id="error"><b>' . $_SESSION['error'] . '</span></b/>';
                    unset($_SESSION['error']);
                }
                ?></span>

            <form action="p_task_request.php" method="post">
                <table>
					   <tr>
                                               
					   <td>Date</td><td bgcolor="#FFFFFF" ><input type="text" name="date_required" id="date_r" autocomplete="off"/>
                                               <script type="text/javascript">
    function catcalc(cal) {
        var date = cal.date;
        var time = date.getTime()
        // use the _other_ field
        var field = document.getElementById("f_calcdate");
        if (field == cal.params.inputField) {
            field = document.getElementById("date_r");
            time -= Date.WEEK; // substract one week
        } else {
            time += Date.WEEK; // add one week
        }
        var date2 = new Date(time);
        field.value = date2.print("%Y-%m-%d %H:%M");
    }
    Calendar.setup({
        inputField     :    "date_r",   // id of the input field
        ifFormat       :    "%Y-%m-%d %H:%M",       // format of the input field
        showsTime      :    true,
        timeFormat     :    "24",
        onUpdate       :    catcalc
    });
   
</script>
                                               <input type="hidden" name="clientID" value="<? echo $_GET["id"]; ?>"/> </td>
					   <td bgcolor="#FFFFFF" width="30%">File No</td><td bgcolor="#FFFFFF" ><input type="text" name="file_no" value="<? echo $row['file_no']; ?>" autocomplete="off"/></td>
					   

					   </tr>
					    <tr><td bgcolor="#FFFFFF" width="30%">Client Name</td><td bgcolor="#FFFFFF"><input type="text" name="client_name" value="<? echo $row['surname']; ?> <? echo $row['firstnames']; ?> " autocomplete="off"/></td>
					   <td bgcolor="#FFFFFF" width="50%">Required By</td><td bgcolor="#FFFFFF"><input type="text" name="required_by" value="<? echo $row['consultant']; ?>" autocomplete="off"/> </td>
					   </tr>
					   <tr>
                        <td bgcolor="#FFFFFF" colspan=4 align="center">
                            <br/><center><u>Request</u></center>
                        </td>

                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" width="30%" > Service</td>
						<td bgcolor="#FFFFFF" width="30%" > Cost</td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> Select </td>
                    </tr>
					<tr>
                        <td bgcolor="#FFFFFF" width="30%" > Collection / Drop Off Docs </td>
						<td bgcolor="#FFFFFF" width="30%" > R 850.00 </td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="Collection / Drop Off Docs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R 850.00"> </td>
                    </tr>
					<tr>
                        <td bgcolor="#FFFFFF" width="30%" > Organ of State Letter</td>
						<td bgcolor="#FFFFFF" width="30%" > R 850.00 </td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="Organ of State Letter &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R 850.00"> </td>
                    </tr>
					<tr>
                        <td bgcolor="#FFFFFF" width="30%" > Employment Contract </td>
						<td bgcolor="#FFFFFF" width="30%" > R 850.00 </td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="Employment Contract &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R 850.00"> </td>
                    </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > Letter of Motivation </td>
						<td bgcolor="#FFFFFF" width="30%" > R 850.00 </td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="Letter of Motivation  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R 850.00 "> </td>
                    </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > Reference Letter </td>
						<td bgcolor="#FFFFFF" width="30%" > R 850.00 </td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value=" Reference Letter  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 850.00"> </td>
                    </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > SA Police Clearance </td>
						<td bgcolor="#FFFFFF" width="30%" > R 800.00 </td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="SA Police Clearance  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 800.00 "> </td>
                    </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > Waiver Request</td>
						<td bgcolor="#FFFFFF" width="30%" > R 2000.00 </td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value=" Waiver Request &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 2000.00 "> </td>
                    </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > Translations </td>
						<td bgcolor="#FFFFFF" width="30%" > Service Provider R150 (+) Courier Fee </td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="Translations  Service Provider &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R150 (+) Courier Fee "></td>
                    </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > Business Plan</td>
						<td bgcolor="#FFFFFF" width="30%" > R 5 000.00 (+) VAT</td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="Business Plan  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 5 000.00 (+) VAT"> </td>
                    </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > Airport 11(2) letter </td>
						<td bgcolor="#FFFFFF" width="30%" > R 500.00 (+) VAT</td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="irport 11(2) letter &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 500.00 (+) VAT "> </td>
                    </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > Assistance with Doctor </td>
						<td bgcolor="#FFFFFF" width="30%" >  R 450 p/hour (+) VAT</td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value=" Assistance with Doctor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 450 p/hour (+) VAT"> </td>
                    </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > Transfer of TRP into ppt </td>
						<td bgcolor="#FFFFFF" width="30%" > R 1 000.00 (+) VAT</td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="Transfer of TRP into ppt &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 1 000.00 (+) VAT"> </td>
                    </tr><tr>
                        <td > Transfer of PR into ppt</td>
						<td>R 1 000.00 (+) VAT </td>
                        <td colspan=2> <input type="checkbox" name="request[]"  value="Transfer of PR into ppt &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 1 000.00 (+) VAT"> </td>
                    </tr>
					 </tr><tr>
                        <td> Urgent Courier</td>
						<td > R 300.00 - R 600.00 </td>
                        <td colspan=2> <input type="checkbox" name="request[]"  value="Urgent Courier &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 300.00 - R 600.00 "> </td>
                    </tr><tr>
                        <td> Standard Courier Service</td>
						<td  > R 120.00</td>
                        <td  colspan=2> <input type="checkbox" name="request[]"  value="Standard Courier Service &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; R 120.00"> </td>
                    </tr>
					 <tr>
                        <td bgcolor="#FFFFFF" colspan=4 align="center">
						<br/>
                            Other:
                        </td>

                    </tr>
                    <tr>
                        <td> &nbsp;</td>
						<td> &nbsp;</td>
                        <td  colspan=2>&nbsp; </td>
                    </tr>
                   
                    <tr>
                        <td colspan=4>
						<textarea rows="2" cols="90" name="request_other"></textarea> 

                   </td>
                    </tr>
                    
                    <tr>
                        <td bgcolor="#FFFFFF" colspan=4 align="center">
                            <br/>
                        </td>

                    </tr>
					  <tr><td b>Invoice Number</td><td bgcolor="#FFFFFF" ><input type="text" name="invoice_no" autocomplete="off"/></td>
					   <td>Receipt Number</td><td bgcolor="#FFFFFF" ><input type="text" name="receipt_no"  autocomplete="off"/> </td>
					   </tr>
					   <tr><td>Approved By</td><td bgcolor="#FFFFFF" ><input type="text" name="approved_by" autocomplete="off"/></td>
					   <td b>Consultant</td><td bgcolor="#FFFFFF" ><input type="text" name="consultant" value="<? echo $row['consultant']; ?>"  autocomplete="off"/> </td>
					   </tr>
					    <tr><td  valign="top" >Allocated to</td><td bgcolor="#FFFFFF"><input type="text" name="allocated_to"  autocomplete="off"/> <br/> Today's Date| <br/><input type="text" name="allocated_date" id="f_date_a"  autocomplete="off"/></td>
						<script type="text/javascript">
                        function catcalc(cal) {
                            var date = cal.date;
                            var time = date.getTime()
                            // use the _other_ field
                            var field = document.getElementById("f_calcdate");
                            if (field == cal.params.inputField) {
                                field = document.getElementById("f_date_a");
                                time -= Date.WEEK; // substract one week
                            } else {
                                time += Date.WEEK; // add one week
                            }
                            var date2 = new Date(time);
                            field.value = date2.print("%Y-%m-%d %H:%M");
                        }
                        Calendar.setup({
                            inputField     :    "f_date_a",   // id of the input field
                            ifFormat       :    "%Y-%m-%d %H:%M",       // format of the input field
                            showsTime      :    true,
                            timeFormat     :    "24",
                            onUpdate       :    catcalc
                        });

                    </script>
					   <td  valign="top">Completed By</td><td bgcolor="#FFFFFF"><input type="text" name="completed_by"  autocomplete="off"/> <br/> Date Completed| <br/><input type="text" name="completed_date" id="date_a" autocomplete="off"/></td>
					   <script type="text/javascript">
                        function catcalc(cal) {
                                var date = cal.date;
                                var time = date.getTime()
                                // use the _other_ field
                                var field = document.getElementById("f_calcdate");
                                if (field == cal.params.inputField) {
                                    field = document.getElementById("date_a");
                                    time -= Date.WEEK; // substract one week
                                } else {
                                    time += Date.WEEK; // add one week
                                }
                                var date2 = new Date(time);
                                field.value = date2.print("%Y-%m-%d %H:%M");
                            }
                            Calendar.setup({
                                inputField     :    "date_a",   // id of the input field
                                ifFormat       :    "%Y-%m-%d %H:%M",       // format of the input field
                                showsTime      :    true,
                                timeFormat     :    "24",
                                onUpdate       :    catcalc
                            });

                        </script>
					   </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" colspan=4 align="right">
                    <strong>Notify: </strong><p><input type="checkbox" name="to[]"  value="Admin"> Admin
                            <input type="checkbox" name="to[]"  value="Eldorette"> Eldorette
                            <input type="checkbox" name="to[]"  value="Elsa"> Elsa
                            <input type="checkbox" name="to[]"  value="Gillian"> Gillian
                            <input type="checkbox" name="to[]"  value="Gordon"> Gordon
                            <input type="checkbox" name="to[]"  value="Keith"> Keith
                            <input type="checkbox" name="to[]"  value="Leon"> Leon
                            <input type="checkbox" name="to[]"  value="Linde"> Linde
                            <input type="checkbox" name="to[]"  value="Lucia"> Lucia
                            <input type="checkbox" name="to[]"  value="Octavius"> Octavius
                            <input type="checkbox" name="to[]"  value="Taryn"> Taryn
                            <input type="checkbox" name="to[]"  value="Tina"> Tina
                            <input type="checkbox" name="to[]"  value="Wendy"> Wendy
                            
                    </p>
                        </td>

                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" colspan=4 align="right">
                            <input type="submit" name="Submit" value=" Submit " class="btn btn-primary"> 
                        </td>

                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>


            
<?
ob_end_flush();
}
?>