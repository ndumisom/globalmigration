<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
    <tr><td>
            <h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> Reports </a></h2>
            <p>&nbsp;</p>
    <center>
        <a href="admin_index.php?m=reports" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> <b>Normal Report</b></a>
            <form action="admin_index.php?m=view_empty" method="post">
                <table border="0" width="750" cellspacing="1" cellpadding="3" 
                       bgcolor="#353535" align="center">
                    <tr>
                        <td bgcolor="#FFFFFF" width="30%">Permit status</td>
                        <td bgcolor="#FFFFFF" width="70%">

                            <select name="permit_status" id="level" >
                               
                               
                                <option value="Pending at DHA">Pending at DHA</option>
                                <option value="Pre-Submission">Pre-Submission</option>
                                <option value="Memo issued - Awaiting Documents">Memo issued - Awaiting Documents</option>
                                <option value="Finalised - Awaiting Copy of Permit">Finalised - Awaiting Copy of Permit</option>
                                <option value="Waivers Pending">Waivers Pending</option>
                                <option value="Memorandum Issued">Memorandum Issued</option>
                              
                            </select>


                        </td>
                    </tr>
                   
                  
                        <td bgcolor="#FFFFFF">Corporate</td>
                        <td bgcolor="#FFFFFF">
                            <select name="corporate" id="corporate" onChange="showUser(this.value)">
                                <option value="">Select</option>
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
                                <option value="Coleman Tunneling">Coleman Tunneling</option>
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
                                <option value="T�V NORD">T�V NORD</option>
                                <option value="T�V Nord (Pty) Ltd">T�V Nord (Pty) Ltd</option>
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
                                <option value="None">None</option>
                               


                            </select>



                            <div id="txtHint"></div>
                        </td>
                                
                            
                            </select>



                            <div id="txtHint"></div>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td bgcolor="#FFFFFF" colspan=2 align="center">
                            <input type="submit" name="Submit" value=" View " class="login"> 
                        </td>

                    </tr>
                </table>
            </form>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <p>&nbsp;</p>
    </td> </tr></table>
<p>&nbsp;</p>