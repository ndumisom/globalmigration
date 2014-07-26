<?php session_start(); ?>

<script>
    var xmlHttp;
    function showUser(str)
    { 
        xmlHttp=GetXmlHttpObject();
        if (xmlHttp==null)
        {
            alert ("Browser does not support HTTP Request");
            return;
        }
        var url="current_permit.php";
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
<style type="text/css">
    #list { height: 100px; overflow: auto; width: 300px; border: 1px solid #cccccc; background-color: white; }
    #list ul { list-style-type: none; margin: 0; padding: 0; overflow-x: hidden; }
    #list li { margin: 0; padding: 0;}

</style>
<table class="tab" width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#0000FF" >
    <tr>
        <td>
            <form name="permit" action="add_permitapp _countires.php" method="post" class="uniForm" onsubmit="return validatePermit()">
                <h3> Permit Applications Botswana</h3>
                <table width="50%" border="0" cellspacing="3" cellpadding="0">
                    <tr>
                        <td colspan="2" align="center"> <div align="right"><?php

if (isset($_SESSION['msg'])) {
    echo '<span id="msg">' . $_SESSION['msg'] . '</span>';
    unset($_SESSION['msg']);
}
if (isset($_SESSION['error'])) {
    echo '<span id="error">' . $_SESSION['error'] . '</span>';
    unset($_SESSION['error']);
}
?></div>
                            <p>&nbsp;</p></td>
                    </tr>
                    <tr> <td>  Current Permit</td> <td><select name="current_permit" id="current_permit" onChange="showUser(this.value)"> 
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </td></tr>
                    <tr>
                        <td colspan="2"><div id="txtHint"></div></td>
                    </tr>
                    <tr>
                        <td>Client id</td>
                        <td><input type="text" name="clientID" value="<?php echo $_GET['id']; ?>" disabled="disabled" size="36"/><input type="hidden" name="clientID" value="<?php echo $_GET['id']; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Country </td>
                        <td><input type="text" name="country" size="36" value="<?php echo $_GET['m']; ?>" disabled="disabled"/></td>
                    </tr>
                    <tr>
                        <td>Service</td>

                        <td>
                            <div id="list">
                                <ul class="uls">
                                    <li>  <input type="checkbox" name="service[]"  value="Advert - draft"> Advert - draft</li>
                                    <li>  <input type="checkbox" name="service[]" value="Advert - placement"/>Advert - placement</li>
                                    <li>  <input type="checkbox" name="service[]" value="Benchmarking"/>Benchmarking</li>
                                    <li>  <input type="checkbox" name="service[]" value="Business Plan"/>Business Plan</li>
                                    <li>  <input type="checkbox" name="service[]" value="Call out Fees"/>Call out Fees</li>
                                    <li>  <input type="checkbox" name="service[]" value="Chartered Accountant Certificate"/>Chartered Accountant Certificate</li>
                                    <li>  <input type="checkbox" name="service[]" value="Company Registration (CC, Pty, Vat, etc)"/>Company Registration (CC, Pty, Vat, etc)</li>
                                    <li>  <input type="checkbox" name="service[]" value="Courier"/>Courier</li>
                                    <li>  <input type="checkbox" name="service[]" value="Good Cause Period"/>Good Cause Period</li>
                                    <li>  <input type="checkbox" name="service[]" value="Handling Fees"/>Handling Fees</li>
                                    <li>  <input type="checkbox" name="service[]" value="Labour"/>Labour</li>
                                    <li>  <input type="checkbox" name="service[]" value="Legalisation<"/>Legalisation</li>
                                    <li>  <input type="checkbox" name="service[]" value="Medical"/>Medical</li>
                                    <li>  <input type="checkbox" name="service[]" value="Other"/>Other</li>
                                    <li>  <input type="checkbox" name="service[]" value="Other Services (CVs, Letters, etc)"/>Other Services (CVs, Letters, etc)</li>
                                    <li>  <input type="checkbox" name="service[]" value="Permit application"/>Permit application</li>
                                    <li>  <input type="checkbox" name="service[]" value="PR Attendance at Interviews"/>PR Attendance at Interviews</li>
                                    <li>  <input type="checkbox" name="service[]" value="Professional Fees"/>Professional Fees</li>
                                    <li>  <input type="checkbox" name="service[]" value="Request refund of overstay fine"/>Request refund of overstay fine</li>
                                    <li>  <input type="checkbox" name="service[]" value="SAQA"/>SAQA</li>
                                    <li>  <input type="checkbox" name="service[]" value="Translation"/>Translation</li>
                                    <li>  <input type="checkbox" name="service[]" value="Urgent Applications"/>Urgent Applications</li>
                                    <li>  <input type="checkbox" name="service[]" value="Waiver Request"/>Waiver Request</li>

                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Permit</td>
                        <td><select name="permit" id="permit">
                                <option value="0">Select</option>

                                <option value="Work permit">Work permit</option>
                               
                            </select></td>
                    </tr>
                    <tr>
                        <td>Permit status </td>
                        <td>
                            <select name="permit_status" id="level" >
                                <option value="">Select</option>
                                <option value="New client">New client</option>
                                <option value="Pending at DHA">Pending at DHA</option>
                                <option value="Pre-Submission">Pre-Submission</option>
                                <option value="TRP Endorsed">TRP Endorsed</option>
                                <option value="PR Endorsed">PR Endorsed</option>
                                <option value="Urgent">Urgent</option>
                                <option value="Memo issued - Awaiting Documents">Memo issued - Awaiting Documents</option>
                                <option value="File Closed">File Closed</option>
                                <option value="Current Valid TRP">Current Valid TRP</option>
                                <option value="Finalised - Awaiting Copy of Permit">Finalised - Awaiting Copy of Permit</option>
                                <option value="Waivers Pending">Waivers Pending</option>
                                <option value="Memorandum Issued">Memorandum Issued</option>
                                <option value="Payment Status - Complete">Payment Status - Complete</option>
                                <option value="Payment Status - Incomplete">Payment Status - Incomplete</option>
                                <option value="Consultation">Consultation</option>
                                <option value="Citizenship Received">Citizenship Received</option>
                                <option value="Work Complete">Work Complete</option>
                                <option value="Expired">Expired</option>
                                <option value="Received New TRP<">Received New TRP</option>
                                <option value="Awaiting Instruction">Awaiting Instruction</option>
                                <option value="Awaiting Waiver">Awaiting Waiver</option>
                                <option value="Illegal">Illegal</option>
                                <option value="No Extension required">No Extension required</option>
                                <option value="Extension submitted">Extension submitted</option>
                                <option value="Applicant Abroad">Applicant Abroad</option>
                                <option value="Appeal Submitted">Appeal Submitted</option>
                                <option value="Deceased">Deceased</option>
                                <option value="No copy of trp on file">No copy of trp on file</option>
                                <option value="To be submitted to DHA">To be submitted to DHA</option>
                                <option value="Received by DHA">Received by DHA</option>
                                <option value="Submitted to DHA">Submitted to DHA</option>
                                <option value="Departed RSA">Departed RSA</option>
                                <option value="Approved, waiting for passports">Approved, waiting for passports</option>
                                <option value="South African Citizen">South African Citizen</option>
                                <option value="TRP Refused">TRP Refused</option>
                                <option value="Memo issued- Transfer of permit to new passport">Memo issued- Transfer of permit to new passport</option>
                                <option value="Refused">Refused</option>
                                <option value="Review, Submitted">Review, Submitted</option>
                                <option value="Documents Received">Documents Received</option>
                                <option value="Balance of documents received1">Balance of documents received1</option>
                                <option value="Balance of documents recieved2">Balance of documents recieved2</option>
                                <option value="Balance of documents recieved3">Balance of documents recieved3</option>
                                <option value="Incorrect Endorsement">Incorrect Endorsement</option>
                                <option value="Finalised">Finalised</option>
                                <option value="Refused,Form2 received">Refused,Form2 received</option>

                            </select>


                        </td>
                    </tr>
                    <tr>
                        <td>Fees </td>
                        <td><input type="text" name="fees" size="36"/></td>
                    </tr>
                    <tr>
                        <td>Contact at Dept of Labour in Botswana </td>
                        <td><input type="text" name="contact_dept" size="36"/></td>
                    </tr>
                    <tr>
                        <td>Partner And Contact Number</td>
                        <td><input type="text" name="contact_partner" size="36"/></td>
                    </tr>
                    <tr>
                        <td>Embassy contact Number</td>
                        <td><input type="text" name="contact_embassy" size="36"/></td>
                    </tr>                    
                    <tr>
                        <td>Expiry Date </td>
                    <script type="text/javascript">
                        /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                        var bas_cal,dp_cal,ms_cal;      
                        window.onclick = function () {
                            dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('expiry_date'));
                        };
                    </script>
                    <td><input  type="text" name="expiry_date" size="36" id="expiry_date"/></td>
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
                        <td>&nbsp;<input type="hidden" name="country" value="<?php echo $_GET['m']; ?>"/></td>
                        <td><input type="submit" name="Submit" value="Submit" class="login" /></td>
                    </tr>
                </table>
            </form>&nbsp;&nbsp;

        </td>
    </tr>
</table>
