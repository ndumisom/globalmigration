<?
include_once("class.php");

$id = $_GET["id"];
$objConnect = mysql_connect("localhost", "root", "mapapa1531") or die(mysql_error());
$objDB = mysql_select_db("globalmigration_db");
$strSQL = "SELECT * FROM permit_applications WHERE permit_appID = '$id' ";
$objQuery = mysql_query($strSQL);
$row = mysql_fetch_array($objQuery) or die('
<form name="permit" action="add_permitapp.php" method="post" class="uniForm" onsubmit="return validatePermit()">
            
<table class="tab" width="100%" height="300" cellpadding="0" cellspacing="0" border="0" bordercolor="#0000FF"><tr><td align="center"><div style="color:#FF0000; font-weight:bolder;">         OOPS! THE PERSON WAS NOT FOUND </div> <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      <td>

         <p> &nbsp;</p>
</td>
    </tr>
    <tr>
      <td> Service</td>
      <td><input type="text" name="service"  /><input type="hidden" name="clientID" value="<? echo $id;?>"/></td>
    </tr>
    <tr>
      <td> Permit</td>
      <td><input type="text" name="permit" </td>
    </tr>
    <tr>
      <td> Permit Status </td>
      <td><input type="text" name="permit_status" /></td>
    </tr>
    <tr>
      <td> Permit No </td>
      <td><input type="text" name="permit_no" /></td>
    </tr>
    <tr>
      <td> Submission Office </td>
      <td><input type="text" name="submission_office" /></td>
    </tr>
    <tr>
      <td> Submission Date </td>
      <td><input type="text" name="submission_date" /></td>
    </tr>
    <tr>
      <td> Date Endorsed </td>
      <td><input type="text" name="date_endorsed" /></td>
    </tr>
    <tr>
      <td> Exipiry Date </td>
      <td><input type="text" name="expiry_date" /></td>
    </tr>
    <tr>
      <td> DHA Reference No </td>
      <td><input type="text" name="dha_refrence_no" /></td>
    </tr>
    <tr>
      <td> DHA Case No</td>
      <td><input type="text" name="dha_case_no"/></td>
    </tr>
    <tr>
      <td> Fee</td>
      <td><input type="text" name="fee" /></td>
    </tr>
    <tr>
      <td> Invoice No </td>
      <td><input type="text" name="invoice_no"/></td>
    </tr>
    <tr>
      <td> J Invoice No </td>
      <td><input type="text" name="j_invoice_no" /></td>
    </tr>
    <tr>
      <td> Comments</td>
      <td><d
          <textarea type="text" name="comments" ></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="button" value="< Back" onclick="goBack()" class="login"/><input type="submit" name="Submit" value="Edit" class="login" /></td>
    </tr>
  </table>
</form></td></tr></table>');
if (!$row) {
    echo '<table width="100%" height="300" cellpadding="0" cellspacing="0" border="1" bordercolor="#0000FF"><tr><td align="center"><div style="color:#FF0000; font-weight:bolder;">         OOPS! THE PERSON WAS NOT FOUND </div><br/><br/><input type="button" value="< Back" onclick="goBack()" class="login"/></td></tr></tsble>';
} else {
    ?>
    <style type="text/css">
        #list { height: 100px; overflow: auto; width: 300px; border: 1px solid #cccccc; background-color: white; }
        #list ul { list-style-type: none; margin: 0; padding: 0; overflow-x: hidden; }
        #list li { margin: 0; padding: 0;}

    </style>
    <table class="tab" width="100%" cellpadding="0" cellspacing="0" border="0" bordercolor="#0000FF">
        <tr>
            <td >
                <form name="permit" action="p_edit_permit.php" method="post" class="uniForm" onsubmit="return validateForm()">
                    <h3> <a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"><b>Permit Applications</b></a></h3>
                    <table width="50%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>&nbsp;</td>
                            <td>
    <?
    if (isset($_SESSION['msg'])) {
        echo '<span id="msg"><b>' . $_SESSION['msg'] . '</span></b>';
        unset($_SESSION['msg']);
    }
    if (isset($_SESSION['error'])) {
        echo '<span id="error"><b>' . $_SESSION['error'] . '</span></b/>';
        unset($_SESSION['error']);
    }
    ?>
                                <p> &nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"> Service</td>
                            <td><?
                                $service = $row['service'];
                                $read = explode(";", $service);

                                for ($i = 0; $i < count($read); $i++) {
                                    echo '<input type="checkbox" checked="yes" name="service[]" value="' . $read[$i] . '"/> ' . $read[$i] . ' <br/>';
                                }
                                ?> <input type="hidden" name="clientID" value="<? echo $id; ?>"/>

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
                                        <li>  <input type="checkbox" name="service[]" value="Legalisation"/>Legalisation</li>
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
                        </tr>
                        <tr>
                            <td> Permit</td>
                            <td><input type="text" name="permit" value="<? echo $row['permit']; ?>"/></td>
                        </tr>
                        <tr>
                            <td> Permit Status </td>
                            <td><input type="text" name="permit_status" value="<? echo $row['permit_status']; ?>"/></td>
                        </tr>

                        <tr>
                            <td> Pre-Submission Date </td>
                        <script type="text/javascript">
                      /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                      var bas_cal, dp_cal, ms_cal;
                      window.onmouseup = function() {
                          dp_cal = new Epoch('epoch_popup', 'popup', document.getElementById('pre_submission_date'));
                      };
                        </script>
                        <td><input type="text" name="pre_submission_date" value="<? echo $row['pre_submission_date']; ?>" id="pre_submission_date"/></td>
                        </tr>
                        <tr>
                            <td> Memo-Issue Date</td>
                        <script type="text/javascript">
                            /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                            var bas_cal, dp_cal, ms_cal;
                            window.onmousedown = function() {
                                dp_cal = new Epoch('epoch_popup', 'popup', document.getElementById('memo_issue_date'));
                            };
                        </script>
                        <td><input type="text" name="memo_issue_date" value="<? echo $row['memo_issue_date']; ?>" id="memo_issue_date"/></td>
                        </tr>
                        <tr>
                            <td> Permit No </td>
                            <td><input type="text" name="permit_no" value="<? echo $row['permit_no']; ?>"/></td>
                        </tr>
                        <tr>
                            <td> Submission Office </td>
                            <td><input type="text" name="submission_office" value="<? echo $row['submission_office']; ?>"/></td>
                        </tr>
                        <tr>
                            <td> Submission Date </td>
                        <script type="text/javascript">
                            /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                            var bas_cal, dp_cal, ms_cal;
                            window.onload = function() {
                                dp_cal = new Epoch('epoch_popup', 'popup', document.getElementById('submission_date'));
                            };
                        </script>
                        <td><input type="text" name="submission_date" value="<? echo $row['submission_date']; ?>" id="submission_date"/></td>
                        </tr>
                        <tr>
                            <td> Date Endorsed </td>
                        <script type="text/javascript">
                            /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                            var bas_cal, dp_cal, ms_cal;
                            window.onmouseover = function() {
                                dp_cal = new Epoch('epoch_popup', 'popup', document.getElementById('date_endorsed'));
                            };
                        </script>
                        <td><input type="text" name="date_endorsed" value="<? echo $row['date_endorsed']; ?>" id="date_endorsed"/></td>
                        </tr>
                        <tr>
                            <td> Expiry Date </td>
                        <script type="text/javascript">
                            /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                            var bas_cal, dp_cal, ms_cal;
                            window.onclick = function() {
                                dp_cal = new Epoch('epoch_popup', 'popup', document.getElementById('expiry_date'));
                            };
                        </script>
                        <td><input type="text" name="expiry_date" value="<? echo $row['expiry_date']; ?>" id="expiry_date"/></td>
                        </tr>
                        <tr>
                            <td> Processed By </td>
                            <td><input type="text" name="process_by" value="<? echo $row['process_by']; ?>"/></td>
                        </tr>
                        <tr>
                            <td> DHA Reference No </td>
                            <td><input type="text" name="dha_refrence_no" value="<? echo $row['dha_refrence_no']; ?>"/></td>
                        </tr>
                        <tr>
                            <td> DHA Case No</td>
                            <td><input type="text" name="dha_case_no" value="<? echo $row['dha_case_no']; ?>"/></td>
                        </tr>
                        <tr>
                            <td> Fee</td>
                            <td><input type="text" name="fee" value="<? echo $row['fee']; ?>"/></td>
                        </tr>
                        <tr>
                            <td> Invoice No </td>
                            <td><input type="text" name="invoice_no" value="<? echo $row['invoice_no']; ?>"/></td>
                        </tr>
                        <tr>
                            <td> J Invoice No </td>
                            <td><input type="text" name="j_invoice_no" value="<? echo $row['j_invoice_no']; ?>"/></td>
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
                            <td><input type="text" name="eligible_for_pr" id="eligible_for_pr" value="<? echo $row['eligible_for_pr']; ?>"/></td>
                        </tr>
                        <tr>
                            <td> Comments</td>
                            <td>
                                <textarea type="text" name="comments" ><? echo $row['comments']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="id" value="<? echo $row['clientID']; ?>"/></td>
                            <td><input type="button" value="< Back" onclick="goBack()" class="login"/><input type="submit" name="Submit" value="Edit" class="login" /></td>
                        </tr>
                    </table>
                </form>

            </td>
        </tr>
    </table>
<? } ?>
