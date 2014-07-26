<?php
session_start();
$id = $_GET['id'];
?>
<style type="text/css">
    #list { height: 100px; overflow: auto; width: 300px; border: 1px solid #cccccc; background-color: white; }
    #list ul { list-style-type: none; margin: 0; padding: 0; overflow-x: hidden; }
    #list li { margin: 0; padding: 0;}

</style>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0000FF" >
    <tr>
        <td>
            <form name="permit" action="add_new_permit.php" method="post" class="uniForm" onsubmit="return validatePermit()">
                <h3> <a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> New Permit Applications</a></h3>
                <table width="50%" border="0" cellspacing="3" cellpadding="0">
                    <tr>
                        <td colspan="2" align="center"> <div align="right"><?php
require_once 'add_client_details.php';
//$_SESSION['file_no']= trim($_POST['file_no']);
//$_SESSION['firstname'] = ucfirst(trim($_POST['firstnames']));


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
                    <tr>
                        <td>Client id</td>
                        <td><input type="text" name="clientID" value="<?php echo $id; ?>" size="36" disabled="disabled"/> <input type="hidden" name="clientID" value="<?php echo $id; ?>" /></td>
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
                                    <li>  <input type="checkbox" name="service[]" value="Request refund of overstay fine"/>Requestrefund of overstay fine</li>
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

                                <option value="Visitor's permit">11(1)(b)(i)</option>
                                <option value="Visitor's permit for 3 years for academic sabbaticals">11(1)(b)(ii)(aa)</option>
                                <option value="Visitor's permit for 3 years for voluntary or charitable activities">11(1)(b)(ii)(bb)</option>
                                <option value="Visitor's permit for 3 years for research">11(1)(b)(ii)(cc)</option>
                                <option value="Visitor's permit for 3 years for other prescribed activities Accompany spouse / accompany parents by dependent children on a holder of a permit issued in terms of section 11, 13, 14, 15, 17, 19 or 22">11(1)(b)(ii)(dd)</option>
                                <option value="Visitor's Permit with Authorisation to conduct work">11(2)</option>
                                <option value="Spouse/Life Partner to SAC">11(6)(a)</option>
                                <option value="Spouse/Life Partner to SAC/Work Authorization">11(6)(b)</option>
                                <option value="Study permit">13</option>
                                <option value="Treaty permit">14</option>
                                <option value="Business permit">15</option>
                                <option value="Medical permit">17</option>
                                <option value="Relative permit">18</option>
                                <option value="Quota work permit">19(1)</option>
                                <option value="General work permit">19(2) & (3)</option>
                                <option value="Exceptional skills work permit">19(4)</option>
                                <option value="Intra-company transfer work permit">19(5)</option>
                                <option value="Retired permit">20(1)</option>
                                <option value="Retired permit with permission to work">20(2)</option>
                                <option value="Corporate permit">21</option>
                                <option value="Corporate worker (authorization certificate to an individual of a corporate permit holder)">21 read with sec 19(2) & reg 18(6)</option>
                                <option value="Exchange permit - cultural, economic or social exchange">22(a)</option>
                                <option value="Exchange permit - person under the age of 25 years who has received an offer to conduct work for no longer than one year">22(b)</option>
                                <option value="Permanent residence permit - five years continuous work permit status">26(a)</option>
                                <option value="Permanent residence permit - spouse of a citizen or residence for five years">26(b)</option>
                                <option value="Permanent residence permit - a child of a citizen or resident under the age of 21">26(c)</option>
                                <option value="Permanent residence permit - a child of a citizen">26(d)</option>
                                <option value="Permanent residence permit - offer of permanent employment quota system">27(a)</option>
                                <option value="Permanent residence permit - extraordinary (exceptional) skills or qualifications">27(b)</option>
                                <option value="Permanent residence permit - intend to establish or has established a business">27(c)</option>
                                <option value="Permanent residence permit - five year continuous Refugee status">27(d)</option>
                                <option value="Permanent residence permit - retired">27(e)</option>
                                <option value="Permanent residence permit - minimum net worth of R7,5 million">27(f)</option>
                                <option value="Permanent residence permit - relative (brother, sister, parents, biological or judicially adopted children or adopted parents and step parents">27(g)</option>
                                <option value="Transfer of permit">Transfer of permit</option>
				<option value="19(1) compliance letter">19(1) compliance letter</option>
				<option value="19(3) Compliance">19(3) Compliance</option>
				<option value="Police clearance">Police clearance</option>
                                <option value="Proof of audited financial records">Proof of audited financial records</option>
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
                                <option value="Endorsed Received">Endorsed Received</option>
                                <option value="Urgent">Urgent</option>
                                <option value="Memo issued - Awaiting Documents">Memo issued - Awaiting Documents</option>
                                <option value="File Closed">File Closed</option>
                                <option value="Reactivate file">Reactivate file</option>
                                <option value="Current Valid TRP">Current Valid TRP</option>
                                <option value="Finalised - Awaiting Copy of Permit">Finalised - Awaiting Copy of Permit</option>
                                <option value="Finalised awaiting permit from DHA">Finalised awaiting permit from DHA</option>
                                <option value="Finalised awaiting permit from client">Finalised awaiting permit from client</option>
                                <option value="Waivers Pending">Waivers Pending</option>
                                <option value="Waivers Pending">Waivers Requested</option>
                                <option value="Waivers Pending">Waivers Received</option>
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
                                <option value="Request for rectification of incorrect endorsement">Request for rectification of incorrect endorsement</option>
                                <option value="Submitted to DHA">Submitted to DHA</option>
                                <option value="Departed RSA">Departed RSA</option>
                                <option value="Approved, waiting for passports">Approved, waiting for passports</option>
                                <option value="South African Citizen">South African Citizen</option>
                                <option value="TRP Refused">TRP Refused</option>
                                <option value="Memo issued- Transfer of permit to new passport">Memo issued- Transfer of permit to new passport</option>
                                <option value="Refused">Refused</option>
                                <option value="Review Submitted">Review Submitted</option>
                                <option value="Documents Received">Documents Received (1)</option>
                                <option value="Documents Received">Documents Received (2)</option>
                                <option value="Documents Received">Documents Received (3)</option>
                                <option value="Documents Received">Documents Received (4)</option>
                                <option value="Documents Received">Documents Received (5)</option>
                                <option value="Documents Received">Documents Received (6)</option>
                                <option value="Balance of documents received1">Balance of documents received1</option>
                                <option value="Balance of documents recieved2">Balance of documents recieved2</option>
                                <option value="Balance of documents recieved3">Balance of documents recieved3</option>
                                <option value="Incorrect Endorsement">Incorrect Endorsement</option>
                                <option value="Finalised"> Finalised </option>
                                <option value="Form2 received">Form2 received</option>

                            </select>


                        </td>
                    </tr>
                    <tr>
                        <td>Pre-Submission Date </td>
                    <script type="text/javascript">
                        /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                        var bas_cal,dp_cal,ms_cal;      
                        window.onmouseup = function () {
                            dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('pre_submission_date'));
                        };
                    </script>
                    <td><input type="text" name="pre_submission_date" size="36" id="pre_submission_date"/></td>
                    </tr>
                     <tr>
                        <td>Memo-Issue Date </td>
                    <script type="text/javascript">
                        /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                        var bas_cal,dp_cal,ms_cal;      
                        window.onmousedown = function () {
                            dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('memo_issue_date'));
                        };
                    </script>
                    <td><input type="text" name="memo_issue_date" size="36" id="memo_issue_date"/></td>
                    </tr>
                    <tr>
                        <td>Permit No </td>
                        <td><input type="text" name="permit_no" size="36"/></td>
                    </tr>
                    <tr>
                        <td>Submission Office </td>
                        <td><input type="text" name="submission_office" size="36"/></td>
                    </tr>
                    <tr>
                        <td>Submission Date </td>
                    <script type="text/javascript">
                        /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                        var bas_cal,dp_cal,ms_cal;      
                        window.onload = function () {
                            dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('submission_date'));
                        };
                    </script>
                    <td><input type="text" name="submission_date" size="36" id="submission_date"/></td>
                    </tr>
                    <tr>
                        <td>Date Endorsed </td>
                    <script type="text/javascript">
                        /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                        var bas_cal,dp_cal,ms_cal;      
                        window.onmouseover = function () {
                            dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('date_endorsed'));
                        };
                    </script>
                    <td><input type="text" name="date_endorsed" size="36" id="date_endorsed"/></td>
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
                        <td>Processed By </td>
                        <td><input type="text" name="process_by" size="36"/></td>
                    </tr>
                    <tr>
                        <td>DHA Reference No </td>
                        <td><input type="text" name="dha_reference" size="36"/></td>
                    </tr>
                    <tr>
                        <td>DHA Case No</td>
                        <td><input type="text" name="dha_case_no" size="36"/></td>
                    </tr>
                    <tr>
                        <td>Fee</td>
                        <td><input type="text" name="fee" size="36"/></td>
                    </tr>
                    <tr>
                        <td>Invoice No </td>
                        <td><input type="text" name="invoice_no" size="36"/></td>
                    </tr>
                    <tr>
                        <td>J Invoice No </td>
                        <td><input type="text" name="j_invoice_no" size="36"/></td>
                    </tr>
                    <tr>
                        <td>Eligible for PR </td>
                         <script type="text/javascript">
                        /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                        var bas_cal,dp_cal,ms_cal;      
                        window.onmouseup = function () {
                            dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('eligible_for_pr'));
                        };
                    </script>
                        <td><input type="text" name="eligible_for_pr" id="eligible_for_pr" size="36"/></td>
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
                        <td><input type="button" value="< Back" onclick="goBack()" class="login"/> <input type="submit" name="Submit" value="Submit" class="login" /></td>
                    </tr>
                </table>
            </form>&nbsp;&nbsp;

        </td>
    </tr>
</table>
