  <? 
  session_start();
   $id = $_GET["id"];
	$objConnect = mysql_connect("localhost","root","mapapa1531") or die(mysql_error());
	$objDB = mysql_select_db("globalmigration_db");
	$strSQL = "SELECT * FROM task_request,client_details WHERE task_request.clientID=client_details.clientID AND task_requestID = '$id' ";
	$objQuery = mysql_query($strSQL);
	$row = mysql_fetch_array($objQuery);
?>

<style>
    .table{
        background-color: black;
    }
</style>
    
<script type="text/javascript">
        $(document).ready(
                function(){
                        $('#clear').fadeOut(3000);
                }
        );
</script>

    <center><span id="clear"><?
                if (isset($_SESSION['message'])) {
                    echo '<span id="msg"><b>' . $_SESSION['message'] . '</span></b>';
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error'])) {
                    echo '<span id="error"><b>' . $_SESSION['error'] . '</span></b/>';
                    unset($_SESSION['error']);
                }
                ?></span>

            <form action="update_task_request.php" method="post">
                <table class="table table-bordered" bgcolor="#353535">
					  <tr>
                        <td bgcolor="#FFFFFF" colspan=4 align="right">
                   
                            <div align="right">NO#<input type="text" disabled="disabled" name="task_requestID" value="<? echo  $row['task_requestID'];?>" /><input type="hidden" name="task_requestID" value="<? echo  $row['task_requestID'];?>" /></div>
                  
                        </td>
                   </tr>
					   <tr>
					   <td bgcolor="#FFFFFF" width="50%">Date<input type="hidden" name="clientID" value="<? echo $row['clientID']; ?>"/></td><td bgcolor="#FFFFFF" ><input type="text" name="date_required" value="<? echo $row['date_required']; ?>" id="date_r" autocomplete="off"/>
                                           
                                           </td>
					   <td bgcolor="#FFFFFF" width="30%"> File No</td><td bgcolor="#FFFFFF" ><input type="text" name="file_no" value="<? echo $row['file_no']; ?>" autocomplete="off"/> </td>
					   
					   </tr>
					    <tr><td bgcolor="#FFFFFF" width="30%">Client Name</td><td bgcolor="#FFFFFF"><input type="text" name="client_name" value="<? echo $row['surname']; ?> <? echo $row['firstnames']; ?>" id="end_date" autocomplete="off"/></td>
					   <td bgcolor="#FFFFFF" width="50%">Required By</td><td bgcolor="#FFFFFF"><input type="text" name="required_by" value="<? echo $row['required_by']; ?>" id="end_date" autocomplete="off"/> </td>
					   </tr>
					   <tr>
                        <td bgcolor="#FFFFFF" colspan=4 align="center">
                            <br/><u><strong>Selected Task Request</strong></u>
                        </td>
                       </tr>
					   <tr>
                        <td bgcolor="#FFFFFF" colspan=4 align="center">
                            <br/> <?
                            $request = $row['request']; 
	         $read = explode(";",$request); 
			 
			for($i = 0; $i < count($read); $i++){
	            echo '<input type="checkbox" checked="yes" name="request[]" value="'.$read[$i].'"/> '.$read[$i].' <br/>';
                  }
							?>
                        </td>

                    </tr>
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
                        <td bgcolor="#FFFFFF" width="30%" > Transfer of PR into ppt</td>
						<td bgcolor="#FFFFFF" width="30%" >R 1 000.00 (+) VAT </td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="Transfer of PR into ppt &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 1 000.00 (+) VAT"> </td>
                    </tr>
					 </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > Urgent Courier</td>
						<td bgcolor="#FFFFFF" width="30%" > R 300.00 - R 600.00 </td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="Urgent Courier &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R 300.00 - R 600.00 "> </td>
                    </tr><tr>
                        <td bgcolor="#FFFFFF" width="30%" > Standard Courier Service</td>
						<td bgcolor="#FFFFFF" width="30%" > R 120.00</td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2> <input type="checkbox" name="request[]"  value="Standard Courier Service &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; R 120.00"> </td>
                    </tr>
					 <tr>
                        <td bgcolor="#FFFFFF" colspan=4 align="center">
						<br/>
                            Other:
                        </td>

                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" width="30%" > &nbsp;</td>
						<td bgcolor="#FFFFFF" width="30%" > &nbsp;</td>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=2>&nbsp; </td>
                    </tr>
                   
                    <tr>
                        <td bgcolor="#FFFFFF" width="20%"  colspan=4>
						<textarea rows="2" cols="90" name="request_other"><? echo $row['request_other']; ?> </textarea> 

                   </td>
                    </tr>
                    
                    <tr>
                        <td bgcolor="#FFFFFF" colspan=4 align="center">
                            <br/>
                        </td>

                    </tr>
					  <tr><td bgcolor="#FFFFFF" width="30%">Invoice Number</td><td bgcolor="#FFFFFF" ><input type="text" name="invoice_no" value="<? echo $row['invoice_no']; ?>" autocomplete="off"/></td>
					   <td bgcolor="#FFFFFF" width="50%">Receipt Number</td><td bgcolor="#FFFFFF" ><input type="text" name="receipt_no" value="<? echo $row['receipt_no']; ?>"  autocomplete="off"/> </td>
					   </tr>
					   <tr><td bgcolor="#FFFFFF" width="30%">Approved By</td><td bgcolor="#FFFFFF" ><input type="text" name="approved_by" value="<? echo $row['approved_by']; ?>" autocomplete="off"/></td>
					   <td bgcolor="#FFFFFF" width="50%">Consultant</td><td bgcolor="#FFFFFF" ><input type="text" name="consultant" value="<? echo $row['consultant']; ?>" autocomplete="off"/> </td>
					   </tr>
					    <tr><td bgcolor="#FFFFFF" width="30%" valign="top" >Allocated to</td><td bgcolor="#FFFFFF"><input type="text" name="allocated_to" value="<? echo $row['allocated_to']; ?>"  autocomplete="off"/> <br/> Today's Date| <br/><input type="text" name="allocated_date" value="<? echo $row['allocated_date']; ?>" id="f_date_a"  autocomplete="off"/></td>
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
<td bgcolor="#FFFFFF" width="50%" valign="top">Completed By</td><td bgcolor="#FFFFFF"><input type="text" name="completed_by" value="<? echo $row['completed_by']; ?>"  autocomplete="off"/><br/> Date Completed| <br/><input type="text" name="completed_date" value="<? echo $row['completed_date']; ?>" id="date_a" autocomplete="off"/></td>
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
                            <input type="submit" name="Submit" value=" Save " class="btn btn-primary"> 
                        </td>

                    </tr>
                </table>
            </form>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
           