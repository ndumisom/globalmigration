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
        var url="textfield.php";
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


<div class="scroll">
    <table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
        <tr><td>

                <form name="client" action="admin_index.php?m=permit" method="post" onsubmit="return validateClient()">
                    <h3> <a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"><b>New Client </b></a>&nbsp;&nbsp;&nbsp;&nbsp; Select destination country  <select name="destination_country">
                                    <option> ------Select------ </option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select></h3>
                      
                     <table border="0" cellspacing="3" cellpadding="0">

                        <tr>
                            <td colspan="5"><div align="center">
                                    <?php
                                    if (isset($_SESSION['msg'])) {
                                        echo '<span id="msg">' . $_SESSION['msg'] . '</span>';
                                        unset($_SESSION['msg']);
                                    }
                                    if (isset($_SESSION['error'])) {
                                        echo '<span id="error">' . $_SESSION['error'] . '</span>';
                                        unset($_SESSION['error']);
                                    }
                                    ?><p>&nbsp;</p>
                                </div>        </td>
                        </tr>
                        <tr>
                            <td width="18%">File Number </td>
                            <td width="21%"><input type="text" name="file_no" id="file_no" /></td>
                            <td width="10%">&nbsp;</td>
                            <td width="27%">In care of Email</td>
                            <td width="24%"><input type="text" name="in_care_email" id="in_care_email" /></td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td><select name="title">
                                    <option> ------Select------ </option>
                                    <option value="Prof">Prof</option>
                                    <option value="Dr">Dr</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                </select></td>
                            <td>&nbsp;</td>
                            <td>Mobile Number </td>
                            <td><input type="text" name="mobile_no" id="mobile_no" /></td>
                        </tr>
                        <tr>
                            <td>Surname</td>
                            <td><input type="text" name="surname" id="surname" /></td>
                            <td>&nbsp;</td>
                            <td>Fax Number </td>
                            <td><input type="text" name="fax_no" id="fax_no" /></td>
                        </tr>
                        <tr>
                            <td>First Names </td>
                            <td><input type="text" name="firstnames" id="fisrtnames" /></td>
                            <td>&nbsp;</td>
                            <td>Email Address </td>
                            <td><input type="text" name="email" id="email" /></td>
                        </tr>
                        <tr>
                            <td>Application Type </td>
                            <td><select name="application_type" id="application_type">
                                    <option>--------Select------ </option>
                                    <option value="Father">Father</option>
                                    <option value="Child">Child</option>
                                    <option value="Child1">Child1</option>
                                    <option value="Child2">Child2</option>
                                    <option value="Child3">Child3</option>
                                    <option value="Child4">Child4</option>
                                    <option value="Child5">Child5</option>
                                    <option value="Child6">Child6</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Global">Global</option>
                                    <option value="Husband">Husband</option>
                                    <option value="Life partner">Life partner</option>
                                    <option value="Main applican">Main applicant</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Wife">Wife</option>
                                    <option value="Spouce">Spouse</option>
                                    <option value="Once off">Once off</option>
                                    <option value="Forein life partner">Foreign life partner</option>
                                </select></td>
                            <td>&nbsp;</td>
                            <td>Street Address</td>
                            <td><input type="text" name="street_address" id="street_address" /></td>
                        </tr>
                        <tr>
                            <td>D.O.B</td>
                        <script type="text/javascript">
                            /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                            var bas_cal,dp_cal,ms_cal;      
                            window.onload = function () {
                                dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('dob'));
                            };
                        </script>
                        <td><input type="text" name="dob" id="dob" autocomplete="off"/></td>
                        <td>&nbsp;</td>
                        <td>Suburb</td>
                        <td><input type="text" name="suburb" id="suburb" /></td>
                        </tr>
                        <tr>
                            <td>Passport Number </td>
                            <td><input type="text" name="passport_no" id="passport_no" /></td>
                            <td>&nbsp;</td>
                            <td>City</td>
                            <td><input type="text" name="city" id="city" /></td>
                        </tr>
                        <tr>
                            <td>Passport Expiry Date </td>
                            <script type="text/javascript">
                            /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                            var bas_cal,dp_cal,ms_cal;      
                            window.onclick = function () {
                                dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('passport_expiry_date'));
                            };
                        </script>
                            <td><input type="text" name="passport_expiry_date" id="passport_expiry_date" autocomplete="off" /></td>
                            <td>&nbsp;</td>
                            <td>country</td>
                            <td><select name="country">
                              <option value="">Select</option>
                              <option value="Algeria">Algeria</option>
                              <option value="Angola">Angola</option>
                              <option value="Australia">Australia</option>
                              <option value="Austria">Austria</option>
                              <option value="Belgium">Belgium</option>
                              <option value="Benin">Benin</option>
                              <option value="Botswana">Botswana</option>
                              <option value="Brazil">Brazil</option>
                              <option value="Cameroon">Cameroon</option>
                              <option value="Canada">Canada</option>
                              <option value="Chile">Chile</option>
                              <option value="PROC">PROC</option>
                              <option value="Columbia">Columbia</option>
                              <option value="Croatia">Croatia</option>
                              <option value="Cuba">Cuba</option>
                              <option value="Czech Republic">Czech Republic</option>
                              <option value="Denmark">Denmark</option>
                              <option value="DRC">DRC</option>
                              <option value="Egypt">Egypt</option>
                              <option value="Ethiopia">Ethiopia</option>
                              <option value="France">France</option>
                              <option value="Gabon">Gabon</option>
                              <option value="Germany">Germany</option>
                              <option value="Ghana">Ghana</option>
                              <option value="Honduras">Honduras</option>
                              <option value="Hungary">Hungary</option>
                              <option value="Iceland">Iceland</option>
                              <option value="India">India</option>
                              <option value="Iran">Iran</option>
                              <option value="Ireland">Ireland</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Japan">Japan</option>
                              <option value="Jordan">Jordan</option>
                              <option value="Kenya">Kenya</option>
                              <option value="Korea">Korea</option>
                              <option value="Lesotho">Lesotho</option>
                              <option value="Lietuvos">Lietuvos</option>
                              <option value="Lithuania">Lithuania</option>
                              <option value="Malawi">Malawi</option>
                              <option value="Malaysia">Malaysia</option>
                              <option value="Mauritius">Mauritius</option>
                              <option value=""> </option>
                              <option value="Mexico">Mexico</option>
                              <option value=""> </option>
                              <option value="Mozambique">Mozambique</option>
                              <option value="Namibia">Namibia</option>
                              <option value="Netherlands">Netherlands</option>
                              <option value="New Zealand">New Zealand</option>
                              <option value="Nigeria">Nigeria</option>
                              <option value="Norway">Norway</option>
                              <option value="Pakistan">Pakistan</option>
                              <option value="Peru">Peru</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Poland">Poland</option>
                              <option value="Portugal">Portugal</option>
                              <option value="Romania">Romania</option>
                              <option value="Russia">Russia</option>
                              <option value="SAC">SAC</option>
                              <option value="Senegal">Senegal</option>
                              <option value="Singapore">Singapore</option>
                              <option value="Slovakia">Slovakia</option>
                              <option value="Slovenska">Slovenska</option>
							  <option value="South Africa">South Africa</option>
                              <option value="Spain">Spain</option>
                              <option value="Sudan">Sudan</option>
                              <option value="Swaziland">Swaziland</option>
                              <option value="Sweden">Sweden</option>
                              <option value="Switzerland">Switzerland</option>
                              <option value="Tanzania">Tanzania</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Trinidad &amp; Tebago">Trinidad &amp; Tebago</option>
                              <option value="Uganda">Uganda</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="USA">USA</option>
                              <option value="Yugoslavia">Yugoslavia</option>
                              <option value="Zaire">Zaire</option>
                              <option value="Zambia">Zambia</option>
                              <option value="Zimbabwe">Zimbabwe</option>
                              <option value="Republic of Cyprus">Republic of Cyprus</option>
                              <option value="Eritrea">Eritrea</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Bosnia">Bosnia</option>
                              <option value="Suriname">Suriname</option>
                              <option value="Argentina">Argentina</option>
                              <option value=""> </option>
                              <option value="Nepal">Nepal</option>
                              <option value="Liberia">Liberia</option>
                              <option value="St Vincent &amp; the Grenadines">St Vincent &amp; the Grenadines</option>
                              <option value="Burundi">Burundi</option>
                              <option value="Rwanda">Rwanda</option>
                              <option value="Finland">Finland</option>
                              <option value="Republic of Belarus">Republic of Belarus</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Country Of Origin </td>
                            <td>
