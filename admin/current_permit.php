<table>
<tr><td> Current Permit </td> 
<td>
 <select name="c_permit" id="c_permit">
                                <option value="">Select</option>

                                <option value=" Visitor's permit">11(1)(b)(i)</option>
                                <option value="Visitor's permit for 3 years for academic sabbaticals">11(1)(b)(ii)(aa)</option>
                                <option value="Visitor's permit for 3 years for voluntary or charitable activities">11(1)(b)(ii)(bb)</option>
                                <option value="Visitor's permit for 3 years for research">11(1)(b)(ii)(cc)</option>
                                <option value="Visitor's permit for 3 years for other prescribed activities � Accompany spouse / accompany parents by dependent children on a holder of a permit issued in terms of section 11, 13, 14, 15, 17, 19 or 22">11(1)(b)(ii)(dd))</option>
                                <option value="Visitor's Permit with Authorisation to conduct work ">11(2)</option>
                                <option value="Spouse/Life Partner to SAC">11(6)</option>
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
                                <option value="Corporate worker (authorization certificate to an individual of a corporate permit holder) ">21 read with sec 19(2) & reg 18(6)</option>
                                <option value="Exchange permit - cultural, economic or social exchange">22(a)</option>
                                <option value="Exchange permit - person under the age of 25 years who has received an offer to conduct work for no longer than one year">22(b)</option>
                                <option value="Permanent residence permit - five years continuous work permit status">26(a)</option>
                                <option value="Permanent residence permit - spouse of a citizen or residence for five years">26(b)</option>
                                <option value="Permanent residence permit - a child of a citizen or resident under the age of 21">26(c)</option>
                                <option value="Permanent residence permit - a child of a citizen">26(d)</option>
                                <option value="Permanent residence permit - offer of permanent employment � quota system">27(a)</option>
                                <option value="Permanent residence permit - extraordinary (exceptional) skills or qualifications">27(b)</option>
                                <option value="Permanent residence permit - intend to establish or has established a business">27(c)</option>
                                <option value="Permanent residence permit - five year continuous Refugee status">27(d)</option>
                                <option value="Permanent residence permit - retired">27(e)</option>
                                <option value="Permanent residence permit - minimum net worth of R7,5 million">27(f)</option>
                                <option value="Permanent residence permit - relative (brother, sister, parents, biological or judicially adopted children or adopted parents and step parents">27(g)</option>
                            </select>
</td>
</tr>
<tr><td> Current Permit Status</td>
 <td>
<select name="c_permit_status" id="c_permit">
                                <option value="">Select</option>
								<option value="Legal">Legal</option>
								<option value="Illegal">Illegal/Expired</option>
							    <option value="Condition / Contravention">Condition / Contravention</option>
								
		</select>
</td>
</tr>
<tr><td> Current Permit No</td> <td><input type="text" name="c_permit_no"  size="36"/></td>
</tr>
<script type="text/javascript">
                            /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                            var bas_cal,dp_cal,ms_cal;      
                            window.onclick = function () {
                                dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('expiry_date'));
                            };
                        </script>
<tr><td> Current Permit Expiry</td> <td><input type="text" name="c_permit_expiry"  size="36" id="expiry_date"/></td>
</tr>
<td valign="top">Current permit comment</td><td><textarea name="c_permit_comment" cols="28" rows="5"></textarea><td>
<tr>
</tr>
</table>