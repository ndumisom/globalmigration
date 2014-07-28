<style type="text/css">
.button4 {
	-webkit-box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	background-color:#0000FF; 
	border-radius:0;
	-webkit-border-radius:0;
	-moz-border-radius:0;
	border:1px solid #999;
	color:#FFF;
	font-family:'Lucida Grande',Tahoma,Verdana,Arial,Sans-serif;
	font-size:12px;
	font-weight:700;
	padding:2px 6px;
	height:28px
}

</style>
<script language="javascript">
$('.target').change(function() {
  $('#p_fees').val($('option:selected').attr('p_fees'));
       $('#dha_fees').val($('option:selected').attr('dha_fees'));
});


</script>


<center><span id="clear"><p><?php

include_once 'class.php';
$call = new globalm;

                        if (isset($_SESSION['message'])) {
                            echo '<span id="msg">' . $_SESSION['message'] . '</span>';
                            unset($_SESSION['message']);
                        }
                        if (isset($_SESSION['error'])) {
                            echo '<span id="error">' . $_SESSION['error'] . '</span>';
                            unset($_SESSION['error']);
                        }
                        ?></p></span></center>
						&nbsp; &nbsp; &nbsp; <a class="button4" href="index.php?m=list_quote"> View quotes</a>
						
<form name="quotes" action="p_quotes.php" method="post" onsubmit="return validate_quote();">
      <table border="0" width="750" cellspacing="1" cellpadding="3" 
       bgcolor="#353535" align="center">
	   <tr>
	   <td bgcolor="#FFFFFF" width="144" ><strong>First Name</strong></td>
            <td bgcolor="#FFFFFF" width="144" ><input type="text" name="f_name" id="f_name" autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><strong>Surname</strong></td>
            <td bgcolor="#FFFFFF" width="144"><input type="text" name="surname" id="surname" autocomplete="off"/></td>
	   </tr>
        <tr>
            <td  align="left" valign="top" bgcolor="#FFFFFF" ><strong>To: 
                </strong>&nbsp;&nbsp;&nbsp;<textarea rows="5" cols="20" name="address_to"></textarea></td>
            <td width="144" colspan=1 align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="144" colspan=1 valign="top" bgcolor="#FFFFFF"><br/>
                <strong>Quote No </strong><br/><br/><strong>Invoice No </strong><br/> <br/>               <strong>Date</strong><br/><br/> 
                <strong>Email</strong></td>
            <td width="144" colspan=1 valign="top" bgcolor="#FFFFFF">
			  
			    <p><input type="text" name="quote_no" id="quote_no" value="<?echo $call->quote_no();?>" autocomplete="off"/> </p>
			
		        <p><input type="text" name="invoice_no" id="invoice_no" autocomplete="off"/> </p>
			    
		        <p><input type="text" name="date" id="quote_date" autocomplete="off"/></p>
		      
		        <script type="text/javascript">
                        /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                        var bas_cal,dp_cal,ms_cal;      
                        window.onload = function () {
                            dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('quote_date'));
                        };
                    </script>
                <input type="text" name="email_to" id="email" autocomplete="off"/>
	        
		  </td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" colspan=4 align="center">&nbsp;</td>
        </tr>
        <tr>	
 

            <td width="144" valign="top" bgcolor="#FFFFFF" ><strong>Consultant</strong></td>
            <td width="144" valign="top" bgcolor="#FFFFFF" ><strong>Service</strong></td>
            <td width="144" valign="top" bgcolor="#FFFFFF"><strong>Payment Terms </strong></td>
            <td bgcolor="#FFFFFF" width="144">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" width="144" >
                  <select name="consultant" id="consultant">
                                <option value="">   Select    </option>  
                                <option value="Elsa">Elsa Van Loggerenberg</option>
                                <option value="Kabelo">Kabelo</option>
                                <option value="Keith">Keith Lykert</option>
                                <option value="Eldorette">Eldorette Isaacson</option>
                                <option value="Kim ">Kim Van Niekerk</option>
                                <option value="Lisa">Lisa Haggard</option>
                                <option value="Elissa">Elissa Davie</option>
                                <option value="Leon ">Leon Isaacson</option>
                           </select>            </td>
            <td bgcolor="#FFFFFF" width="144" ><input type="text" name="service" id="service" autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><input type="text" name="payment_terms" id="payment_terms" autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144">&nbsp;</td>
        </tr>
        <tr>
            <td width="144" valign="top" bgcolor="#FFFFFF" ><strong>Description</strong></td>
            <td width="144" valign="top" bgcolor="#FFFFFF" ><strong>Professional fees </strong></td>
            <td width="144" valign="top" bgcolor="#FFFFFF"><strong>SAQA/DHA Fees </strong></td>
            <td width="144" valign="top" bgcolor="#FFFFFF"><strong>Line Total </strong></td>
        </tr>
       
        <tr>
            <td bgcolor="#FFFFFF" width="144" >
                <select name="description[]" id="description" class="tagert">
                                <option  value="">Select</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit extension for max 3 months">Visitor's permit extension for max 3 months</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for academic sabbaticals">Visitor's permit for 3 years for academic sabbaticals</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for voluntary or charitable activities">Visitor's permit for 3 years for voluntary or charitable activities</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for research">Visitor's permit for 3 years for research</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for other prescribed activities - Accompany spouse / accompany parents by dependent children on a holder of a permit issued in terms of section 11, 13, 14, 15, 17, 19 or 22">Visitor's permit for 3 years for other prescribed activities</option>
                                <option p_fees="4200.00" dha_fees='0.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
                                <option p_fees="4200.00" dha_fees='425.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC">Spouse/ Life Partner to SAC</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC + work authorisation">Spouse/ Life Partner to SAC + work authorisation</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Add work Spouse/ Life Partner to SAC">Add work Spouse/ Life Partner to SAC</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse / Life Partner Extension">Spouse / Life Partner Extension</option>
                                <option p_fees="3000.00" dha_fees='425.00' value="Study permit">Study permit</option>
                                <option p_fees="3000.00" dha_fees='425.00' value="Study permit Extension / Change of Institution">Study permit Extension / Change of Institution</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Relative permit">Relative permit</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Relative permit Extension">Relative permit Extension</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Quota work permit">Quota work permit</option>
                                <option p_fees="7000.00" dha_fees='1520.00' value="Quota work permit : Change of Employer">Quota work permit : Change of Employer</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General work permit">General work permit</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (existing client)">General Work Permit Extension (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit : Change of Employer">General Work Permit : Change of Employer</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (new client)">General Work Permit Extension (new client)</option>
                                <option p_fees="8000.00" dha_fees='0.00' value="Certification of continued employment">Certification of continued employment</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills work permit">Exceptional Skills work permit</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extension (existing client)">Exceptional Skills permit Extension (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extention (new client)">Exceptional Skills permit Extention (new client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Intra-company transfer work permit">Intra-company transfer work permit</option>
                                <option p_fees="9000.00" dha_fees='425.00' value="Retired permit (per passport)">Retired permit (per passport)</option>
                                <option p_fees="9000.00" dha_fees='425.00' value="Retired permit with permission to work">Retired permit with permission to work</option>
                                <option p_fees="30000.00" dha_fees='1520.00' value="Corporate permit">Corporate permit</option>
                                <option p_fees="7500.00" dha_fees='0.00' value="Corporate worker (authorization certificate to an individual of a corporate permit holder)">Corporate worker </option>
                                <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - cultural, economic or social exchange">Exchange permit - cultural, economic or social exchange</option>
                                <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - person under the age of 25 years who has received an offer to conduct work for no longer than one year">Exchange permit - person under the age of 25 </option>
                                <option p_fees="6000.00" dha_fees='3000.00' value="Legalisation: 1-3 months">Legalisation: 1-3 months</option>
                                <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 3-12 months (court appearance)">Legalisation: 3-12 months (court appearance)</option>
                                <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 1 year and longer (court appearance)">Legalisation: 1 year and longer (court appearance)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - five years continuous work permit status">PR - five years continuous work permit status</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - spouse of a citizen or residence for five years">PR - spouse of a citizen or residence for five years</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen or resident under the age of 21">PR - a child of a citizen or resident under the age of 21</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen">PR - a child of a citizen</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - offer of permanent employment - quota system">PR - offer of permanent employment - quota system</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - exceptional skills or qualifications">PR - exceptional skills or qualifications</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (existing client)">PR- intend to establish or has established a business (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (new client)">PR- intend to establish or has established a business (new client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - five year continuous Refugee status">PR - five year continuous Refugee status</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (Simultaneous with TRP)">PR - Retired (Simultaneous with TRP)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (news couple)">PR - Retired (new couple)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - minimum net worth of R7,5 million">PR - minimum net worth of R7,5 million</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - relative (brother, sister, parents, biological or judicially adopted children or adopted parents and step parents)">PR - relative</option>
                                <option p_fees="600.00" dha_fees='0.00' value="Handling Fee (per Passport-holder)">Handling Fee (per Passport-holder)</option>
                                <option p_fees="1800.00" dha_fees='840.00' value="SAQA">SAQA</option>
                                <option p_fees="200.00" dha_fees='0.00' value="Translation: actual costs from Translator">Translation: actual costs from Translator</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Advert: General Work Permit application">Advert: General Work Permit application</option>
                                <option p_fees="2000.00" dha_fees='0.00' value="Salary Benchmarking">Salary Benchmarking</option>
                                <option p_fees="1300.00" dha_fees='0.00' value="Dept. of Labour">Dept. of Labour</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Chartered Accountant Certificate">Chartered Accountant Certificate</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Other services upon request of client eg.expedite">Other services upon request of client eg.expedite</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Variations requested by client eg.modify application">Variations requested by client eg.modify application</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Urgent applications - Within Good Cause period">Urgent applications - Within Good Cause period</option>
                                <option p_fees="4000.00" dha_fees='0.00' value="Urgent applications - 7 to 0 days to Expiry Date">Urgent applications - 7 to 0 days to Expiry Date</option>
                                <option p_fees="500.00" dha_fees='0.00' value="Callout fees - Port of Entry / Housecall / SAPS / other + KM's at AA rate (Min R3000.00)">Callout fees</option>
                                <option p_fees="2200.00" dha_fees='0.00' value="PR applications: Attendance at Interview/s">PR applications: Attendance at Interview/s</option>
                                <option p_fees="1883.20" dha_fees='75.00' value="Birth and Marriage (Price includes DHA fee, courier and handling fee)">Birth and Marriage (Price includes DHA fee, courier and handling fee)</option>
                                <option p_fees="880.00" dha_fees='0.00' value="Immigration Audit workR 880 per person (staffmember) per hour+travel costs">Immigration Audit work</option>
                                <option p_fees="1000.00" dha_fees='0.00' value="Training courses R1000 per person per half day, R1800 per full day Excludes travel, venue and meals for all involved- client to provide">Training courses</option>
                                <option p_fees="1200.00" dha_fees='0.00' value="Development of training and information manuals, documentation R800 -1200 per hour , excludes printing and shipping">Development of training and information manuals, documentation</option>
                                <option p_fees="5000.00" dha_fees='0.00' value="Web based database access (GMIMS) to verify permit status R 5000 per month unlimited numbers of staff members accessing (by password)">Web based database access (GMIMS) to verify permit status</option>
                </select>                </td>
            <td bgcolor="#FFFFFF" width="144" ><b>R</b><input type="text" name="professional_fees[]"  class="p_fees" id="p_fees" size='15' value="0" autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="saqa_dha_fees[]" class="dha_fees" id="dha_fees" size='15' value="0" autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="line_total[]" id="line_total" class="amount" size='15' value="0" autocomplete="off"/></td>
        </tr>
         <tr>
            <td bgcolor="#FFFFFF" width="144" >
                <select name="description[]" id="description" class="tagert">
                                <option  value="">Select</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit extension for max 3 months">Visitor's permit extension for max 3 months</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for academic sabbaticals">Visitor's permit for 3 years for academic sabbaticals</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for voluntary or charitable activities">Visitor's permit for 3 years for voluntary or charitable activities</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for research">Visitor's permit for 3 years for research</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for other prescribed activities - Accompany spouse / accompany parents by dependent children on a holder of a permit issued in terms of section 11, 13, 14, 15, 17, 19 or 22">Visitor's permit for 3 years for other prescribed activities</option>
                                <option p_fees="4200.00" dha_fees='0.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
                                <option p_fees="4200.00" dha_fees='425.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC">Spouse/ Life Partner to SAC</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC + work authorisation">Spouse/ Life Partner to SAC + work authorisation</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Add work Spouse/ Life Partner to SAC">Add work Spouse/ Life Partner to SAC</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse / Life Partner Extension">Spouse / Life Partner Extension</option>
                                <option p_fees="3000.00" dha_fees='425.00' value="Study permit">Study permit</option>
                                <option p_fees="3000.00" dha_fees='425.00' value="Study permit Extension / Change of Institution">Study permit Extension / Change of Institution</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Relative permit">Relative permit</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Relative permit Extension">Relative permit Extension</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Quota work permit">Quota work permit</option>
                                <option p_fees="7000.00" dha_fees='1520.00' value="Quota work permit : Change of Employer">Quota work permit : Change of Employer</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General work permit">General work permit</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (existing client)">General Work Permit Extension (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit : Change of Employer">General Work Permit : Change of Employer</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (new client)">General Work Permit Extension (new client)</option>
                                <option p_fees="8000.00" dha_fees='0.00' value="Certification of continued employment">Certification of continued employment</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills work permit">Exceptional Skills work permit</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extension (existing client)">Exceptional Skills permit Extension (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extention (new client)">Exceptional Skills permit Extention (new client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Intra-company transfer work permit">Intra-company transfer work permit</option>
                                <option p_fees="9000.00" dha_fees='425.00' value="Retired permit (per passport)">Retired permit (per passport)</option>
                                <option p_fees="9000.00" dha_fees='425.00' value="Retired permit with permission to work">Retired permit with permission to work</option>
                                <option p_fees="30000.00" dha_fees='1520.00' value="Corporate permit">Corporate permit</option>
                                <option p_fees="7500.00" dha_fees='0.00' value="Corporate worker (authorization certificate to an individual of a corporate permit holder)">Corporate worker </option>
                                <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - cultural, economic or social exchange">Exchange permit - cultural, economic or social exchange</option>
                                <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - person under the age of 25 years who has received an offer to conduct work for no longer than one year">Exchange permit - person under the age of 25 </option>
                                <option p_fees="6000.00" dha_fees='3000.00' value="Legalisation: 1-3 months">Legalisation: 1-3 months</option>
                                <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 3-12 months (court appearance)">Legalisation: 3-12 months (court appearance)</option>
                                <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 1 year and longer (court appearance)">Legalisation: 1 year and longer (court appearance)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - five years continuous work permit status">PR - five years continuous work permit status</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - spouse of a citizen or residence for five years">PR - spouse of a citizen or residence for five years</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen or resident under the age of 21">PR - a child of a citizen or resident under the age of 21</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen">PR - a child of a citizen</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - offer of permanent employment - quota system">PR - offer of permanent employment - quota system</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - exceptional skills or qualifications">PR - exceptional skills or qualifications</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (existing client)">PR- intend to establish or has established a business (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (new client)">PR- intend to establish or has established a business (new client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - five year continuous Refugee status">PR - five year continuous Refugee status</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (Simultaneous with TRP)">PR - Retired (Simultaneous with TRP)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (news couple)">PR - Retired (new couple)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - minimum net worth of R7,5 million">PR - minimum net worth of R7,5 million</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - relative (brother, sister, parents, biological or judicially adopted children or adopted parents and step parents)">PR - relative</option>
                                <option p_fees="600.00" dha_fees='0.00' value="Handling Fee (per Passport-holder)">Handling Fee (per Passport-holder)</option>
                                <option p_fees="1800.00" dha_fees='840.00' value="SAQA">SAQA</option>
                                <option p_fees="200.00" dha_fees='0.00' value="Translation: actual costs from Translator">Translation: actual costs from Translator</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Advert: General Work Permit application">Advert: General Work Permit application</option>
                                <option p_fees="2000.00" dha_fees='0.00' value="Salary Benchmarking">Salary Benchmarking</option>
                                <option p_fees="1300.00" dha_fees='0.00' value="Dept. of Labour">Dept. of Labour</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Chartered Accountant Certificate">Chartered Accountant Certificate</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Other services upon request of client eg.expedite">Other services upon request of client eg.expedite</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Variations requested by client eg.modify application">Variations requested by client eg.modify application</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Urgent applications - Within Good Cause period">Urgent applications - Within Good Cause period</option>
                                <option p_fees="4000.00" dha_fees='0.00' value="Urgent applications - 7 to 0 days to Expiry Date">Urgent applications - 7 to 0 days to Expiry Date</option>
                                <option p_fees="500.00" dha_fees='0.00' value="Callout fees - Port of Entry / Housecall / SAPS / other + KM's at AA rate (Min R3000.00)">Callout fees</option>
                                <option p_fees="2200.00" dha_fees='0.00' value="PR applications: Attendance at Interview/s">PR applications: Attendance at Interview/s</option>
                                <option p_fees="1883.20" dha_fees='75.00' value="Birth and Marriage (Price includes DHA fee, courier and handling fee)">Birth and Marriage (Price includes DHA fee, courier and handling fee)</option>
                                <option p_fees="880.00" dha_fees='0.00' value="Immigration Audit workR 880 per person (staffmember) per hour+travel costs">Immigration Audit work</option>
                                <option p_fees="1000.00" dha_fees='0.00' value="Training courses R1000 per person per half day, R1800 per full day Excludes travel, venue and meals for all involved- client to provide">Training courses</option>
                                <option p_fees="1200.00" dha_fees='0.00' value="Development of training and information manuals, documentation R800 -1200 per hour , excludes printing and shipping">Development of training and information manuals, documentation</option>
                                <option p_fees="5000.00" dha_fees='0.00' value="Web based database access (GMIMS) to verify permit status R 5000 per month unlimited numbers of staff members accessing (by password)">Web based database access (GMIMS) to verify permit status</option>
                </select>                </td>
            <td bgcolor="#FFFFFF" width="144" ><b>R</b><input type="text" name="professional_fees[]"  class="p_fees" id="p_fees" size='15' value="0" autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="saqa_dha_fees[]" class="dha_fees" id="dha_fees" size='15' value="0"  autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="line_total[]" id="line_total" class="amount" size='15' value="0" autocomplete="off"/></td>
        </tr> <tr>
            <td bgcolor="#FFFFFF" width="144" >
                <select name="description[]" id="description" class="tagert">
                                <option  value="">Select</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit extension for max 3 months">Visitor's permit extension for max 3 months</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for academic sabbaticals">Visitor's permit for 3 years for academic sabbaticals</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for voluntary or charitable activities">Visitor's permit for 3 years for voluntary or charitable activities</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for research">Visitor's permit for 3 years for research</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for other prescribed activities - Accompany spouse / accompany parents by dependent children on a holder of a permit issued in terms of section 11, 13, 14, 15, 17, 19 or 22">Visitor's permit for 3 years for other prescribed activities</option>
                                <option p_fees="4200.00" dha_fees='0.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
                                <option p_fees="4200.00" dha_fees='425.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC">Spouse/ Life Partner to SAC</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC + work authorisation">Spouse/ Life Partner to SAC + work authorisation</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Add work Spouse/ Life Partner to SAC">Add work Spouse/ Life Partner to SAC</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse / Life Partner Extension">Spouse / Life Partner Extension</option>
                                <option p_fees="3000.00" dha_fees='425.00' value="Study permit">Study permit</option>
                                <option p_fees="3000.00" dha_fees='425.00' value="Study permit Extension / Change of Institution">Study permit Extension / Change of Institution</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Relative permit">Relative permit</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Relative permit Extension">Relative permit Extension</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Quota work permit">Quota work permit</option>
                                <option p_fees="7000.00" dha_fees='1520.00' value="Quota work permit : Change of Employer">Quota work permit : Change of Employer</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General work permit">General work permit</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (existing client)">General Work Permit Extension (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit : Change of Employer">General Work Permit : Change of Employer</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (new client)">General Work Permit Extension (new client)</option>
                                <option p_fees="8000.00" dha_fees='0.00' value="Certification of continued employment">Certification of continued employment</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills work permit">Exceptional Skills work permit</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extension (existing client)">Exceptional Skills permit Extension (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extention (new client)">Exceptional Skills permit Extention (new client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Intra-company transfer work permit">Intra-company transfer work permit</option>
                                <option p_fees="9000.00" dha_fees='425.00' value="Retired permit (per passport)">Retired permit (per passport)</option>
                                <option p_fees="9000.00" dha_fees='425.00' value="Retired permit with permission to work">Retired permit with permission to work</option>
                                <option p_fees="30000.00" dha_fees='1520.00' value="Corporate permit">Corporate permit</option>
                                <option p_fees="7500.00" dha_fees='0.00' value="Corporate worker (authorization certificate to an individual of a corporate permit holder)">Corporate worker </option>
                                <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - cultural, economic or social exchange">Exchange permit - cultural, economic or social exchange</option>
                                <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - person under the age of 25 years who has received an offer to conduct work for no longer than one year">Exchange permit - person under the age of 25 </option>
                                <option p_fees="6000.00" dha_fees='3000.00' value="Legalisation: 1-3 months">Legalisation: 1-3 months</option>
                                <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 3-12 months (court appearance)">Legalisation: 3-12 months (court appearance)</option>
                                <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 1 year and longer (court appearance)">Legalisation: 1 year and longer (court appearance)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - five years continuous work permit status">PR - five years continuous work permit status</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - spouse of a citizen or residence for five years">PR - spouse of a citizen or residence for five years</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen or resident under the age of 21">PR - a child of a citizen or resident under the age of 21</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen">PR - a child of a citizen</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - offer of permanent employment - quota system">PR - offer of permanent employment - quota system</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - exceptional skills or qualifications">PR - exceptional skills or qualifications</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (existing client)">PR- intend to establish or has established a business (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (new client)">PR- intend to establish or has established a business (new client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - five year continuous Refugee status">PR - five year continuous Refugee status</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (Simultaneous with TRP)">PR - Retired (Simultaneous with TRP)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (news couple)">PR - Retired (new couple)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - minimum net worth of R7,5 million">PR - minimum net worth of R7,5 million</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - relative (brother, sister, parents, biological or judicially adopted children or adopted parents and step parents)">PR - relative</option>
                                <option p_fees="600.00" dha_fees='0.00' value="Handling Fee (per Passport-holder)">Handling Fee (per Passport-holder)</option>
                                <option p_fees="1800.00" dha_fees='840.00' value="SAQA">SAQA</option>
                                <option p_fees="200.00" dha_fees='0.00' value="Translation: actual costs from Translator">Translation: actual costs from Translator</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Advert: General Work Permit application">Advert: General Work Permit application</option>
                                <option p_fees="2000.00" dha_fees='0.00' value="Salary Benchmarking">Salary Benchmarking</option>
                                <option p_fees="1300.00" dha_fees='0.00' value="Dept. of Labour">Dept. of Labour</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Chartered Accountant Certificate">Chartered Accountant Certificate</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Other services upon request of client eg.expedite">Other services upon request of client eg.expedite</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Variations requested by client eg.modify application">Variations requested by client eg.modify application</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Urgent applications - Within Good Cause period">Urgent applications - Within Good Cause period</option>
                                <option p_fees="4000.00" dha_fees='0.00' value="Urgent applications - 7 to 0 days to Expiry Date">Urgent applications - 7 to 0 days to Expiry Date</option>
                                <option p_fees="500.00" dha_fees='0.00' value="Callout fees - Port of Entry / Housecall / SAPS / other + KM's at AA rate (Min R3000.00)">Callout fees</option>
                                <option p_fees="2200.00" dha_fees='0.00' value="PR applications: Attendance at Interview/s">PR applications: Attendance at Interview/s</option>
                                <option p_fees="1883.20" dha_fees='75.00' value="Birth and Marriage (Price includes DHA fee, courier and handling fee)">Birth and Marriage (Price includes DHA fee, courier and handling fee)</option>
                                <option p_fees="880.00" dha_fees='0.00' value="Immigration Audit workR 880 per person (staffmember) per hour+travel costs">Immigration Audit work</option>
                                <option p_fees="1000.00" dha_fees='0.00' value="Training courses R1000 per person per half day, R1800 per full day Excludes travel, venue and meals for all involved- client to provide">Training courses</option>
                                <option p_fees="1200.00" dha_fees='0.00' value="Development of training and information manuals, documentation R800 -1200 per hour , excludes printing and shipping">Development of training and information manuals, documentation</option>
                                <option p_fees="5000.00" dha_fees='0.00' value="Web based database access (GMIMS) to verify permit status R 5000 per month unlimited numbers of staff members accessing (by password)">Web based database access (GMIMS) to verify permit status</option>
                </select>                </td>
            <td bgcolor="#FFFFFF" width="144" ><b>R</b><input type="text" name="professional_fees[]"  class="p_fees" id="p_fees" size='15' value="0"  autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="saqa_dha_fees[]" class="dha_fees" id="dha_fees" size='15' value="0"  autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="line_total[]" id="line_total" class="amount" size='15' value="0" autocomplete="off"/></td>
        </tr> <tr>
            <td bgcolor="#FFFFFF" width="144" >
                <select name="description[]" id="description" class="tagert">
                                <option  value="">Select</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit extension for max 3 months">Visitor's permit extension for max 3 months</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for academic sabbaticals">Visitor's permit for 3 years for academic sabbaticals</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for voluntary or charitable activities">Visitor's permit for 3 years for voluntary or charitable activities</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for research">Visitor's permit for 3 years for research</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for other prescribed activities - Accompany spouse / accompany parents by dependent children on a holder of a permit issued in terms of section 11, 13, 14, 15, 17, 19 or 22">Visitor's permit for 3 years for other prescribed activities</option>
                                <option p_fees="4200.00" dha_fees='0.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
                                <option p_fees="4200.00" dha_fees='425.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC">Spouse/ Life Partner to SAC</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC + work authorisation">Spouse/ Life Partner to SAC + work authorisation</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Add work Spouse/ Life Partner to SAC">Add work Spouse/ Life Partner to SAC</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse / Life Partner Extension">Spouse / Life Partner Extension</option>
                                <option p_fees="3000.00" dha_fees='425.00' value="Study permit">Study permit</option>
                                <option p_fees="3000.00" dha_fees='425.00' value="Study permit Extension / Change of Institution">Study permit Extension / Change of Institution</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Relative permit">Relative permit</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Relative permit Extension">Relative permit Extension</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Quota work permit">Quota work permit</option>
                                <option p_fees="7000.00" dha_fees='1520.00' value="Quota work permit : Change of Employer">Quota work permit : Change of Employer</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General work permit">General work permit</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (existing client)">General Work Permit Extension (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit : Change of Employer">General Work Permit : Change of Employer</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (new client)">General Work Permit Extension (new client)</option>
                                <option p_fees="8000.00" dha_fees='0.00' value="Certification of continued employment">Certification of continued employment</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills work permit">Exceptional Skills work permit</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extension (existing client)">Exceptional Skills permit Extension (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extention (new client)">Exceptional Skills permit Extention (new client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Intra-company transfer work permit">Intra-company transfer work permit</option>
                                <option p_fees="9000.00" dha_fees='425.00' value="Retired permit (per passport)">Retired permit (per passport)</option>
                                <option p_fees="9000.00" dha_fees='425.00' value="Retired permit with permission to work">Retired permit with permission to work</option>
                                <option p_fees="30000.00" dha_fees='1520.00' value="Corporate permit">Corporate permit</option>
                                <option p_fees="7500.00" dha_fees='0.00' value="Corporate worker (authorization certificate to an individual of a corporate permit holder)">Corporate worker </option>
                                <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - cultural, economic or social exchange">Exchange permit - cultural, economic or social exchange</option>
                                <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - person under the age of 25 years who has received an offer to conduct work for no longer than one year">Exchange permit - person under the age of 25 </option>
                                <option p_fees="6000.00" dha_fees='3000.00' value="Legalisation: 1-3 months">Legalisation: 1-3 months</option>
                                <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 3-12 months (court appearance)">Legalisation: 3-12 months (court appearance)</option>
                                <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 1 year and longer (court appearance)">Legalisation: 1 year and longer (court appearance)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - five years continuous work permit status">PR - five years continuous work permit status</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - spouse of a citizen or residence for five years">PR - spouse of a citizen or residence for five years</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen or resident under the age of 21">PR - a child of a citizen or resident under the age of 21</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen">PR - a child of a citizen</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - offer of permanent employment - quota system">PR - offer of permanent employment - quota system</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - exceptional skills or qualifications">PR - exceptional skills or qualifications</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (existing client)">PR- intend to establish or has established a business (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (new client)">PR- intend to establish or has established a business (new client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - five year continuous Refugee status">PR - five year continuous Refugee status</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (Simultaneous with TRP)">PR - Retired (Simultaneous with TRP)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (news couple)">PR - Retired (new couple)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - minimum net worth of R7,5 million">PR - minimum net worth of R7,5 million</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - relative (brother, sister, parents, biological or judicially adopted children or adopted parents and step parents)">PR - relative</option>
                                <option p_fees="600.00" dha_fees='0.00' value="Handling Fee (per Passport-holder)">Handling Fee (per Passport-holder)</option>
                                <option p_fees="1800.00" dha_fees='840.00' value="SAQA">SAQA</option>
                                <option p_fees="200.00" dha_fees='0.00' value="Translation: actual costs from Translator">Translation: actual costs from Translator</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Advert: General Work Permit application">Advert: General Work Permit application</option>
                                <option p_fees="2000.00" dha_fees='0.00' value="Salary Benchmarking">Salary Benchmarking</option>
                                <option p_fees="1300.00" dha_fees='0.00' value="Dept. of Labour">Dept. of Labour</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Chartered Accountant Certificate">Chartered Accountant Certificate</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Other services upon request of client eg.expedite">Other services upon request of client eg.expedite</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Variations requested by client eg.modify application">Variations requested by client eg.modify application</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Urgent applications - Within Good Cause period">Urgent applications - Within Good Cause period</option>
                                <option p_fees="4000.00" dha_fees='0.00' value="Urgent applications - 7 to 0 days to Expiry Date">Urgent applications - 7 to 0 days to Expiry Date</option>
                                <option p_fees="500.00" dha_fees='0.00' value="Callout fees - Port of Entry / Housecall / SAPS / other + KM's at AA rate (Min R3000.00)">Callout fees</option>
                                <option p_fees="2200.00" dha_fees='0.00' value="PR applications: Attendance at Interview/s">PR applications: Attendance at Interview/s</option>
                                <option p_fees="1883.20" dha_fees='75.00' value="Birth and Marriage (Price includes DHA fee, courier and handling fee)">Birth and Marriage (Price includes DHA fee, courier and handling fee)</option>
                                <option p_fees="880.00" dha_fees='0.00' value="Immigration Audit workR 880 per person (staffmember) per hour+travel costs">Immigration Audit work</option>
                                <option p_fees="1000.00" dha_fees='0.00' value="Training courses R1000 per person per half day, R1800 per full day Excludes travel, venue and meals for all involved- client to provide">Training courses</option>
                                <option p_fees="1200.00" dha_fees='0.00' value="Development of training and information manuals, documentation R800 -1200 per hour , excludes printing and shipping">Development of training and information manuals, documentation</option>
                                <option p_fees="5000.00" dha_fees='0.00' value="Web based database access (GMIMS) to verify permit status R 5000 per month unlimited numbers of staff members accessing (by password)">Web based database access (GMIMS) to verify permit status</option>
                </select>                </td>
            <td bgcolor="#FFFFFF" width="144" ><b>R</b><input type="text" name="professional_fees[]"  class="p_fees" id="p_fees" size='15' value="0"  autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="saqa_dha_fees[]" class="dha_fees" id="dha_fees" size='15' value="0"  autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="line_total[]" id="line_total" class="amount" size='15' value="0" autocomplete="off"/></td>
        </tr> 
        <tr>
          <td bgcolor="#FFFFFF" ><select name="description[]" id="description" class="tagert">
              <option  value="">Select</option>
              <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit extension for max 3 months">Visitor's permit extension for max 3 months</option>
              <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for academic sabbaticals">Visitor's permit for 3 years for academic sabbaticals</option>
              <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for voluntary or charitable activities">Visitor's permit for 3 years for voluntary or charitable activities</option>
              <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for research">Visitor's permit for 3 years for research</option>
              <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for other prescribed activities - Accompany spouse / accompany parents by dependent children on a holder of a permit issued in terms of section 11, 13, 14, 15, 17, 19 or 22">Visitor's permit for 3 years for other prescribed activities</option>
              <option p_fees="4200.00" dha_fees='0.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
              <option p_fees="4200.00" dha_fees='425.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
              <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC">Spouse/ Life Partner to SAC</option>
              <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC + work authorisation">Spouse/ Life Partner to SAC + work authorisation</option>
              <option p_fees="6000.00" dha_fees='0.00' value="Add work Spouse/ Life Partner to SAC">Add work Spouse/ Life Partner to SAC</option>
              <option p_fees="6000.00" dha_fees='0.00' value="Spouse / Life Partner Extension">Spouse / Life Partner Extension</option>
              <option p_fees="3000.00" dha_fees='425.00' value="Study permit">Study permit</option>
              <option p_fees="3000.00" dha_fees='425.00' value="Study permit Extension / Change of Institution">Study permit Extension / Change of Institution</option>
              <option p_fees="6000.00" dha_fees='0.00' value="Relative permit">Relative permit</option>
              <option p_fees="6000.00" dha_fees='0.00' value="Relative permit Extension">Relative permit Extension</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="Quota work permit">Quota work permit</option>
              <option p_fees="7000.00" dha_fees='1520.00' value="Quota work permit : Change of Employer">Quota work permit : Change of Employer</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="General work permit">General work permit</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (existing client)">General Work Permit Extension (existing client)</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit : Change of Employer">General Work Permit : Change of Employer</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (new client)">General Work Permit Extension (new client)</option>
              <option p_fees="8000.00" dha_fees='0.00' value="Certification of continued employment">Certification of continued employment</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills work permit">Exceptional Skills work permit</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extension (existing client)">Exceptional Skills permit Extension (existing client)</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extention (new client)">Exceptional Skills permit Extention (new client)</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="Intra-company transfer work permit">Intra-company transfer work permit</option>
              <option p_fees="9000.00" dha_fees='425.00' value="Retired permit (per passport)">Retired permit (per passport)</option>
              <option p_fees="9000.00" dha_fees='425.00' value="Retired permit with permission to work">Retired permit with permission to work</option>
              <option p_fees="30000.00" dha_fees='1520.00' value="Corporate permit">Corporate permit</option>
              <option p_fees="7500.00" dha_fees='0.00' value="Corporate worker (authorization certificate to an individual of a corporate permit holder)">Corporate worker </option>
              <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - cultural, economic or social exchange">Exchange permit - cultural, economic or social exchange</option>
              <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - person under the age of 25 years who has received an offer to conduct work for no longer than one year">Exchange permit - person under the age of 25 </option>
              <option p_fees="6000.00" dha_fees='3000.00' value="Legalisation: 1-3 months">Legalisation: 1-3 months</option>
              <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 3-12 months (court appearance)">Legalisation: 3-12 months (court appearance)</option>
              <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 1 year and longer (court appearance)">Legalisation: 1 year and longer (court appearance)</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - five years continuous work permit status">PR - five years continuous work permit status</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - spouse of a citizen or residence for five years">PR - spouse of a citizen or residence for five years</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen or resident under the age of 21">PR - a child of a citizen or resident under the age of 21</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen">PR - a child of a citizen</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - offer of permanent employment - quota system">PR - offer of permanent employment - quota system</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - exceptional skills or qualifications">PR - exceptional skills or qualifications</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (existing client)">PR- intend to establish or has established a business (existing client)</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (new client)">PR- intend to establish or has established a business (new client)</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - five year continuous Refugee status">PR - five year continuous Refugee status</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (Simultaneous with TRP)">PR - Retired (Simultaneous with TRP)</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (news couple)">PR - Retired (new couple)</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - minimum net worth of R7,5 million">PR - minimum net worth of R7,5 million</option>
              <option p_fees="9000.00" dha_fees='1520.00' value="PR - relative (brother, sister, parents, biological or judicially adopted children or adopted parents and step parents)">PR - relative</option>
              <option p_fees="600.00" dha_fees='0.00' value="Handling Fee (per Passport-holder)">Handling Fee (per Passport-holder)</option>
              <option p_fees="1800.00" dha_fees='840.00' value="SAQA">SAQA</option>
              <option p_fees="200.00" dha_fees='0.00' value="Translation: actual costs from Translator">Translation: actual costs from Translator</option>
              <option p_fees="3000.00" dha_fees='0.00' value="Advert: General Work Permit application">Advert: General Work Permit application</option>
              <option p_fees="2000.00" dha_fees='0.00' value="Salary Benchmarking">Salary Benchmarking</option>
              <option p_fees="1300.00" dha_fees='0.00' value="Dept. of Labour">Dept. of Labour</option>
              <option p_fees="3000.00" dha_fees='0.00' value="Chartered Accountant Certificate">Chartered Accountant Certificate</option>
              <option p_fees="6000.00" dha_fees='0.00' value="Other services upon request of client eg.expedite">Other services upon request of client eg.expedite</option>
              <option p_fees="6000.00" dha_fees='0.00' value="Variations requested by client eg.modify application">Variations requested by client eg.modify application</option>
              <option p_fees="3000.00" dha_fees='0.00' value="Urgent applications - Within Good Cause period">Urgent applications - Within Good Cause period</option>
              <option p_fees="4000.00" dha_fees='0.00' value="Urgent applications - 7 to 0 days to Expiry Date">Urgent applications - 7 to 0 days to Expiry Date</option>
              <option p_fees="500.00" dha_fees='0.00' value="Callout fees - Port of Entry / Housecall / SAPS / other + KM's at AA rate (Min R3000.00)">Callout fees</option>
              <option p_fees="2200.00" dha_fees='0.00' value="PR applications: Attendance at Interview/s">PR applications: Attendance at Interview/s</option>
              <option p_fees="1883.20" dha_fees='75.00' value="Birth and Marriage (Price includes DHA fee, courier and handling fee)">Birth and Marriage (Price includes DHA fee, courier and handling fee)</option>
              <option p_fees="880.00" dha_fees='0.00' value="Immigration Audit workR 880 per person (staffmember) per hour+travel costs">Immigration Audit work</option>
              <option p_fees="1000.00" dha_fees='0.00' value="Training courses R1000 per person per half day, R1800 per full day Excludes travel, venue and meals for all involved- client to provide">Training courses</option>
              <option p_fees="1200.00" dha_fees='0.00' value="Development of training and information manuals, documentation R800 -1200 per hour , excludes printing and shipping">Development of training and information manuals, documentation</option>
              <option p_fees="5000.00" dha_fees='0.00' value="Web based database access (GMIMS) to verify permit status R 5000 per month unlimited numbers of staff members accessing (by password)">Web based database access (GMIMS) to verify permit status</option>
            </select>          </td>
          <td bgcolor="#FFFFFF" ><b>R</b>
              <input type="text" name="professional_fees[]"  class="p_fees" id="p_fees" size='15' value="0"  autocomplete="off"/></td>
          <td bgcolor="#FFFFFF"><b>R</b>
              <input type="text" name="saqa_dha_fees[]" class="dha_fees" id="dha_fees" size='15' value="0"  autocomplete="off"/></td>
          <td bgcolor="#FFFFFF"><b>R</b>
              <input type="text" name="line_total[]" id="line_total" class="amount" size='15' value="0" autocomplete="off"/></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" ><select name="description[]" id="description" class="tagert">
            <option  value="">Select</option>
            <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit extension for max 3 months">Visitor's permit extension for max 3 months</option>
            <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for academic sabbaticals">Visitor's permit for 3 years for academic sabbaticals</option>
            <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for voluntary or charitable activities">Visitor's permit for 3 years for voluntary or charitable activities</option>
            <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for research">Visitor's permit for 3 years for research</option>
            <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for other prescribed activities - Accompany spouse / accompany parents by dependent children on a holder of a permit issued in terms of section 11, 13, 14, 15, 17, 19 or 22">Visitor's permit for 3 years for other prescribed activities</option>
            <option p_fees="4200.00" dha_fees='0.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
            <option p_fees="4200.00" dha_fees='425.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
            <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC">Spouse/ Life Partner to SAC</option>
            <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC + work authorisation">Spouse/ Life Partner to SAC + work authorisation</option>
            <option p_fees="6000.00" dha_fees='0.00' value="Add work Spouse/ Life Partner to SAC">Add work Spouse/ Life Partner to SAC</option>
            <option p_fees="6000.00" dha_fees='0.00' value="Spouse / Life Partner Extension">Spouse / Life Partner Extension</option>
            <option p_fees="3000.00" dha_fees='425.00' value="Study permit">Study permit</option>
            <option p_fees="3000.00" dha_fees='425.00' value="Study permit Extension / Change of Institution">Study permit Extension / Change of Institution</option>
            <option p_fees="6000.00" dha_fees='0.00' value="Relative permit">Relative permit</option>
            <option p_fees="6000.00" dha_fees='0.00' value="Relative permit Extension">Relative permit Extension</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="Quota work permit">Quota work permit</option>
            <option p_fees="7000.00" dha_fees='1520.00' value="Quota work permit : Change of Employer">Quota work permit : Change of Employer</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="General work permit">General work permit</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (existing client)">General Work Permit Extension (existing client)</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit : Change of Employer">General Work Permit : Change of Employer</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (new client)">General Work Permit Extension (new client)</option>
            <option p_fees="8000.00" dha_fees='0.00' value="Certification of continued employment">Certification of continued employment</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills work permit">Exceptional Skills work permit</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extension (existing client)">Exceptional Skills permit Extension (existing client)</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extention (new client)">Exceptional Skills permit Extention (new client)</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="Intra-company transfer work permit">Intra-company transfer work permit</option>
            <option p_fees="9000.00" dha_fees='425.00' value="Retired permit (per passport)">Retired permit (per passport)</option>
            <option p_fees="9000.00" dha_fees='425.00' value="Retired permit with permission to work">Retired permit with permission to work</option>
            <option p_fees="30000.00" dha_fees='1520.00' value="Corporate permit">Corporate permit</option>
            <option p_fees="7500.00" dha_fees='0.00' value="Corporate worker (authorization certificate to an individual of a corporate permit holder)">Corporate worker </option>
            <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - cultural, economic or social exchange">Exchange permit - cultural, economic or social exchange</option>
            <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - person under the age of 25 years who has received an offer to conduct work for no longer than one year">Exchange permit - person under the age of 25 </option>
            <option p_fees="6000.00" dha_fees='3000.00' value="Legalisation: 1-3 months">Legalisation: 1-3 months</option>
            <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 3-12 months (court appearance)">Legalisation: 3-12 months (court appearance)</option>
            <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 1 year and longer (court appearance)">Legalisation: 1 year and longer (court appearance)</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - five years continuous work permit status">PR - five years continuous work permit status</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - spouse of a citizen or residence for five years">PR - spouse of a citizen or residence for five years</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen or resident under the age of 21">PR - a child of a citizen or resident under the age of 21</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen">PR - a child of a citizen</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - offer of permanent employment - quota system">PR - offer of permanent employment - quota system</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - exceptional skills or qualifications">PR - exceptional skills or qualifications</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (existing client)">PR- intend to establish or has established a business (existing client)</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (new client)">PR- intend to establish or has established a business (new client)</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - five year continuous Refugee status">PR - five year continuous Refugee status</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (Simultaneous with TRP)">PR - Retired (Simultaneous with TRP)</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (news couple)">PR - Retired (new couple)</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - minimum net worth of R7,5 million">PR - minimum net worth of R7,5 million</option>
            <option p_fees="9000.00" dha_fees='1520.00' value="PR - relative (brother, sister, parents, biological or judicially adopted children or adopted parents and step parents)">PR - relative</option>
            <option p_fees="600.00" dha_fees='0.00' value="Handling Fee (per Passport-holder)">Handling Fee (per Passport-holder)</option>
            <option p_fees="1800.00" dha_fees='840.00' value="SAQA">SAQA</option>
            <option p_fees="200.00" dha_fees='0.00' value="Translation: actual costs from Translator">Translation: actual costs from Translator</option>
            <option p_fees="3000.00" dha_fees='0.00' value="Advert: General Work Permit application">Advert: General Work Permit application</option>
            <option p_fees="2000.00" dha_fees='0.00' value="Salary Benchmarking">Salary Benchmarking</option>
            <option p_fees="1300.00" dha_fees='0.00' value="Dept. of Labour">Dept. of Labour</option>
            <option p_fees="3000.00" dha_fees='0.00' value="Chartered Accountant Certificate">Chartered Accountant Certificate</option>
            <option p_fees="6000.00" dha_fees='0.00' value="Other services upon request of client eg.expedite">Other services upon request of client eg.expedite</option>
            <option p_fees="6000.00" dha_fees='0.00' value="Variations requested by client eg.modify application">Variations requested by client eg.modify application</option>
            <option p_fees="3000.00" dha_fees='0.00' value="Urgent applications - Within Good Cause period">Urgent applications - Within Good Cause period</option>
            <option p_fees="4000.00" dha_fees='0.00' value="Urgent applications - 7 to 0 days to Expiry Date">Urgent applications - 7 to 0 days to Expiry Date</option>
            <option p_fees="500.00" dha_fees='0.00' value="Callout fees - Port of Entry / Housecall / SAPS / other + KM's at AA rate (Min R3000.00)">Callout fees</option>
            <option p_fees="2200.00" dha_fees='0.00' value="PR applications: Attendance at Interview/s">PR applications: Attendance at Interview/s</option>
            <option p_fees="1883.20" dha_fees='75.00' value="Birth and Marriage (Price includes DHA fee, courier and handling fee)">Birth and Marriage (Price includes DHA fee, courier and handling fee)</option>
            <option p_fees="880.00" dha_fees='0.00' value="Immigration Audit workR 880 per person (staffmember) per hour+travel costs">Immigration Audit work</option>
            <option p_fees="1000.00" dha_fees='0.00' value="Training courses R1000 per person per half day, R1800 per full day Excludes travel, venue and meals for all involved- client to provide">Training courses</option>
            <option p_fees="1200.00" dha_fees='0.00' value="Development of training and information manuals, documentation R800 -1200 per hour , excludes printing and shipping">Development of training and information manuals, documentation</option>
            <option p_fees="5000.00" dha_fees='0.00' value="Web based database access (GMIMS) to verify permit status R 5000 per month unlimited numbers of staff members accessing (by password)">Web based database access (GMIMS) to verify permit status</option>
          </select></td>
          <td bgcolor="#FFFFFF" ><b>R</b>
              <input type="text" name="professional_fees[]"  class="p_fees" id="p_fees" size='15' value="0"  autocomplete="off"/></td>
          <td bgcolor="#FFFFFF"><b>R</b>
              <input type="text" name="saqa_dha_fees[]" class="dha_fees" id="dha_fees" size='15' value="0"  autocomplete="off"/></td>
          <td bgcolor="#FFFFFF"><b>R</b>
              <input type="text" name="line_total[]" id="line_total" class="amount" size='15' value="0" autocomplete="off"/></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" width="144" >
                <select name="description[]" id="description" class="tagert">
                                <option  value="">Select</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit extension for max 3 months">Visitor's permit extension for max 3 months</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for academic sabbaticals">Visitor's permit for 3 years for academic sabbaticals</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for voluntary or charitable activities">Visitor's permit for 3 years for voluntary or charitable activities</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for research">Visitor's permit for 3 years for research</option>
                                <option p_fees="3300.00" dha_fees='425.00' value="Visitor's permit for 3 years for other prescribed activities - Accompany spouse / accompany parents by dependent children on a holder of a permit issued in terms of section 11, 13, 14, 15, 17, 19 or 22">Visitor's permit for 3 years for other prescribed activities</option>
                                <option p_fees="4200.00" dha_fees='0.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
                                <option p_fees="4200.00" dha_fees='425.00' value="Visitor's Permit with Authorisation to conduct work (Airport)">Visitor's Permit with Authorisation to conduct work (Airport)</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC">Spouse/ Life Partner to SAC</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse/ Life Partner to SAC + work authorisation">Spouse/ Life Partner to SAC + work authorisation</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Add work Spouse/ Life Partner to SAC">Add work Spouse/ Life Partner to SAC</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Spouse / Life Partner Extension">Spouse / Life Partner Extension</option>
                                <option p_fees="3000.00" dha_fees='425.00' value="Study permit">Study permit</option>
                                <option p_fees="3000.00" dha_fees='425.00' value="Study permit Extension / Change of Institution">Study permit Extension / Change of Institution</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Relative permit">Relative permit</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Relative permit Extension">Relative permit Extension</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Quota work permit">Quota work permit</option>
                                <option p_fees="7000.00" dha_fees='1520.00' value="Quota work permit : Change of Employer">Quota work permit : Change of Employer</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General work permit">General work permit</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (existing client)">General Work Permit Extension (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit : Change of Employer">General Work Permit : Change of Employer</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="General Work Permit Extension (new client)">General Work Permit Extension (new client)</option>
                                <option p_fees="8000.00" dha_fees='0.00' value="Certification of continued employment">Certification of continued employment</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills work permit">Exceptional Skills work permit</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extension (existing client)">Exceptional Skills permit Extension (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Exceptional Skills permit Extention (new client)">Exceptional Skills permit Extention (new client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="Intra-company transfer work permit">Intra-company transfer work permit</option>
                                <option p_fees="9000.00" dha_fees='425.00' value="Retired permit (per passport)">Retired permit (per passport)</option>
                                <option p_fees="9000.00" dha_fees='425.00' value="Retired permit with permission to work">Retired permit with permission to work</option>
                                <option p_fees="30000.00" dha_fees='1520.00' value="Corporate permit">Corporate permit</option>
                                <option p_fees="7500.00" dha_fees='0.00' value="Corporate worker (authorization certificate to an individual of a corporate permit holder)">Corporate worker </option>
                                <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - cultural, economic or social exchange">Exchange permit - cultural, economic or social exchange</option>
                                <option p_fees="6000.00" dha_fees='425.00' value="Exchange permit - person under the age of 25 years who has received an offer to conduct work for no longer than one year">Exchange permit - person under the age of 25 </option>
                                <option p_fees="6000.00" dha_fees='3000.00' value="Legalisation: 1-3 months">Legalisation: 1-3 months</option>
                                <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 3-12 months (court appearance)">Legalisation: 3-12 months (court appearance)</option>
                                <option p_fees="6000.00" dha_fees='5000.00' value="Legalisation: 1 year and longer (court appearance)">Legalisation: 1 year and longer (court appearance)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - five years continuous work permit status">PR - five years continuous work permit status</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - spouse of a citizen or residence for five years">PR - spouse of a citizen or residence for five years</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen or resident under the age of 21">PR - a child of a citizen or resident under the age of 21</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - a child of a citizen">PR - a child of a citizen</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - offer of permanent employment - quota system">PR - offer of permanent employment - quota system</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - exceptional skills or qualifications">PR - exceptional skills or qualifications</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (existing client)">PR- intend to establish or has established a business (existing client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR- intend to establish or has established a business (new client)">PR- intend to establish or has established a business (new client)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - five year continuous Refugee status">PR - five year continuous Refugee status</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (Simultaneous with TRP)">PR - Retired (Simultaneous with TRP)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - Retired (news couple)">PR - Retired (new couple)</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - minimum net worth of R7,5 million">PR - minimum net worth of R7,5 million</option>
                                <option p_fees="9000.00" dha_fees='1520.00' value="PR - relative (brother, sister, parents, biological or judicially adopted children or adopted parents and step parents)">PR - relative</option>
                                <option p_fees="600.00" dha_fees='0.00' value="Handling Fee (per Passport-holder)">Handling Fee (per Passport-holder)</option>
                                <option p_fees="1800.00" dha_fees='840.00' value="SAQA">SAQA</option>
                                <option p_fees="200.00" dha_fees='0.00' value="Translation: actual costs from Translator">Translation: actual costs from Translator</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Advert: General Work Permit application">Advert: General Work Permit application</option>
                                <option p_fees="2000.00" dha_fees='0.00' value="Salary Benchmarking">Salary Benchmarking</option>
                                <option p_fees="1300.00" dha_fees='0.00' value="Dept. of Labour">Dept. of Labour</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Chartered Accountant Certificate">Chartered Accountant Certificate</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Other services upon request of client eg.expedite">Other services upon request of client eg.expedite</option>
                                <option p_fees="6000.00" dha_fees='0.00' value="Variations requested by client eg.modify application">Variations requested by client eg.modify application</option>
                                <option p_fees="3000.00" dha_fees='0.00' value="Urgent applications - Within Good Cause period">Urgent applications - Within Good Cause period</option>
                                <option p_fees="4000.00" dha_fees='0.00' value="Urgent applications - 7 to 0 days to Expiry Date">Urgent applications - 7 to 0 days to Expiry Date</option>
                                <option p_fees="500.00" dha_fees='0.00' value="Callout fees - Port of Entry / Housecall / SAPS / other + KM's at AA rate (Min R3000.00)">Callout fees</option>
                                <option p_fees="2200.00" dha_fees='0.00' value="PR applications: Attendance at Interview/s">PR applications: Attendance at Interview/s</option>
                                <option p_fees="1883.20" dha_fees='75.00' value="Birth and Marriage (Price includes DHA fee, courier and handling fee)">Birth and Marriage (Price includes DHA fee, courier and handling fee)</option>
                                <option p_fees="880.00" dha_fees='0.00' value="Immigration Audit workR 880 per person (staffmember) per hour+travel costs">Immigration Audit work</option>
                                <option p_fees="1000.00" dha_fees='0.00' value="Training courses R1000 per person per half day, R1800 per full day Excludes travel, venue and meals for all involved- client to provide">Training courses</option>
                                <option p_fees="1200.00" dha_fees='0.00' value="Development of training and information manuals, documentation R800 -1200 per hour , excludes printing and shipping">Development of training and information manuals, documentation</option>
                                <option p_fees="5000.00" dha_fees='0.00' value="Web based database access (GMIMS) to verify permit status R 5000 per month unlimited numbers of staff members accessing (by password)">Web based database access (GMIMS) to verify permit status</option>
                </select>                </td>
            <td bgcolor="#FFFFFF" width="144" ><b>R</b><input type="text" name="professional_fees[]"  class="p_fees" id="p_fees" size='15' value="0"  autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="saqa_dha_fees[]" class="dha_fees" id="dha_fees" size='15' value="0"  autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="line_total[]" id="line_total" class="amount" size='15' value="0" autocomplete="off"/></td>
        </tr>
         <tr>
           <td bgcolor="#FFFFFF" ><input type="text"  name="description[]" id="description" size='65' autocomplete="off"/>           </td>
           <td bgcolor="#FFFFFF" ><b>R</b>
               <input type="text" name="professional_fees[]"  class="p_fees" id="p_fees" value="0"  size='15' autocomplete="off"/></td>
           <td bgcolor="#FFFFFF"><b>R</b>
               <input type="text" name="saqa_dha_fees[]" class="dha_fees" id="dha_fees" value="0"  size='15' autocomplete="off"/></td>
           <td bgcolor="#FFFFFF"><b>R</b>
               <input type="text" name="line_total[]" id="line_total" class="amount" size='15' value="0" autocomplete="off"/></td>
         </tr>
         <tr>
           <td bgcolor="#FFFFFF" ><input type="text"  name="description[]" id="description" size='65' autocomplete="off"/>           </td>
           <td bgcolor="#FFFFFF" ><b>R</b>
               <input type="text" name="professional_fees[]"  class="p_fees" id="p_fees" value="0"  size='15' autocomplete="off"/></td>
           <td bgcolor="#FFFFFF"><b>R</b>
               <input type="text" name="saqa_dha_fees[]" class="dha_fees" id="dha_fees" value="0"  size='15' autocomplete="off"/></td>
           <td bgcolor="#FFFFFF"><b>R</b>
               <input type="text" name="line_total[]" id="line_total" class="amount" size='15' value="0" autocomplete="off"/></td>
         </tr>
         <tr>
            <td bgcolor="#FFFFFF" width="144" >
                
                            <input type="text"  name="description[]" id="description" size='65' autocomplete="off"/>                </td>
            <td bgcolor="#FFFFFF" width="144" ><b>R</b><input type="text" name="professional_fees[]"  class="p_fees" id="p_fees" value="0"  size='15' autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="saqa_dha_fees[]" class="dha_fees" id="dha_fees" value="0"  size='15' autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="line_total[]" id="line_total" class="amount" size='15' value="0" autocomplete="off"/></td>
        </tr>
         <tr>
            <td bgcolor="#FFFFFF" colspan=6 align="center"><div id="text">&nbsp;</div></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" width="144" ><strong>Subtotal </strong></td>
            <td bgcolor="#FFFFFF" width="144" ><b>R</b><input type="text" name="subtotal1" id="subtotal1" class="subtotal_amount" value="0" size='15' autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="subtotal2" id="subtotal2" class="subtotal_amount1" value="0" size='15' autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="subtotal3" id="subtotal3" class="total_amount" value="0" size='15'autocomplete="off"/></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" width="144" ><strong>Vat</strong></td>
            <td bgcolor="#FFFFFF" width="144" ><b>R</b><input type="text" name="vat" id="vat" value="0" size='15' class="tax" autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="vat" id="vat"value="0" size='15' autocomplete="off"/></td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="vat" id="vat" class="tax" value="0" size='15' utocomplete="off"/></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" width="144" ><strong>Total</strong></td>
            <td bgcolor="#FFFFFF" width="144" >&nbsp;</td>
            <td bgcolor="#FFFFFF" width="144">&nbsp;</td>
            <td bgcolor="#FFFFFF" width="144"><b>R</b><input type="text" name="total" onchange="total();" id="total" class="total" value="0" size='15' autocomplete="off"/></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" width="144" >&nbsp;</td>
            <td bgcolor="#FFFFFF" width="144" >&nbsp;</td>
            <td bgcolor="#FFFFFF" width="144">&nbsp;</td>
            <td bgcolor="#FFFFFF" width="144">&nbsp;</td>
        </tr>
        <tr>
            <td width="144" valign="top" bgcolor="#FFFFFF" ><strong>Comments</strong></td>
            <td colspan="6" bgcolor="#FFFFFF" ><textarea rows="4" cols="30" name="comments"></textarea></td>
        </tr>
     
        <tr>
            <td bgcolor="#FFFFFF" colspan=6 align="right"><input type="hidden" id="aid" value="1"><input type="hidden" name="count" id="count" value=""><input type="submit" name="Submit" value=" Submit " class="login">        </td>
        </tr>
    </table>
   
</form>