<select name="country_of_origin" id="country_of_origin" />
<option value="">Select</option>
<option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="Brunei ">Brunei </option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burma">Burma</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote d'Ivoire">Cote d'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curacao">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Greece">Greece</option>
<option value="Grenada">Grenada</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Haiti">Haiti</option>
<option value="Holy See">Holy See</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea, North">Korea, North</option>
<option value="Korea, South">Korea, South</option>
<option value="Kosovo">Kosovo</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montenegro">Montenegro</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Netherlands Antilles">Netherlands Antilles</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="North Korea">North Korea</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Palestinian Territories">Palestinian Territories</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Qatar">Qatar</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Vincent">Saint Vincent</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">Sao Tome and Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Sint Maarten">Sint Maarten</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Sudan">South Sudan</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Timor-Leste">Timor-Leste</option>
<option value="Togo">Togo</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>

							</select>
							</td>
                            <td>&nbsp;</td>
                            <td>Postal/Zip Code </td>
                            <td><input type="text" name="code" id="code" /></td>
                        </tr>
                        <tr>
                            <td>Marital Status </td>
                            <td><input type="text" name="marital_status" id="marital_status" /></td>
                            <td>&nbsp;</td>
                            <td>Captured by </td>
                            <td><input type="text" name="captured_by" id="captured_by" /></td>
                        </tr>
                        <tr>
                            <td>Dependents/Children</td>
                            <td><input type="text" name="dependents" id="dependents" /></td>
                            <td>&nbsp;</td>
                            <td>Consultant</td>
                            <td><input type="text" name="consultant" id="consultant" /></td>
                        </tr>
                        <tr>
                            <td>Corporate</td>
                            <td>


                                <select name="corporate" id="corporate" onChange="showUser(this.value)">

                                    <option value="Aerotechnic">Aerotechnic</option>
                                    <option value="AIG">AIG</option>
                                    <option value="Aircom">Aircom</option>
                                    <option value="Aker Sollutions">Aker Sollutions</option>
                                    <option value="Aker Solutions">Aker Solutions</option>
                                    <option value="Albany">Albany</option>
                                    <option value="Albany systems">Albany systems</option>
                                    <option value="Arcus Gibb">Arcus Gibb</option>
                                    <option value="ARV">ARV</option>
                                    <option value="Asch Proffessional Services">Asch Proffessional Services</option>
                                    <option value="Aunde">Aunde</option>
                                    <option value="Axis Mason">Axis Mason</option>
                                    <option value="Bain & Company Inc">Bain & Company Inc</option>
                                    <option value="Barone, Budge and Dominick">Barone, Budge and Dominick</option>
                                    <option value="Base Models">Base Models</option>
                                    <option value="Basil Read">Basil Read</option>
                                    <option value="Bastillion">Bastillion</option>
                                    <option value="Battery Electric">Battery Electric</option>
                                    <option value="Beroa">Beroa</option>
                                    <option value="Bosch">Bosch</option>
                                    <option value="BSG">BSG</option>

                                    <option value="BSH Home Appliances">BSH Home Appliances</option>
                                    <option value="Cape Gourmet Food Festival">Cape Gourmet Food Festival</option>
                                    <option value="CapQuest">CapQuest</option>
                                    <option value="CCIC Caracle Creek Intl Con">CCIC Caracle Creek Intl Con</option>
                                    <option value="CF">CF</option>
                                    <option value="China Experience">China Experience</option>
                                    <option value="Clarity Mineral">Clarity Mineral</option>
                                    <option value="Coleman">Coleman</option>
                                    <option value="Concor">Concor</option>
                                    <option value="Connect 123">Connect 123</option>
                                    <option value="Continental China">Continental China</option>
                                    <option value="CPS Projects (pty) Ltd">CPS Projects (pty) Ltd</option>
                                    <option value="Cricket South Africa">Cricket South Africa</option>
                                    <option value="Dale Automation">Dale Automation</option>
                                    <option value="Daymon World International">Daymon World International</option>
                                    <option value="Daymon World Intl">Daymon World Intl</option>
                                    <option value="Desmond Tutu">Desmond Tutu</option>
                                    <option value="Desmond. Tutu">Desmond. Tutu</option>
                                    <option value="Digitot">Digitot</option>
                                    <option value="DNV">DNV</option>
                                    <option value="DRG">DRG</option>
                                    <option value="DVT">DVT</option>
                                    <option value="Edison Allteck">Edison Allteck</option>
                                    <option value="Edison Durban">Edison Durban</option>
                                    <option value="Edison Jehamo / Allteck">Edison Jehamo / Allteck</option>
                                    <option value="Edison Jehamo Power">Edison Jehamo Power</option>
                                    <option value="Edison Power Electrical">Edison Power Electrical</option>
                                    <option value="Fairmont Zimbali Resort">Fairmont Zimbali Resort</option>
                                    <option value="FairView Golf Estate">FairView Golf Estate</option>
                                    <option value="Faurecia">Faurecia</option>
                                    <option value="Federal Mogul">Federal Mogul</option>
                                    <option value="Federal Mogul South Africa">Federal Mogul South Africa</option>
                                    <option value="Futura Footware">Futura Footware</option>
                                    <option value="Futura Footwear">Futura Footwear</option>
                                    <option value="Global Migration">Global Migration</option>
                                    <option value="Green Building Council SA">Green Building Council SA</option>
                                    <option value="harsco">harsco</option>
                                    <option value="Hensu Transport">Hensu Transport</option>
                                    <option value="Hillary Construction">Hillary Construction</option>
                                    <option value="Ibamba Hunting">Ibamba Hunting</option>
                                    <option value="Ivodent">Ivodent</option>
                                    <option value="Just Diesel">Just Diesel</option>
                                    <option value="KEC">KEC</option>
                                    <option value="KEC International">KEC International</option>
                                    <option value="Kingswood College">Kingswood College</option>
                                    <option value="Kinky Group">Kinky Group</option>
                                    <option value="Kool U Up">Kool U Up</option>
                                    <option value="Krones">Krones</option>
                                    <option value="Linda Ness">Linda Ness</option>
                                    <option value="Linde Group">Linde Group</option>
                                    <option value="Marcom International">Marcom International</option>
                                    <option value="Maskew Miller Longman">Maskew Miller Longman</option>
                                    <option value="Metropiltan">Metropiltan</option>
                                    <option value="Metropolitan Life">Metropolitan Life</option>
                                    <option value="Microsof">Microsoft</option>
                                    <option value="MML">MML</option>
                                    <option value="Mobilitrix">Mobilitrix</option>
                                    <option value="Motivation Africa">Motivation Africa</option>
                                    <option value="Murray and Roberts">Murray and Roberts</option>
                                    <option value="Murray and Roberts Marin">Murray and Roberts Marine</option>
                                    <option value="MurRob">MurRob</option>
                                    <option value="MUSA">MUSA</option>
                                    <option value="Nielsen Company">Nielsen Company</option>
                                    <option value="Nielsen Group">Nielsen Group</option>
                                    <option value="Novartis">Novartis</option>
                                    <option value="Novartis South Africa">Novartis South Africa</option>
                                    <option value="Oceans Research">Oceans Research</option>
                                    <option value="Ogilvy">Ogilvy</option>
                                    <option value="OOBA">OOBA</option>
                                    <option value="Osmand lange">Osmand lange</option>
                                    <option value="Phoenix Racks">Phoenix Racks</option>
                                    <option value="Piet Esterhuyse Vervoer">Piet Esterhuyse Vervoer</option>
                                    <option value="PRDW">PRDW</option>
                                    <option value="Prestedge Retief Dresdner Wijnberg">Prestedge Retief Dresdner Wijnberg</option>
                                    <option value="Prestedge Retief Dresner Wijnberg">Prestedge Retief Dresner Wijnberg</option>
                                    <option value="Rapidol">Rapidol</option>
                                    <option value="Rennies Travel">Rennies Travel</option>
                                    <option value="Robert Bosch">Robert Bosch</option>
                                    <option value="Rockwell Automation">Rockwell Automation</option>
                                    <option value="SA Rock Drills CC">SA Rock Drills CC</option>
                                    <option value="SAC School">SAC School</option>
                                    <option value="Sandoz">Sandoz</option>
                                    <option value="SASOL">SASOL</option>
                                    <option value="SB TIPPERS">SB TIPPERS</option>
                                    <option value="Seal Cool Industrie">Seal Cool Industries</option>
                                    <option value="Seamless Technologies">Seamless Technologies</option>
                                    <option value="Sircus Synergy">Sircus Synergy</option>
                                    <option value="SircusSynergy">SircusSynergy</option>
                                    <option value="Snowden">Snowden</option>
                                    <option value="Sofline Accpac">Sofline Accpac</option>
                                    <option value="Softline AccPac">Softline AccPac</option>
                                    <option value="SRK<">SRK</option>
                                    <option value="SRK Consulting">SRK Consulting</option>
                                    <option value="SRK Consulting Engineers">SRK Consulting Engineers</option>
                                    <option value="St Andrews College">St Andrews College</option>
                                    <option value="St Martins in the Field">St Martins in the Field</option>
									<option value="Stepping South">Stepping South</option>
                                    <option value="Sunrise">Sunrise</option>
                                    <option value="Taj Hotel">Taj Hotel</option>
                                    <option value="Taj Hotels Corporate">Taj Hotels Corporate</option>
                                    <option value="Tasty Treat">Tasty Treat</option>
                                    <option value="The Logikal Choice">The Logikal Choice</option>
                                    <option value="The Neilsen Group">The Neilsen Group</option>
                                    <option value="The Nielsen Group">The Nielsen Group</option>
                                    <option value="Time Tunnel">Time Tunnel</option>
                                    <option value="Tony Fenner">Tony Fenner</option>
                                    <option value="Tradestream">Tradestream</option>
                                    <option value="Transcat">Transcat</option>
                                    <option value="Transearch">Transearch</option>
                                    <option value="Treatment Action Campaign">Treatment Action Campaign</option>
                                    <option value="TSB Suga">TSB Sugar</option>
                                    <option value="Tullow Oil">Tullow Oil</option>
                                    <option value="Tunneling">Tunneling</option>
                                    <option value="TV NORD">T�V NORD</option>
                                    <option value="TV Nord (Pty) Ltd">T�V Nord (Pty) Ltd</option>
                                    <option value="TUV-NORD">TUV-NORD</option>
                                    <option value="UCT">UCT</option>
                                    <option value="Ukubona">Ukubona</option>
                                    <option value="UKZN">UKZN</option>
                                    <option value="UP 2 Solutions">UP 2 Solutions</option>
                                    <option value="UPSTREAM T.C/SASOL">UPSTREAM T.C/SASOL</option>
                                    <option value="Verang">Verang</option>
                                    <option value="Vindhya Systems">Vindhya Systems</option>
                                    <option value="Vindhya Sysytems">Vindhya Sysytems</option>
                                    <option value="Virgin Active">Virgin Active</option>
                                    <option value="Wooldridge College">Wooldridge College</option>
                                    <option value="ZF Auto Industrial">ZF Auto Industrial</option>
                                    <option value="Zimbali Lodge">Zimbali Lodge</option>
                                    <option value=" ">None</option>
                                    <option value="1">New</option>
                                </select>



                                <div id="txtHint"></div>                            </td>
                            <td>       </td>
                            <td>Referred By </td>
                            <td><input type="text" name="source_media" id="source_media" /></td>
                        </tr>
                        <tr>
                            <td>Business Unit </td>
                            <td><input type="text" name="business_unit" id="business_unit" /></td>
                            <td>&nbsp;</td>
                            <td>Responsible For Acc</td>
                            <td><input type="text" name="responsible_for_acc" id="responsible_for_acc" /></td>
                        </tr>
                        <tr>
                            <td>Hr Department</td>
                            <td><input type="text" name="hr_department" id="hr_department" /></td>
                            <td>&nbsp;</td>
                            <td>Previous Immigration Problems</td>
                            <td><a href="/products/" rel="up up"></a> <input type="radio" name="pip" value="Yes" />
Yes<br />
<input type="radio" name="pip" value="No" />
No</td>
                        </tr>
                        <tr>
                            <td>In Care Of </td>
                            <td><input type="text" name="in_care_of" id="in_care_of" /></td>
                            <td></td>
                            <td valign="top">Comments</td>
                            <td><textarea name="comments" id="comments"></textarea></td>
                        </tr>
                        <tr>
                            <td>Contact Number </td>
                            <td><input type="text" name="contact_no" id="contact_no" /></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><br/><input type="submit" name="Submit" value="Submit" class="login" />                            </td>
                        </tr>
                    </table>
                    <p>&nbsp;</p>
                   <p>&nbsp;</p>
        


                </form>
        </tr>
    </table>
</div>
