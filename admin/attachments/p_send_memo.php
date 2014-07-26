<?php

session_start();



$con = mysql_connect('localhost', 'root', 'mapapa1531');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}


if (isset($_POST['send'])) {

    $q = $_GET["q"];
    $q = $_POST['permit'];
    $clientID = $_POST['id'];
    $to = $_POST['to'];
    $text = $_POST['text'];

    if ($q == "" || $q == NULL) {

        $_SESSION['error'] = "Pleas select a permit you wish to send!.";
        header("location:admin_index.php?m=send_memo&id=" . $clientID . "");
        exit;
    }



    mysql_select_db("globalmigration_db", $con);

    $sql = "SELECT * FROM doc_required";
    $query = mysql_fetch_array(mysql_query("SELECT * FROM  client_details WHERE clientID=" . $clientID . ""));
    $firstnames = $query['firstnames'];
    $surname = $query['surname'];

    $result = mysql_query($sql);
    $message = "<table><tr><td>";
    
    
    //Memo - Extension of Visitor's Permit - 11(1)(b)(i)
    if($q == 1){
        $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
    <p align='center'><strong>APPLICATION FOR  VISITOR PERMIT EXTENSION &ndash; SECTION 11(1)(b)(i)</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>$firstnames &nbsp;is required to complete and sign the first  page only. Complete residential address in South Africa</p>
    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1739 - Application form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'>$firstnames is required to sign at the section  &ldquo;Signature of Applicant&rdquo; only.&nbsp; </td>
  </tr>
  <tr>
    <td valign='top'>Clear copies of the title page of your passport  and your current valid permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>A letter from the Applicant stating the reason  for extending their stay in South    Africa</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>The dated letter may be typed or handwritten.</p></td>
  </tr>
  <tr>
    <td valign='top'>Proof of funds</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Recent personal bank statements / travelers  cheques confirming that you have sufficient funds to support yourself for the  duration of your stay in South    Africa</td>
  </tr>
  <tr>
    <td valign='top'>Valid airline ticket / electronic booking  confirmation </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Copy of an airline ticket or online booking is  required, confirming a proposed date of departure for yourself </td>
  </tr>
  <tr>
    <td valign='top'>Valid airline ticket </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames  </td>
    <td valign='top'><p>Kindly  provide us with proof of accommodation.&nbsp;  This can take the form of a Lease Agreement, or a letter from a friend  accepting full responsibility during the duration of your stay.&nbsp; <strong><em>Kindly include a copy of their South African  ID or passport title page</em></strong></p>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm your       instructions to assist and to represent you in an application for the       extension of your visitors permits in terms of Section 11(1)(b)(i) of the       Immigration Amendment Act, Act 19 of 2004.</li>
        <li>All forms must       be completed in <strong>black ink</strong>.</li>
        <li>On receiving the       necessary documentation we will compile the application and will submit       (together with the original passport) to the Department of Home Affairs. The       Department will not retain the passport while processing the application,       however, once the application have been finalised we will require the       passport again for endorsement purpose. We will keep you updated on the       status thereof. </li>
      </ul></td>
  </tr>
</table>
</body>
</html>";
    }
    
    
    
    //Memo - Visitor's Permit - 11(1)(b)(i)

    if ($q == 2) {
        $message.= "<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
    <p align='center'><strong>APPLICATION FOR  VISITOR PERMIT &ndash; SECTION 11(1)(b)(i)</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>$firstnames &nbsp;is required to complete and sign the first  page only. Complete residential address in South Africa</p>
    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740 - Application for change of condition form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'>$firstnames is required to sign at the section  &ldquo;Signature of Applicant&rdquo; only.&nbsp; </td>
  </tr>
  <tr>
    <td valign='top'>Clear copies of the title page of your passport  and your current valid permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>A letter from the $firstnames   stating the reason  for extending their stay in South Africa</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>The dated letter may be typed or handwritten.</p></td>
  </tr>
  <tr>
    <td valign='top'>Proof of funds</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Recent personal bank statements / travelers  cheques confirming that you have sufficient funds to support yourself for the  duration of your stay in South    Africa</td>
  </tr>
  <tr>
    <td valign='top'>Valid airline ticket / electronic booking  confirmation </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Copy of an airline ticket or online booking is  required, confirming a proposed date of departure for yourself </td>
  </tr>
  <tr>
    <td valign='top'>Valid airline ticket </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames  </td>
    <td valign='top'><p>Kindly  provide us with proof of accommodation.&nbsp;  This can take the form of a Lease Agreement, or a letter from a friend  accepting full responsibility during the duration of your stay.&nbsp; <strong><em>Kindly include a copy of their South African  ID or passport title page</em></strong></p>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm your       instructions to assist and to represent you in an application for the       extension of your visitors permits in terms of Section 11(1)(b)(i) of the       Immigration Amendment Act, Act 19 of 2004.</li>
        <li>All forms must       be completed in <strong>black ink</strong>.</li>
        <li>On receiving the       necessary documentation we will compile the application and will submit       (together with the original passport) to the Department of Home Affairs. The       Department will not retain the passport while processing the application,       however, once the application have been finalised we will require the       passport again for endorsement purpose. We will keep you updated on the       status thereof. </li>
      </ul></td>
  </tr>
</table>
";
    }

   if($q == 3){
       
       
   }
   
   
   //APPLICATION FOR EXTENSION OF A VISITOR PERMIT WITH AUTHORISATION TO WORK – SECTION 11(2)-Extention
   if($q == 4){
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
    <p align='center'><strong>APPLICATION FOR  EXTENSION OF A VISITOR PERMIT WITH AUTHORISATION TO WORK &ndash; SECTION 11(2)<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>To be completed and signed by yourself only on  page 1 (Part A).</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1739 &ndash; Application for Renewal of Existing  Permit </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'><p>You  are only required to complete her residential address in South Africa on page 1  and to sign on page 2 of this form.</p></td>
  </tr>
  <tr>
    <td valign='top'>A motivational letter from HOST </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> HOST </td>
    <td valign='top'><p>A  draft of this letter is attached. Please have an official representative of  HOST issue the letter on a letterhead of the company.</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Copy  of your extended Airline Ticket</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>A copy of your e-ticket will be sufficient. This  new date may not extend beyond 90 days from your current Visa expiry date.</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Certified  copy of your passport title page and Visitor&rsquo;s Visa (Entry stamp)</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>The ordinary copies that we received via email  are not sufficient for submission to the Department of Home Affairs.</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We       confirm HOST &rsquo;s instructions to assist and to represent you in your       application for an extension of a visitor&rsquo;s permit in terms of Section       11(2) of the Immigration Amendment Act, Act 19 of 2004, with authorization       to work for Host on the Meerkat II FT3 project for period until 27th       May 2010.</li>
        <li>All       forms must be completed in <strong>black       ink</strong>.</li>
        <li><strong><u>In light of the fact       that you will be leaving South Africa on the 19th March 210, kindly       ensure that the above requested documents reach our office by no later       than Thursday 25th February 2010 to enable us to prepare and       submit the application to the Department of Home Affairs timeously.</u></strong></li>
        <li>Please       ensure that on all documentation your names and surname are reflected as       they appear in your passport.<strong><u></u></strong></li>
        <li>On       receiving the necessary documentation we will compile the application and       will submit it on your behalf to the Department of Home Affairs in       Vereeniging. The Department will not require your passport while       processing the application, however, once the application has been       approved, you will be required to submit your passport to be Department       for endorsement purposes. We will endeavour to have your application       finalized before your departure. </li>
        <li></li>
      </ul></td>
  </tr>
</table>";
   }
   
   
   //APPLICATION FOR A VISITOR PERMIT WITH AUTHORISATION TO WORK – SECTION 11(2) [11(2).memo]
   if($q == 5){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
    <p align='center'><strong>APPLICATION FOR A VISITOR PERMIT WITH  AUTHORISATION TO WORK &ndash; SECTION 11(2)<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>To be completed and signed by yourself only on  page 1 (Part A).</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740 &ndash; Application for Change of Condition </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'><p>You  are only required to complete your residential address in South Africa on page  2 and to sign on page 3 of this form.</p></td>
  </tr>
  <tr>
    <td valign='top'>A motivational letter from Employer</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> Employer </td>
    <td valign='top'><p>A  draft of this letter is attached. Please have an official representative of Employer issue the letter on a  letterhead of the company.</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Certified  copy of the repatriation receipt / Letter of Undertaking from Employer</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>The receipt issued to you by the Embassy in  Zambia for the Deposit you lodged when you applied for your visa (if  applicable) / Letter of undertaking from Employer</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Certified  copy of title page of passport and Visitor&rsquo;s Visa</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>&nbsp;</td>
    <td valign='top'>The ordinary copies that we received via email  are not sufficient for submission to the Department of Home Affairs.</td>
  </tr>
  <tr>
    <td valign='top'><p>Flight Itinerary / Electronic ticket </p></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer/$firstnames </td>
    <td valign='top'><p>Copy  of an airline ticket or online booking is required, confirming Applicant&rsquo;s proposed  departure. </p></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We       confirm Employer&rsquo;s instructions       to assist and to represent you in your application for an extension of a       visitor&rsquo;s permit in terms of Section 11(2) of the Immigration Amendment       Act, Act 19 of 2004, with authorization to work for Employer for period of 3       months.</li>
           <li>All       forms must be completed in <strong><u>black       ink</u></strong><u>.</u></li>
           <li>Please       ensure that on all documentation your names and surname are reflected as       they appear in your passport.<strong><u></u></strong></li>
           <li>On       receiving the necessary documentation we will compile the application and       will submit it on your behalf to the Department of Home Affairs. The       Department will not require your passport while processing the       application, however, once the application has been approved, you will be       required to submit your passport to be Department for endorsement       purposes. We will endeavour to have your application finalized within the       30 working days as prescribed by the Immigration Act. </li>
        </ul></td>
  </tr>
</table>";
   }
   
   
   //APPLICATION FOR VISITOR PERMIT – SECTION 11(6)(b) - EMPLOYMENT/New 11(6)(b)-Employment to submit in RSA (Master Copy) 
   if($q == 6){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
    <p align='center'><strong>APPLICATION FOR </strong></a><strong>VISITOR PERMIT &ndash;  SECTION 11(6)(b) - EMPLOYMENT</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>Please only sign at &ldquo;Signature of person giving  power of attorney&rdquo; on page 1 (Part A) and complete your current residential  address. &nbsp;The form is attached.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740 Change of Conditions or Status form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'><p>You  are only required to sign and complete the &ldquo;Security and health questionnaire&rdquo;  and &ldquo;Signature of Applicant&rdquo; on page 3.<br>
Your  Employer needs to complete the highlighted sections on pg. 8 and 9. </p></td>
  </tr>
  <tr>
    <td valign='top'>Copy of passport title page and valid Temporary  Residence Permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>.</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Copy of your partner&rsquo;s RSA Identity Book</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Marriage  Certificate (in the case of a married applicant)</p>
    </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Divorce / Death certificates, if applicable</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>If either you or your partner have been married  previously, the divorce decree(s) and/or death certificate in respect of a  former spouse is required, if applicable.</td>
  </tr>
  <tr>
    <td valign='top'>Affidavit in Respect of Parties to a Spousal  Relationship</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>The  required Form is attached for ease of reference.</p>
    Note: <strong>PART A  (only) </strong>of this form (attached) must be completed and signed by yourself and  your partner, before a Commissioner of Oaths &ndash; You may approach any police  person or attorney to assist you in this regard.</td>
  </tr>
  <tr>
    <td valign='top'>Documentary proof of your and your partner&rsquo;s  spousal relationship (cohabitation and shared financial responsibilities).</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>This  can take the shape of a lease agreement for your home or proof of ownership of  the property, utility or other accounts or correspondence addressed to you  and/or your spouse respectively, reflecting the same residential address,  letters from friends and family confirming the relationship (a draft letter for  this purpose is attached) and any other documents which may serve to  substantiate the existence of your life partnership.</p></td>
  </tr>
  <tr>
    <td valign='top'>Letter of support from your partner</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Please have your partner sign and complete the  draft letter attached.</td>
  </tr>
  <tr>
    <td valign='top'>Letters from Friends and Family</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>A draft letter is attached as a guideline,  please include a certified copy of the <em>identity  document / passport title page</em> of the family member or friend</td>
  </tr>
  <tr>
    <td valign='top'>Medical Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To be completed by any medical doctor consequent  to a basic medical examination of yourself. This document must not be older  than 6 months at the time of submission of the application</td>
  </tr>
  <tr>
    <td valign='top'>Radiological Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>A Radiological Report  to be duly completed and signed by any radiologist consequent to chest x-rays  of yourself. This document must not be older than 6 months at  the time of submission of the application</td>
  </tr>
  <tr>
    <td valign='top'>Confirmation of offer of employment</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>A letter from your prospective employer or a  contract of employment confirming the position that you have been offered, the  name and address of the business or organisation and the salary you will be  receiving. </td>
  </tr>
  <tr>
    <td valign='top'><p>Police  Clearance Certificates from every country where you have resided for more than  a year since your 18th birthday, including South Africa</p></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames  </td>
    <td valign='top'><p>If these Police Clearance certificates are not  available at the time we are ready to submit the applications, a letter of undertaking  (draft letter attached) will suffice for these purposes. Police Clearance  certificates must then be submitted within 6 months.</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm your       instructions to assist and to represent you in your application for an       extension of your visitor permit in terms of Section 11(6)(b) of the       Immigration Amendment Act, Act 19 of 2004, on the basis of your life       partnership with a South African. </li>
           <li><strong>PLEASE be advised that all documents not       in the English language <u>must</u> be accompanied by a sworn English       translation. If you require assistance in this regard, please do not       hesitate to contact our office.</strong> </li>
           <li>All forms must       be completed in <strong>black ink</strong>.</li>
           <li>Please ensure       that on all the required documents your full name and surname are       reflected as they appear in your respective passport and ID documents.</li>
           <li>On receiving the       necessary documentation we will compile the application and will submit it       on your behalf (together with your original passport) to the Department of       Home Affairs. The Department will not retain your passport while       processing the application. Once the application we will notify you       immediately and make the necessary arrangements for the endorsement.</li>
           <li>Please courier       all documentation for processing of your application by a reliable means       such as courier to our offices at <strong>Global       Migration SA, 2nd Floor LG Building, 1 Thibault Square, Long       Street, Cape Town 8000 </strong></li>
        </ul></td>
  </tr>
</table>";
   }
   
   
   //APPLICATION FOR VISITOR PERMIT – SECTION 11(6)(b) - EMPLOYMENT / 11(6)(b)-Employment to submit in RSA
   if($q == 7){
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
    <p align='center'><strong>APPLICATION FOR </strong></a><strong>VISITOR PERMIT &ndash;  SECTION 11(6)(b) - EMPLOYMENT</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>Please only sign at &ldquo;Signature of person giving  power of attorney&rdquo; on page 1 (Part A). The form is attached.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740 Change of Conditions or Status form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'><p>$firstnames  is only required to  sign and complete the &ldquo;Security and health questionnaire&rdquo; and &ldquo;Declaration by  applicant&rdquo; on page 3</p></td>
  </tr>
  <tr>
    <td valign='top'>Copy of passport title page and valid Temporary  Residence Permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>.</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Copy of RSA Identity Book or Passport</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td valign='top'><p>BI &ndash; 1712A Affidavit in Respect of Parties to a  Spousal Relationship</p>    </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames  &amp; Spouse/Life Partner</td>
    <td valign='top'><strong>PART A (only) </strong>of  this form (attached) must be completed and signed by $firstnames and Spouse/Life Partner, before a Commissioner of  Oaths &ndash; You may approach any SAPS or attorney to assist you in this regard. </td>
  </tr>
  <tr>
    <td valign='top'>Letter of support from yourself</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Spouse/Life Partner</td>
    <td valign='top'>Please sign and complete the draft letter  attached.</td>
  </tr>
  <tr>
    <td valign='top'>Documentary proof of your and your partner&rsquo;s  spousal relationship (cohabitation and shared financial responsibilities).</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames &amp; Spouse/Life Partner</td>
    <td valign='top'><p>This can take the shape of a lease agreement for  your home or proof of ownership of the property, utility or other accounts or  correspondence addressed to $firstnames  and/or Spouse/Life  Partner respectively, reflecting the same residential address, letters  from friends and family confirming the relationship (a draft letter for this  purpose is attached) and any other documents which may serve to substantiate  the existence of your life partnership.</p>
    </td>
  </tr>
  <tr>
    <td valign='top'>Medical Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>To be completed by any medical doctor consequent  to a basic medical examination of $firstnames. Must not be older than 6 months at the time of  submission of the application</p></td>
  </tr>
  <tr>
    <td valign='top'>Radiological Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To be completed by a radiologist consequent to  x-ray examination of $firstnames. Must not be older than 6 months at the time of submission of  the application</td>
  </tr>
  <tr>
    <td valign='top'>Confirmation of offer of employment</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>A letter from $firstnames &rsquo;s prospective employer or a contract of  employment confirming the position he/she has been offered, the name and address of  the business or organisation and the salary he/she will be receiving. </td>
  </tr>
  <tr>
    <td valign='top'><p>Police  Clearance Certificates for your wife from every country where she has resided  for more than a year since her 18th birthday, including South  Africa, if applicable</p></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>If these Police Clearance certificates are not  available at the time we are ready to submit the applications, a letter of  undertaking (draft letter  attached) will suffice for these purposes. Police Clearance certificates  must then be submitted within 6 months.</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm your       instructions to assist and to represent in his/her application for a visitor permit in       terms of Section 11(6)(b) of the Immigration Amendment Act, Act 19 of       2004, on the basis of her life partnership with yourself.</li>
           <li><strong>PLEASE be advised that all documents not       in the English language <u>must</u> be accompanied by a sworn English       translation. If you require assistance in this regard, please do not       hesitate to contact our office.</strong> </li>
           <li>All forms must       be completed in <strong>black ink</strong>.</li>
           <li>Please ensure       that on all the required documents your full name and surname are       reflected as they appear in your respective passport and ID documents.</li>
           <li>In light of the       expiry of $firstnames &rsquo;s current       visitor permit on DATE,       please ensure that all the required documentation reach our office by no       later than DATE.</li>
           <li>On receiving the       necessary documentation we will compile the application and will submit it       on your behalf (together with your original passport) to the Department of       Home Affairs in Cape Town. The Department will not retain your passport       while processing the application. It should take approximately 30 days for       the application to be processed by the Department of Home Affairs, but we       will keep you updated regularly as to their progress. We will inform you       of any delays immediately. Once the application has been approved we will       require your passport again for endorsement purposes..</li>
        </ul></td>
  </tr>
</table>";
   }

   
   if($q == 8){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR </strong></a><strong>VISITOR PERMIT &ndash;  SECTION 11(6)(b) &ndash; CONDUCT OWN BUSINESS</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>Please only sign at &ldquo;Signature of person giving  power of attorney&rdquo; on page 1 (Part A). The form is attached.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740 Change of Conditions or Status form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'><p>$firstnames is only required to  sign and complete the &ldquo;Security and health questionnaire&rdquo; and &ldquo;Declaration by  applicant&rdquo; on page 3</p></td>
  </tr>
  <tr>
    <td valign='top'>Copy of passport title page and valid Temporary  Residence Permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'><p>.</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Copy of RSA Identity Book or Passport</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td valign='top'><p>BI &ndash; 1712A Affidavit in Respect of Parties to a  Spousal Relationship</p>    </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames  &amp; Spouse/Life Partner</td>
    <td valign='top'><strong>PART A (only) </strong>of  this form (attached) must be completed and signed by $firstnames and Spouse/Life Partner, before a Commissioner of  Oaths &ndash; You may approach any SAPS or attorney to assist you in this regard. </td>
  </tr>
  <tr>
    <td valign='top'>Letter of support from yourself</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>pouse/Life Partner</td>
    <td valign='top'>Please sign and complete the draft letter  attached.</td>
  </tr>
  <tr>
    <td valign='top'>Documentary proof of your and your partner&rsquo;s  spousal relationship (cohabitation and shared financial responsibilities).</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames &amp; Spouse/Life Partner</td>
    <td valign='top'><p>This can take the shape of a lease agreement for  your home or proof of ownership of the property, utility or other accounts or  correspondence addressed to $firstnames and/or Spouse/Life  Partner respectively, reflecting the same residential address, letters  from friends and family confirming the relationship (a draft letter for this  purpose is attached) and any other documents which may serve to substantiate  the existence of your life partnership.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Medical Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>To be completed by any medical doctor consequent  to a basic medical examination of $firstnames. Must not be older than 6 months at the time of  submission of the application</p></td>
  </tr>
  <tr>
    <td valign='top'>Radiological Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To be completed by a radiologist consequent to  x-ray examination of $firstnames . Must not be older than 6 months at the time of submission of  the application</td>
  </tr>
  <tr>
    <td valign='top'>Police  Clearance Certificates for your wife from every country where she has resided  for more than a year since her 18th birthday, including South  Africa, if applicable</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>&nbsp;</td>
    <td valign='top'><p>If these Police Clearance certificates are not  available at the time we are ready to submit the applications, a letter of  undertaking (draft letter  attached) will suffice for these purposes. Police Clearance certificates  must then be submitted within 6 months.</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Proof of registration of the intended Business</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>A copy of the Registration document/s of your  Business. If the Business has not been registered yet, you may write a letter  to submit such proof within 6 months</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm your       instructions to assist and to represent in his/her application for a visitor permit in       terms of Section 11(6)(b) of the Immigration Amendment Act, Act 19 of 2004,       on the basis of her life partnership with yourself.</li>
        <li><strong>PLEASE be advised that all documents not       in the English language <u>must</u> be accompanied by a sworn English       translation. If you require assistance in this regard, please do not       hesitate to contact our office.</strong> </li>
        <li>All forms must       be completed in <strong>black ink</strong>.</li>
        <li>Please ensure       that on all the required documents your full name and surname are       reflected as they appear in your respective passport and ID documents.</li>
        <li>In light of the       expiry of $firstnames t&rsquo;s current visitor permit on DATE, please ensure that all the required       documentation reach our office by no later than DATE.</li>
        <li>On receiving the       necessary documentation we will compile the application and will submit it       on your behalf (together with your original passport) to the Department of       Home Affairs in Cape Town.       The Department will not retain your passport while processing the application.       It should take approximately 30 days for the application to be processed       by the Department of Home Affairs, but we will keep you updated regularly       as to their progress. You will be informed of any delays immediately. Once       the application has been approved we will require your passport again for       endorsement purposes.</li>
      </ul></td>
  </tr>
</table>";
       
   }
   
   
   // APPLICATION FOR VISITOR PERMIT – SECTION 11(6)(b) - STUDY
   if($q == 9){
       
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR </strong></a><strong>VISITOR PERMIT &ndash;  SECTION 11(6)(b) - STUDY</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>Please only sign at &ldquo;Signature of person giving  power of attorney&rdquo; on page 1 (Part A). The form is attached.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740 Change of Conditions or Status form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'><p>$firstnames is only required to sign and complete the  &ldquo;Security and health questionnaire&rdquo; and &ldquo;Declaration by applicant&rdquo; on page 3</p></td>
  </tr>
  <tr>
    <td valign='top'>Copy of passport title page and valid Temporary  Residence Permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'><p>.</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Copy of RSA Identity Book or Passport</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td valign='top'><p>BI &ndash; 1712A Affidavit in Respect of Parties to a  Spousal Relationship</p>    </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames  &amp; Spouse/Life Partner</td>
    <td valign='top'><strong>PART A (only) </strong>of  this form (attached) must be completed and signed by $firstnames and Spouse/Life Partner, before a Commissioner of  Oaths &ndash; You may approach any SAPS or attorney to assist you in this regard. </td>
  </tr>
  <tr>
    <td valign='top'>Letter of support from yourself</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>pouse/Life Partner</td>
    <td valign='top'>Please sign and complete the draft letter  attached.</td>
  </tr>
  <tr>
    <td valign='top'>Documentary proof of your and your partner&rsquo;s  spousal relationship (cohabitation and shared financial responsibilities).</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames &amp; Spouse/Life Partner</td>
    <td valign='top'><p>This can take the shape of a lease agreement for  your home or proof of ownership of the property, utility or other accounts or  correspondence addressed to $firstnames and/or Spouse/Life  Partner respectively, reflecting the same residential address, letters  from friends and family confirming the relationship (a draft letter for this  purpose is attached) and any other documents which may serve to substantiate  the existence of your life partnership.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Medical Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>To be completed by any medical doctor consequent  to a basic medical examination of $firstnames. Must not be older than 6 months at the time of  submission of the application</p></td>
  </tr>
  <tr>
    <td valign='top'>Radiological Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To be completed by a radiologist consequent to  x-ray examination of $firstnames. Must not be older than 6 months at the time of submission of  the application</td>
  </tr>
  <tr>
    <td valign='top'>Acceptance Letter from study institution</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'><p>A letter from $firstnames&rsquo;s prospective Study Institution confirming  the Name and Duration of the Course to be followed. </p></td>
  </tr>
  <tr>
    <td valign='top'><p>Police  Clearance Certificates for your wife from every country where she has resided  for more than a year since her 18th birthday, including South  Africa, if applicable</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>If these Police Clearance certificates are not  available at the time we are ready to submit the applications, a letter of  undertaking (draft letter  attached) will suffice for these purposes. Police Clearance certificates  must then be submitted within 6 months.</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm your       instructions to assist and to represent in his/her application for a visitor permit in       terms of Section 11(6)(b) of the Immigration Amendment Act, Act 19 of       2004, on the basis of her life partnership with yourself.</li>
           <li><strong>PLEASE be advised that all documents not       in the English language <u>must</u> be accompanied by a sworn English       translation. If you require assistance in this regard, please do not       hesitate to contact our office.</strong> </li>
           <li>All forms must       be completed in <strong>black ink</strong>.</li>
           <li>Please ensure       that on all the required documents your full name and surname are       reflected as they appear in your respective passport and ID documents.</li>
           <li>In light of the       expiry of $firstnames &rsquo;s current       visitor permit on DATE,       please ensure that all the required documentation reach our office by no       later than DATE.</li>
           <li>On receiving the       necessary documentation we will compile the application and will submit it       on your behalf (together with your original passport) to the Department of       Home Affairs in Cape Town. The Department will not retain your passport       while processing the application. It should take approximately 30 days for       the application to be processed by the Department of Home Affairs, but we       will keep you updated regularly as to their progress. We will inform you       of any delays immediately. Once the application has been approved we will       require your passport again for endorsement purposes.</li>
      </ul></td>
  </tr>
</table>";
       
   }
   
   
   //New 13 Study permit with SA guardian, parents abroad
   if($q == 10){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
    <p align='center'><strong>APPLICATION FOR A STUDY PERMIT<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>To    be completed and signed by $firstnames only on page 1 (Part A)</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740    Change of Conditions or Status form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'>$firstnames is <u>only</u> required to sign and complete the &ldquo;Security and Health    Questionnaire&rdquo; and &ldquo;Declaration by Applicant&rdquo; on page 3 of this form.</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'>To    be completed by any medical doctor consequent to a basic medical examination    of $firstnames. This document must not be older than 6 months at the time of    submission of the application.</td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>To    be completed by a radiologist consequent to a chest x-ray examination of $firstnames. This document must not be older than 6 months at the time of    submission of the application.</p></td>
  </tr>
  <tr>
    <td valign='top'>A    letter from the Language Lab in Johannesburg</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>.This letter must be issued on a letterhead of the    institution by one of its official representatives. Please ensure that the    letter indicates that $firstnames has been provisionally enrolled, the    nature/name of the course of study he will be following as well as the    duration of the course</td>
  </tr>
  <tr>
    <td valign='top'>Proof of medical cover </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Proof of medical cover with a medical scheme    registered in South Africa or another medical aid/insurance that is    recognized in South Africa, clearly showing that $firstnames is a    beneficiary of the policy and covered in South Africa</td>
  </tr>
  <tr>
    <td valign='top'>A    letter of consent from $firstnames&rsquo;s parents</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>A    letter of consent is required from $firstnames&rsquo;s parents confirming that    they are aware that he is in South Africa and that he intends to take up    studies at the Language Lab in Johannesburg. This letter must also confirm    that they appoint you as $firstnames&rsquo;s guardian for the duration of his stay    in South Africa.&nbsp; A clear certified    copy of $firstnames&rsquo;s full unabridged birth certificate should be attached to    this letter.</td>
  </tr>
  <tr>
    <td valign='top'>Proof    of financial means</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Bank    statements for the past 3 months and a salary advice are required to show    that you have sufficient financial resources available to support $firstnames for the duration of his proposed stay in South Africa.</td>
  </tr>
  <tr>
    <td valign='top'>A    letter from yourself</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>A    draft of the required letter is attached. Please sign and complete the letter    in support of $firstnames&rsquo;s application.</td>
  </tr>
  <tr>
    <td valign='top'>A    certified copy of your South African ID document or clear certified copies of    the title page of your passport and current valid temporary or permanent    residence permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm           your instructions to assist and to represent your nephew, $firstnames in his application for a study permit in terms of           Section 13 of the Immigration Amendment Act, Act 19 of 2004.</li>
        <li><strong>PLEASE be advised that all documents           not in the English language <u>must</u> be accompanied by a sworn           English translation. If you require assistance in this regard, please           do not hesitate to contact our office.</strong> </li>
        <li>All forms           must be completed in <strong>black ink</strong>.</li>
        <li>On receiving           the necessary documentation, we will compile $firstnames&rsquo;s           application and will submit it on his behalf (together with his original           passport) to the Department of Home Affairs. The Department will not           retain his passport while processing the application. It may take           30-45 days for the application to be processed by the Department of           Home Affairs, but our office will keep you updated regularly as to           their progress. Once the application has been approved, we will           require the original passport again for endorsement purposes. </li>
      </ul></td>
  </tr>
</table>";
       
   }
   
   
   
   //APPLICATION FOR BUSINESS PERMIT 15.doc
   
   if($q == 11){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
    <p align='center'><strong>APPLICATION FOR BUSINESS PERMIT<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance Certificates for $firstnames from every country where he has resided    for more than a year since his 18th birthday</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>If    the Police Clearance Certificates are not available at the time we are ready    to submit the business permit applications, a letter of undertaking (draft    letter attached) will suffice for these purposes.&nbsp; Police Clearance must be submitted to the    Dept within 6 months</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Power    of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'>$firstnames must complete and sign only on page 1 (Part A) of this form.</td>
  </tr>
  <tr>
    <td valign='top'>BI-1740    Change of Conditions or Status form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'>This    form must be signed and completed by $firstnames only at the &ldquo;security and    health questionnaire&rdquo; and &ldquo;declaration by applicant&rdquo; on page 3</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>To    be completed by any medical doctor consequent to a basic medical examination    of $firstnames. Must not be older than 6 months at the time of submission of    the application</p></td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To    be completed by a radiologist consequent to an x-ray examination of $firstnames. Must not be older than 6 months at the time of submission</td>
  </tr>
  <tr>
    <td valign='top'>Letter    of undertaking &ndash; SARS Registration</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>$firstnames must please sign the attached draft letter confirming that the    business will be registered with the South African Revenue Services in due    course.<br />
(Even    though this may not be part of his responsibilities within the company, it is    a requirement of the Immigration Act and Regulations, and as such, must be    complied with)a</td>
  </tr>
  <tr>
    <td valign='top'>Letter    of undertaking &ndash; employment of citizens and residents</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>$firstnames must please sign the attached draft letter confirming that the business    will employ no less than 5 South African citizens and/or permanent residence    holders<br />
(Even    though this may not be part of his responsibilities within the company, it is    a requirement of the Immigration Act and Regulations, and as such, must be    complied with)</td>
  </tr>
  <tr>
    <td valign='top'>Business    Plan</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>A    copy of the Business Plan (as will be prepared for the applications of Dr    Kov&aacute;cs and Mrs Kov&aacute;csov&aacute;) describing the proposed business as well as    demonstrating the feasibility of the enterprise in the short and long term.</td>
  </tr>
  <tr>
    <td valign='top'>$firstnames&rsquo;s <em>Curriculum Vitae </em>and    reference letters</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>$firstnames&rsquo;s <em>Curriculum Vitae </em>must    demonstrate his relationship to Dr Kovacs&rsquo; business activities abroad and    must be supported by letters of reference, in particular a letter from Dr    Kov&aacute;cs setting out the reasons for giving $firstnames a share in the business    (without any actual financial investment on his part).</td>
  </tr>
  <tr>
    <td valign='top'>Chartered    Accountant&rsquo;s Certification</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>&nbsp;</td>
    <td valign='top'>A    draft letter is attached. Must be issued by a South African Chartered Accountant    (registered with SAICA).</td>
  </tr>
  <tr>
    <td valign='top'>Business    registration documents</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>CIPRO    documents confirming the registration of the business (as a company or close    corporation in South      Africa)</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm           your instructions to assist and to represent your nephew, $firstnames in his application for a study permit in terms of           Section 13 of the Immigration Amendment Act, Act 19 of 2004.</li>
        <li><strong>PLEASE be advised that all documents           not in the English language <u>must</u> be accompanied by a sworn           English translation. If you require assistance in this regard, please           do not hesitate to contact our office.</strong> </li>
        <li>All forms           must be completed in <strong>black ink</strong>.</li>
        <li>On receiving           the necessary documentation, we will compile $firstnames&rsquo;s           application and will submit it on his behalf (together with his original           passport) to the Department of Home Affairs. The Department will not           retain his passport while processing the application. It may take           30-45 days for the application to be processed by the Department of           Home Affairs, but our office will keep you updated regularly as to           their progress. Once the application has been approved, we will           require the original passport again for endorsement purposes. </li>
      </ul></td>
  </tr>
</table>";
       
   }
   
   
   //APPLICATION FOR A RELATIVE PERMIT (FATHER PERMANENT RESIDENT HOLDER)/ 18.doc
   if($q == 12){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
    <p align='center'><strong>APPLICATION FOR A RELATIVE PERMIT (FATHER    PERMANENT RESIDENT HOLDER)<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power    of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>To    be completed and signed by $firstnamesonly on page 1 (Part A). Please provide us    with your residential address in South Africa </p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740    Change of Conditions or Status application form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'>.$firstnamesis <u>only</u> required to sign and complete the &ldquo;security and health    questionnaire&rdquo; and &ldquo;declaration by applicant&rdquo; on page 3 of this form.</td>
  </tr>
  <tr>
    <td valign='top'><strong><u>Clear, certified    (true) copies</u></strong> of the title page of $firstnames&rsquo;s passport and valid Visitor&rsquo;s Permit in passport </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'>To    be completed by any medical doctor consequent to a basic medical examination    of $firstnames. This document must not be older than 6 months at the time of    submission of the application.</td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To    be completed by a radiologist consequent to a chest x-ray examination of $firstnames.    This document must not be older than 6 months at the time of submission of    the application.</td>
  </tr>
  <tr>
    <td valign='top'>Divorce    decree / Death certificate, if applicable</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>If    $firstnameshas previously been married, the divorce decree and/or death certificate    in respect of a former spouse is required.</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance certificates from <u>every</u> country where $firstnameshas resided for    more than a year since his 18th birthday <strong><u>including South Africa</u></strong></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>If    these Police Clearance Certificates are not available at the time we are    ready to submit $firstnames&rsquo;s application, a letter of undertaking (draft letter    attached), signed and completed by $firstnamestogether with proof that $firstnameshas    already applied for the respective Police Clearance Certificates, will    suffice for these purposes. <br />
Police    Clearances must then be submitted within 6 months.</td>
  </tr>
  <tr>
    <td valign='top'><strong><u>Clear, certified    (true) copy</u></strong> of $firstnames&rsquo;s full Birth certificate </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Birth    Certificate must mention both parents</td>
  </tr>
  <tr>
    <td valign='top'>Letter    of support from Mr. Herman van Loon ($firstnames&rsquo;s father</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>A    draft letter is attached for ease of reference.</td>
  </tr>
  <tr>
    <td valign='top'><strong><u>Clear, certified    (true) copy</u></strong> Herman van Loon&rsquo;s South African Identity Document</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'><strong><u>Clear, certified (true)    copy</u></strong> Herman van Loon&rsquo;s South African Permanent Residence Certificate</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>This    can take the form of bank statements from Mr &amp; Mrs Blumenthal for the    last three (3) months or a most recent salary advice from Mr Blumenthal    confirming that he has sufficient funds to support his wife whilst she    resides in South Africa </td>
  </tr>
  <tr>
    <td valign='top'>Proof    of funds - <br />
Recent    personal bank statements and or salary advice in respect of Herman van Loon</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>This    can take the form of bank statements from Herman van Loon ($firstnames&rsquo;s father)    personal bank account for the last three (3) months or most recent salary    advices, showing he has sufficient financial resources (calculated at    R5000.00 per month) confirming that he has sufficient funds to support $firstnameswhilst    he resides in South Africa</td>
  </tr>
  <tr>
    <td valign='top'>Repatriation    Guarantee</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Together    with $firstnames&rsquo;s Relative Permit application we will be required to lodge a Repatriation    Deposit of R9400.00 with the Department of Home Affairs in lieu of a plane    ticket, should the South African Government ever need to deport him. Such a    deposit is refundable should he obtain permanent residence or if he leaves South    Africa permanently. <br />
If    $firstnames has already lodged such a deposit with a previous application made to the    Department of Home Affairs or at a South African mission abroad, kindly    provide us with the original receipt issued to him in respect of this    deposit. If $firstnameshas not yet lodged such a deposit, the deposit needs to be    submitted with his application for a Relative Permit. An official Home    Affairs receipt will be issued to you for these funds which must be kept safe    in order to enable you to claim back these moneys in future. </td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm           Herman van Loon&rsquo;s instructions to assist and to represent $firstnames           in his application for a Relative Permit to reside with his South           African Permanent Resident Holder father in terms of Section 18 of the           Immigration Amendment Act, Act 19 of 2004.</li>
        <li><strong>PLEASE be advised that all documents           not in the English language <u>must</u> be accompanied by a sworn           English translation. If you require assistance in this regard, please           do not hesitate to contact our office.</strong> </li>
        <li>All forms           must be completed in <strong>black ink</strong>.</li>
        <li><strong><em>ALL           FORMS MUST BE COMPLETED IN BLACK INK.</em></strong></li>
        <li><strong><em>Please           ensure that on all the required documents, $firstnames&rsquo;s full name and surname           are reflected as they appear in his passport.</em></strong></li>
        <li><strong><u>Submission process:</u></strong> </li>
      </ul>
      <p> $firstnames must kindly forward all documentation      requested above to our offices <strong><u>by      reliable courier as soon as possible but no later than 17th June      2011</u>.</strong> The address to courier documents to / submit documents to in      person is as follows: <strong>Global      Migration SA, 2nd floor, LG Building, 1 Thibault Square, Cape      Town, 8001, South Africa.</strong></p>
      <ul type='disc'>
        <li>On receiving           all of the necessary documentation set out above (provided that the           documentation is complete and in the correct format), we will compile           the application and will submit it on $firstnames&rsquo;s behalf (together with his original           passport) to the Department of Home Affairs in Cape Town. Our office           will keep Herman van Loon and $firstnames updated as to the progress           of $firstnames&rsquo;s application. The Department will not retain $firstnames&rsquo;s passport           while processing his application, however, once his application has           been finalized, we will require his passport again for endorsement           purposes.</li>
      </ul>
      <ul type='disc'>
        <li></li>
      </ul>
    </td>
  </tr>
</table>";
       
   }
   
   
   
   //PPLICATION FOR A QUOTA WORK PERMIT / 19(1)submit in RSA
   if($q == 13){
       
       $message .="
           <table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR A QUOTA WORK PERMIT</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power    of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>You    must complete and sign this form only on page 1 (Part A). <em>Please be sure to provide your current    residential address in RSA.</em></p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740    Change of Conditions or Status application form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'><p>You    are required to complete the &ldquo;Security and Health Questionnaire&rdquo; and sign at    &ldquo;Signature of $firstnames&rdquo; on page 3.</p>
    <p></p></td>
  </tr>
  <tr>
    <td valign='top'>Letter of undertaking to register with the Computer Society of    South Africa</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'>Please sign the attached draft letter confirming your    undertaking to register with the Computer Society of South Africa. Further    information regarding the Computer Society and how to register with this    organization may be found on the following website: <a href='http://www.cssa.org.za'>www.cssa.org.za</a>.</td>
  </tr>
  <tr>
    <td valign='top'>Letters    of reference from previous employers <strong></strong></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'>These    letters are required to prove that you have at least 5 years of experience as    a <strong>Network and Support Professional</strong> in the Information and Communication Technology sector.</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance certificates from every country where you have resided for more    than a year since your 18th birthday </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>If    these Police Clearance certificates are not available at the time we are    ready to submit your work permit application, a letter of undertaking (draft    letter attached) signed and completed by yourself, will suffice for these    purposes. Police Clearance must then be submitted within 6 months of the    application. </td>
  </tr>
  <tr>
    <td valign='top'>Your    comprehensive CV</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Your    Qualification/s + transcripts</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>This    is required to apply for your SAQA certificate.</td>
  </tr>
  <tr>
    <td valign='top'>SAQA    evaluation certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Global Migration</td>
    <td valign='top'>We    will apply for this on your behalf. Please note that we have to wait &plusmn; 20    days for the SAQA certificate to be issued.</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>To    be completed by any medical doctor after a basic medical examination of yourself. <em>This document must not be older than 6    months at the time of submission of the application.</em></td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>To    be completed by a radiologist after a chest x-ray examination of yourself. <em>This document must not be older than 6 months    at the time of submission of the application.</em></td>
  </tr>
  <tr>
    <td valign='top'>Repatriation    Deposit</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames/Employer</td>
    <td valign='top'>If    you do not have an employer yet, you should lodge a Cash Deposit at the DHA.    If you already have an offer of Employment, the Employer may submit a Letter    of Undertaking to cover repatriation fees should the need arise.</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm           your instructions to assist and to represent you in your application           for a Quota Work Permit in terms of Section 19(1) of the Immigration           Amendment Act, Act 19 of 2004. </li>
        <li><strong>PLEASE be advised that all documents           not in the English language <u>must</u> be accompanied by a sworn           English translation. If you require assistance in this regard, please           do not hesitate to contact our office.</strong> </li>
        <li>All forms           must be completed in <strong>black ink</strong>.</li>
        <li><em>Please ensure that on all the           required documents your full names and surname are reflected <u>as           they appear in your passport</u>.</em></li>
        <li>Once all of           the necessary documentation is in our possession, we will compile the           application and will submit it on your behalf to the Department of           Home Affairs (DHA) (<strong>together           with your original passport</strong>). It may take in the region of 30 days           for the application to be processed by the DHA, but our office will           keep you updated regularly as to their progress. The DHA will not           retain your passport while processing the application, however, once           the application has been approved we will require your original           passport again for endorsement purposes.</li>
      </ul>
    </td>
  </tr>
</table>
";
       
       
   }
   
   //APPLICATION FOR AUTHORISATION TO TAKE UP STUDIES ON EXISTING WORK PERMIT/ 19(2)+partime studies.doc
   if($q == 14){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR A QUOTA WORK PERMIT</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>$firstnames    to sign this form only on page 1    (Part A). (Form attached)</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Application form BI-1740</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'><p>$firstnames    to sign on page 3 only.</p>
      <p>Employer to complete and sign the last section of page 9 only.</p>
    <p></p></td>
  </tr>
  <tr>
    <td valign='top'>Letter from Study Institution confirming your    provisional enrolmentv</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>This letter should confirm the following:</p>
      <ul type='disc'>
        <li>The         course-name of study</li>
        <li>The         duration of the course; and</li>
        <li>That         these studies are be part-time</li>
    </ul></td>
  </tr>
  <tr>
    <td valign='top'>Employer acknowledging their support for the $firstnames   &rsquo;s part-time studie</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> Employer </td>
    <td valign='top'>A    recently dated letter on Employer&rsquo;s    letterhead confirming that your part0time studies have been authorized.</td>
  </tr>
  <tr>
    <td valign='top'>Letter from Employer confirming employment </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'>We    attach a draft of this letter    to be issued by an official representative of Employer on official Letterhead confirming your full-time    employment.</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NO</u></p>
      <ul type='disc'>
        <li>We confirm           your instructions to assist and to represent $firstnames    in his application for           authorization to take up part-time studies while on a valid work           permit.</li>
        <li>All forms           must be completed in <strong>black ink</strong>.</li>
        <li><em>Please ensure that all documentation           reflect the $firstnames   &rsquo;s full names and surname as they appear in his/her           passport.</em></li>
        <li>On receiving           the necessary documentation we will compile the application and will           submit it (<strong>together with his           original passport</strong>) to the Department of Home Affairs. It may take           up to 30 days for the application to be processed by the Department of           Home Affairs, but our office will keep you updated regularly as to           their progress. The Department will not retain the passport while           processing the application, however once the application has been           approved we will require the passport again for endorsement purposes.</li>
      </ul>
    </td>
  </tr>
</table>";
       
   }
   
   
   //APPLICATION FOR A QUOTA WORK PERMIT 19(2)-submit in RSA
   
   
   if($q == 15){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR A QUOTA WORK PERMIT</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames   </td>
    <td valign='top'><p>Please    only sign at &ldquo;Signature of person giving power of attorney&rdquo; on page 1 (Part    A). The form is    attached.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740    Change of Conditions or Status form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames + Employer  </td>
    <td valign='top'><p>You    are required to complete the &ldquo;Security and Health Questionnaire&rdquo; and sign at    &ldquo;Signature of $firstnames   &rdquo; on page 3.</p>
      <p>An    official representative of Employer    must complete and sign the highlighted sections of the form on pages 8 and 9    (Part R). The form is    attached.</p>
    <p></p></td>
  </tr>
  <tr>
    <td valign='top'>Copy    of passport title page and valid permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>&nbsp;</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Advertisement    placed in a national newspaper</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Global Migration </td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Your    comprehensive CV</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Your    Qualifications and Transcripts</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>CVs    of all $firstnames   s responding to the advertisement, if any</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>Employer</td>
    <td valign='top'>Once    the closing date of the advertisement has passed, please have Employer provide us with    copies of the CVs of any individuals that applied (if any) + the reason(s)    why they were not suitable for the position</td>
  </tr>
  <tr>
    <td valign='top'>Letter    from Employer confirming    the results of the advertisement</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'><strong>Once the closing    date of the advertisement has passed, we will prepare this letter for your    prospective employer based on the results of the advertisement. </strong>The dated letter    must be signed by an official representative of the company and must be on a    letterhead (draft letter    attached).</td>
  </tr>
  <tr>
    <td valign='top'>Letter    of motivation from the Employer </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'>The    dated letter must be signed by an official representative of the company and    must be on a letterhead, clearly stating the reasons why the company    particularly wants to employ you (draft letter attached). <strong>Please    ensure that this letter is dated after the closing date of the advertisement.</strong></td>
  </tr>
  <tr>
    <td valign='top'>Your    contract/offer of employment with Employe</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>Employer</td>
    <td valign='top'>The    contract must be signed by both parties (and initialed on every page). <strong>PLEASE ENSURE that the commencement date    is <em><u>after or &ldquo;subject to&rdquo;</u></em> the    approval of your work permit application and that the contract is dated <em><u>after</u></em> the closing date of the    advertisement.</strong></td>
  </tr>
  <tr>
    <td valign='top'>Letter    of undertaking from Employer    in respect of repatriation and compliance with the Immigration Act</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'>A    draft of the appropriate letter is attached. This dated letter must be issued    by an official representative of the company on a letterhead (draft letter attached). <strong>Please ensure that this letter is    dated <em><u>after</u></em> the closing date    of the advertisement.</strong></td>
  </tr>
  <tr>
    <td valign='top'>Proof    of the company&rsquo;s registration</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'>Documentation    (such as official CIPRO and/or SARS documents) confirming the registration of    &nbsp;Employer as a business enterprise in South Africa,    is required for these purposes</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>To    be completed by any medical doctor after a basic medical examination of    yourself. <em>This document must not be    older than 6 months at the time of submission of the application.</em> </td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>To    be completed by a radiologist after a chest x-ray examination of yourself. <em>This document must not be older than 6    months at the time of submission of the application.</em></td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance certificates from every country where you have resided <u>for more    than a year </u>since your 18th birthday</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>If    the Police Clearance certificates are not available at the time we are ready    to submit your work permit application, a letter of undertaking (draft letter attached)    signed and completed by yourself, will suffice for these purposes. Police    Clearance must then be submitted within 6 months of the application. <em>Please also indicate whether you    previously submitted a Police Clearance certificate to the Department of Home    Affairs or a mission abroad with a previous application. </em></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NO</u></p>
      <ul type='disc'>
        <li>We confirm           your instructions to assist and to represent you in your application           for a General Work Permit in terms of Section 19(2) of the Immigration           Amendment Act, Act 19 of 2004.</li>
        <li><strong>PLEASE be advised that all documents           not in the English language <u>must</u> be accompanied by a sworn           English translation. If you require assistance in this regard, please           do not hesitate to contact our office. A separate Invoice will be           issued for such service.</strong> </li>
        <li>All forms           must be completed in <strong>black ink</strong>.</li>
        <li><strong>Please ensure that on all the           required documents your full name and surname are reflected <u>as they           appear in your passport</u>.</strong></li>
        <li>In light of           the expiry of  $firstnames   &rsquo;s current           visitor permit on DATE,           please ensure that all the required documentation reach our office by           no later than DATE.<strong> </strong></li>
        <li>On receiving           all of the necessary documentation, including those that can only be           prepared after the closing date of the advertisement, we will compile           your application and will submit it on your behalf to the Department           of Home Affairs (DHA) in Cape Town           (<strong>together with your original           passport</strong>). It may take in the region of 30 days for the           application to be processed by the DHA, but our office will keep you           updated regularly as to their progress. We will notify you of any           delays at the DHA immediately. The DHA will not retain your passport           while processing the application, however, once the application has           been approved we will require your original passport again for           endorsement purposes.</li>
        <li></li>
      </ul>
    </td>
  </tr>
</table>";
   }
   
   
   //APPLICATION FOR EXCEPTIONAL SKILLS WORK PERMIT / 19(4)-submit in RSA.doc
   
   if($q == 16){
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='cente'><strong>APPLICATION FOR EXCEPTIONAL SKILLS    WORK PERMIT<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power    of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames   </td>
    <td valign='top'><p>Please    only sign at &ldquo;Signature of person giving power of attorney&rdquo; on page 1 (Part    A). The form is attached.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740    Application form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames &amp; Employer  </td>
    <td valign='top'><p>You    are required to complete the &ldquo;Security and Health Questionnaire&rdquo; and sign at    &ldquo;Signature of $firstnames &rdquo; on page 3.</p>
      <p>An    official representative of Employer    must complete and sign the highlighted sections of the form on pages 8 and 9    (Part R). The form is    attached.</p>
    <p></p></td>
  </tr>
  <tr>
    <td valign='top'>Clear,    certified copies of your passport title page and your current valid permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>The    ordinary scanned copies we have received will not suffice for submission of    your application.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Qualifications</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Certified    copies of your qualifications (Degrees, etc)</td>
  </tr>
  <tr>
    <td valign='top'>Publications</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Copies    of a selection of your published work.</td>
  </tr>
  <tr>
    <td valign='top'>Testimonials</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Testimonials    are required as further confirmation of your exceptional skills, particularly    setting out the impact of your work in the environments where you have    worked. These may also be letters from your peers, such as recognized    academics in your field or those with whom you have collaborated with in    published research.</td>
  </tr>
  <tr>
    <td valign='top'>A    letter from a foreign or South African organ of State or an established South    African cultural, business or academic body</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>This    letter must be on a letterhead of the issuing organization/institution and    must <strong>confirm your exceptional skills</strong> in your field of expertise as well as your professional achievements. It is    also important that they highlight not only your &ldquo;exceptional skills&rdquo;, but    also how these <strong>skills will be of    benefit to South Africa</strong>. For these purposes, you may choose to approach,    for example, a foreign University where you have or had tenure. <br />
      <em>Please note that the University of Cape Town cannot issue    this letter due to the fact that they have offered you employment</em><em>.</em> </td>
  </tr>
  <tr>
    <td valign='top'>Your    comprehensive <em>Curriculum Vitae</em></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>The    copy we have on record is sufficient.</td>
  </tr>
  <tr>
    <td valign='top'>Your    contract/offer of employment with Employer</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames &amp; Employer</td>
    <td valign='top'>A    copy of your contract/offer of employment with Employer, duly signed by both parties and    initialled on every page.</td>
  </tr>
  <tr>
    <td valign='top'>A    letter of undertaking from Employer</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'>An    official representative of Employer    must issue this letter (draft attached).</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>To    be completed by any medical doctor after a basic medical examination of yourself.    This document must not be older than 6 months at the time of submission of    the application. The form is    attached.</td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>To    be completed by a radiologist consequent to chest x-ray examinations of<strong> yourself and your wife <u>only</u></strong>.    This document must not be older than 6 months at the time of submission of    the applications. <em>Radiological reports    are not required in respect of children under the age of 12.</em> The form is attached.</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance certificates for <strong>yourself</strong> from <u>every</u> country where you have resided for more than a year since    your 18th birthday</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>f    these Police Clearance Certificates are not available at the time we are    ready to submit your work permit application, a letter of undertaking (draft    letter attached), signed and completed by yourself, will suffice for these    purposes.&nbsp; Police Clearances must then    be submitted within 6 months.</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We             confirm that we have received instructions from The Employer to             assist and to represent you in your application for an Exceptional Skills             Work Permit in terms of Section 19(4) of the Immigration Amendment             Act, Act 19 of 2004. </li>
        <li><strong>PLEASE be             advised that all documents not in the English language <u>must</u> be accompanied by a sworn English translation. If you require             assistance in this regard, please do not hesitate to contact our             office.</strong> </li>
        <li>All             forms must be completed in <strong>black             ink</strong>.</li>
        <li>Please             ensure that on all of the necessary documentation, full names and             surnames are reflected as they appear in your passports. </li>
        <li>We             note that submission of your application will take place at the Department             of Home Affairs (DHA) in Cape Town. We will provide clear details as             to the submission process once your application is ready for             submission. Once we have received <strong><u>all</u></strong> the required documentation, we will prepare             your application for submission and advise you further.</li>
      </ul>
    </td>
  </tr>
</table>";
   }
   
   
   
   //APPLICATION FOR EXCEPTIONAL SKILLS WORK PERMIT/ 19(4)-wife & child submit in Abroad
   if($q == 17){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR EXCEPTIONAL SKILLS    WORK PERMIT<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "; and family </p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power    of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames   </td>
    <td valign='top'><p>Please    only sign at &ldquo;Signature of person giving power of attorney&rdquo; on page 1 (Part    A). The form is attached.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1738    Application for a Temporary Residence Permit form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames &amp; Employer  </td>
    <td valign='top'><p>You    are required to sign and complete sections 1 &ndash; 4 and 7 &ndash; 11 of this form (on    pages 2-5).</p>
    <p>An    official representative of Employer    must complete and sign the section of Part P on page 9 as well as the    &ldquo;Declaration by Employer&rdquo; on page 11.</p></td>
  </tr>
  <tr>
    <td valign='top'>BI-84    Visa Application form&nbsp; <strong>x 2</strong></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>Please    print this form&nbsp; out <u>twice</u>.    Please have your wife complete and sign one of these forms for herself. You    are required to complete and sign the other form on behalf of your child.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Two    passport-sized photographs each of yourself,&nbsp;    your wife, and your child</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Clear,    certified (or notarized) true copies of the title pages of the valid    passports for yourself, your wife and your child</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>The    ordinary scanned copies we have received will not suffice for submission of    your application.</td>
  </tr>
  <tr>
    <td valign='top'>Qualifications</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Certified    (or notarized) true copies of your qualification certificates.</td>
  </tr>
  <tr>
    <td valign='top'>Publications</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Copies    of a selection of your published research work.</td>
  </tr>
  <tr>
    <td valign='top'>Testimonials</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Testimonials    are required as further confirmation of your exceptional skills, particularly    setting out the impact of your work in the environments where you have    worked. These may also be letters from your peers, such as recognized    academics in your field or those with whom you have collaborated with in published    research.</td>
  </tr>
  <tr>
    <td valign='top'>A    letter from a foreign or South African organ of State or an established South    African cultural, business or academic body</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames &amp; Employer</td>
    <td valign='top'>This    letter must be on a letterhead of the issuing organization/institution and    must <strong>confirm your exceptional skills</strong> in your field of expertise as well as your professional achievements. It is    also important that they highlight not only your &ldquo;exceptional skills&rdquo;, but    also how these <strong>skills will be of    benefit to South Africa</strong>. For these purposes, you may choose to approach,    for example, a foreign University where you have or had tenure. <em>Please note that the University of Cape Town cannot issue this letter    due to the fact that they have offered you employment.</em></td>
  </tr>
  <tr>
    <td valign='top'>Your    comprehensive <em>Curriculum Vitae</em></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Your    contract/offer of employment with UCT</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames &amp; Employer </td>
    <td valign='top'>A    copy of your contract/offer of employment with Employer, duly signed by both parties and    initialled on every page.</td>
  </tr>
  <tr>
    <td valign='top'>A    letter of undertaking from UCT</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'>An    official representative of Employer    must issue this letter (draft attached).</td>
  </tr>
  <tr>
    <td valign='top'>Marriage    Certificate</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>A    clear, certified (or notarized) true copy of your marriage certificate,    confirming your marriage to your wife.</td>
  </tr>
  <tr>
    <td valign='top'>Full, <u>unabridged</u> birth certificates in respect of&nbsp; your child</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Clear,    certified copies of the full birth certificates for your three children are    required, showing the details of yourself and your wife as their parents.</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>To    be completed by any medical doctor consequent to basic medical examinations    of <strong>yourself, your wife and your child</strong>.    This document must not be older than 6 months at the time of submission of    the applications.</td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>To    be completed by a radiologist consequent to chest x-ray examinations of<strong> yourself and your wife <u>only</u></strong>.    This document must not be older than 6 months at the time of submission of    the applications. <em>Radiological reports    are not required in respect of children under the age of 12.</em></td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance certificates for <strong>yourself</strong> from <u>every</u> country where you have resided for more than a year since    your 18th birthday</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>If    these Police Clearance Certificates are not available at the time we are    ready to submit your work permit application, a letter of undertaking (draft    letter attached), signed and completed by yourself, will suffice for these    purposes.&nbsp; Police Clearances must then    be submitted within 6 months.</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance certificates for <strong>your wife</strong> from <u>every</u> country where she has resided for more than a year since    her 18th birthday</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>If    these Police Clearance Certificates are not available at the time we are    ready to submit your work permit application, a letter of undertaking (draft    letter attached), signed and completed by your wife, will suffice for these    purposes.&nbsp; Police Clearances must then    be submitted within 6 months.</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We           confirm that we have received instructions from The Employer to           assist and to represent you in your application for an exceptional           skills work permit in terms of Section 19(4) of the Immigration           Amendment Act, Act 19 of 2004, as well as to assist and to represent           your family in their visitor visa applications to accompany you to           South Africa. Please note that should you wish to enrol your children           in a school once you and your family have arrived and settled in South           Africa, their visitor visas can be changed (on application) to study           permits authorising them to study at a school or other institution in South           Africa. </li>
        <li><strong>PLEASE be advised that all           documents not in the English language <u>must</u> be accompanied by a           sworn English translation. If you require assistance in this regard,           please do not hesitate to contact our office.</strong> </li>
        <li>All           forms must be completed in <strong>black           ink</strong>.</li>
        <li>Please           ensure that on all of the necessary documentation, full names and           surnames are reflected as they appear in your and your family&rsquo;s           passports. </li>
        <li>We           note that submission of your application will take place at the South           African mission closest to you in Country. We will provide clear details as           to the submission process once your application is ready for           submission. Once we have received <strong><u>all</u></strong> the required documentation, we will prepare your application for           submission and advise you further.</li>
        </ul>
    </td>
  </tr>
</table>";
   }
   
   
   
   //APPLICATION FOR EXCEPTIONAL SKILLS WORK PERMIT/ 19(4)-submit abroad.doc
   if($q == 18){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR EXCEPTIONAL SKILLS    WORK PERMIT<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname." ; </p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power    of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames   </td>
    <td valign='top'><p>To    be completed and signed by yourself only on page 1 (Part A).<br />
(Form attached) </p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1738    Application for a Temporary Residence Permit form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames &amp; Employer  </td>
    <td valign='top'><p>&nbsp;</p>
    <p>You    are required to sign and complete sections 1 &ndash; 4 and 7 &ndash; 11 of this form (on    pages 2-5).<br />
An    official representative of &nbsp;EMPLOYER must    complete and sign the &ldquo;Declaration by Employer&rdquo; on page 11.<br />
(Form attached) </p></td>
  </tr>
  <tr>
    <td valign='top'>A    clear, certified (or notarized) true copy of the title page of your valid    passport </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>The    ordinary copy we have received will not suffice for submission of the    application</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Two    passport-sized photographs of yourself</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Qualifications</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Your    comprehensive <em>Curriculum Vitae</em></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Certified    (or notarized) true copies of your qualification certificates.</td>
  </tr>
  <tr>
    <td valign='top'>Publications</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Testimonials</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Please    provide copies of your publication(s), (as they appear in published form in    the public domain).</td>
  </tr>
  <tr>
    <td valign='top'>A    letter from a foreign or South African organ of State or an established South    African cultural, business or academic body in support of your work permit    application</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Testimonials    are required as further confirmation of your exceptional skills, particularly    setting out the impact of your work and research in the environments where    you have worked. These may also be letters from your peers, such as    recognized academics in your field or those with whom you have collaborated    in published research.</td>
  </tr>
  <tr>
    <td valign='top'>A    letter of undertaking from &nbsp;EMPLOYER </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'>An    official representative of &nbsp;EMPLOYER must issue    this letter (draft    attached).</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To    be completed by any medical doctor consequent to a basic medical examination    of yourself. This document must not be older than 6 months at the time of    submission of the application. (Form attached)</td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To    be completed by a radiologist consequent to a chest x-ray examination of    yourself. This document must not be older than 6 months at the time of submission    of the application. (Form    attached)</td>
  </tr>
  <tr>
    <td valign='top'>Divorce    / Death certificates, if applicable</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>If    you have been married previously, the divorce decree and/or death certificate    in respect of a former spouse will be required, if applicable.</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance certificates for yourself from every country where you have resided    for more than a year since your 18th birthday</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'><p>If    these Police Clearance Certificates are not available at the time we are    ready to submit your work permit application, a letter of undertaking (draft letter attached)    , signed and completed by yourself (together with proof that you have applied    for the relevant clearance certificates), will suffice for these    purposes.&nbsp; Police Clearances must then    be submitted within 6 months.</p>
    <p>Please note that    Police Clearance in respect of the USA must be issued by the FBI (<a href='http://www.fbi.gov/hac/cjisd/frequest.htm'>www.fbi.gov/hac/cjisd/frequest.htm</a>)    and not by the respective state(s) where you have resided. </p></td>
  </tr>
  <tr>
    <td valign='top'>Postal    Money Order or Certified Bank Cheque made out to the South African Consulate    General</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>SPECIAL    NOTE: In order to facilitate submission of the application at the South    African Consulate General in New York,    kindly include a    postal money order or a certified bank cheque in the amount of 271 US Dollars    ($255 for your work permit application and $16 for the return courier    delivery of your passports). This postal money order or certified bank    cheque must be made out to the &ldquo;South African Consulate General&rdquo; </td>
  </tr>
  <tr>
    <td valign='top'>A    certified (or notarized) copy of your USA residence permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>To    enable submission of the application at the South African Consulate-General    in New York, documentation confirming your    lawful residence in the USA    is required.</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We           confirm that we have received instructions from EMPLOYER to assist           and to represent you in your application for an exceptional skills           work permit in terms of Section 19(4) of the Immigration Amendment           Act, Act 19 of 2004.</li>
        <li><strong>PLEASE be advised that all           documents not in the English language <u>must</u> be accompanied by a           sworn English translation. If you require assistance in this regard,           please do not hesitate to contact our office.</strong> </li>
        <li>All           forms must be completed in <strong>black           ink</strong>.</li>
        <li>Please           ensure that on all of the necessary documentation, your full names and           surnames are reflected <u>as they appear in your passport</u>. </li>
        <li><strong><u>Submission           process:</u></strong> </li>
      </ul>
      <p>We will request      the documents that are the responsibility of EMPLOYER directly from them, however, kindly      forward all other documentation requested above to our offices <strong><u>by courier</u></strong> at your earliest      opportunity, but at least 4-6 weeks prior to your intended arrival in South Africa.      The address to courier documents to is as follows: <strong>Global Migration SA, 2nd floor, LG Building, 1 Thibault Square, Cape Town, 8001, South Africa.</strong></p>
      <p>On receiving all      of the necessary documentation set out above (provided that the      documentation is complete and in the correct format), we will compile the      application. The application will then be forwarded to you by courier for      submission to the South African Consulate General in CITY together with your      passport. We will provide further detailed instructions as to the      submission process once we are in receipt of the required documentation. We      expect that it may take in the region of 15-30 days for the application to      be processed once submitted to the Consulate General in CITY, but our office will      keep you updated once we are in communication with the mission regarding      the application. </p>
      <ul type='disc'>
        <li></li>
      </ul>
    </td>
  </tr>
</table>";
       
       
   }
   
   
   //APPLICATION FOR EXCEPTIONAL SKILLS WORK PERMIT / 19(5) submit abroad
   if($q == 19){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR EXCEPTIONAL SKILLS    WORK PERMIT<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . " </p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power    of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames   </td>
    <td valign='top'><p>Please    only sign at &ldquo;Signature of person giving power of attorney&rdquo; on page 1 (Part    A). The form is attached. </p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1738    Change of Conditions or Status form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames &amp; Employer  </td>
    <td valign='top'><p>The    applicant must complete Sections 1 &ndash; 10 and sign Section 11. </p>    
    <p>An    official representative of RSA Company must complete&nbsp; Part P of the form and sign at &ldquo;<strong>Declaration by Employer</strong>&rdquo; on the last    page of the form.</p></td>
  </tr>
  <tr>
    <td valign='top'>Clear <u>certified</u> copies of the title page of your passport as well as your    current visitor&rsquo;s permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>&nbsp;</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Your    contract of employment with Foreign Company</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Please    provide a copy of your present contract of employment with the Foreign    Company</td>
  </tr>
  <tr>
    <td valign='top'>A    letter from Foreign    Company<u></u></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>This    letter must be issued on a letterhead of the Foreign Company, by one of its official    representatives and must explain the details of your current employment with the Foreign Company,    the nature of the business and the reasons for wishing to transfer you to the RSA Company.</td>
  </tr>
  <tr>
    <td valign='top'>A    letter from RSA Company</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>This    letter must be issued on a letterhead of the RSA Company by one of its official    representatives and must confirm that you will be transferred from the Foreign Company to the RSA Company . It must    further specify the position you will take up in South Africa, the reasons    for the transfer and the expected value that will be gained from having you    at the RSA Company    office in South Africa.</td>
  </tr>
  <tr>
    <td valign='top'>Proof    of the affiliation between Foreign    Company and RSA Company</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Proof    of the company&rsquo;s registration</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Documentation    (such as official CIPRO and/or SARS documents) confirming the registration of the RSA Company as a    business enterprise in South Africa</td>
  </tr>
  <tr>
    <td valign='top'>Letter    of undertaking from RSA    Company</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>We    attach a draft of this letter. Please note that this letter must be issued on    a letterhead of the RSA    Company by one of its official representatives.</td>
  </tr>
  <tr>
    <td valign='top'>Your <em>Curriculum Vitae</em></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To    be completed by any medical doctor consequent to a basic medical examination    of yourself. This document must not be older than 6 months at the time of    submission of the application.</td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To    be completed by any radiologist consequent to a chest x-ray examination of    yourself. This document must not be older than 6 months at the time of    submission of the application.</td>
  </tr>
  <tr>
    <td valign='top'><u>Original</u> Police Clearance    certificate/s from every country where you have resided for more than a year    since your 18th birthday</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>If    the Police Clearance certificate/s are not available at the time we are ready    to submit your work permit application, a letter of undertaking (draft letter    attached) signed and completed by yourself, will suffice for these purposes.    Police Clearance Certificates must then be submitted within 6 months.</td>
  </tr>
  <tr>
    <td valign='top'>Clear,    certified copy of your marriage certificate (if applicable)</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'><p>&nbsp;</p>    </td>
  </tr>
  <tr>
    <td valign='top'>A    letter of support from your wife (if married)</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm your           instructions to assist and to represent you in your application for an           intra-company transfer work permit in terms of Section 19(5) of the           Immigration Amendment Act, Act 19 of 2004.</li>
        <li><strong>PLEASE be advised that all documents           not in the English language <u>must</u> be accompanied by a sworn           English translation. If you require assistance in this regard, please           do not hesitate to contact our office.</strong> </li>
        <li>All forms           must be completed in <strong>black ink</strong>.</li>
        <li>Please note           that you cannot sign any documentation <u>on behalf of the companies           involved in the transfer</u> for your work permit application. All           documentation will have to clearly evidence the relationship between           the companies.</li>
        <li><em>Please ensure that on all the           required documents your full names and surname are reflected as they           appear in your passport.</em></li>
        <li>On receiving           the necessary documentation we will compile the application and will           submit it on your behalf to the South African High Commission/Embassy           closest to you. It may take in the region of 15 - 30 days for the           application to be processed, but our office will keep you updated           regularly as to their progress.Once the application has been approved we will communicate with you to have your passport for endorsed.</li>
      </ul>      <p>&nbsp;</p></td>
  </tr>
</table>";
       
   }
   
   
   //APPLICATION FOR INTRA-COMPANY TRANSFER WORK PERMIT/ 19(5)
   if($q == 20){
       
       $message .= "<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR INTRA-COMPANY TRANSFER WORK    PERMIT</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . " </p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power    of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames   </td>
    <td valign='top'><p>Please    only sign at &ldquo;Signature of person giving power of attorney&rdquo; on page 1 (Part    A). The form is attached. </p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740    Change of Conditions or Status form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Mr. Applicant + RSA Company</td>
    <td valign='top'><p>You    are only required to complete the &ldquo;Security and Health Questionnaire&rdquo; and    sign at &ldquo;Signature of Applicant&rdquo; on page 3 of this form.</p>    
    <p>An    official representative of the    RSA Company must complete and sign at the highlighted sections of Part    R of the form (pages 8 and 9).</p></td>
  </tr>
  <tr>
    <td valign='top'>Clear <u>certified</u> copies of the title page of your passport as well as your    current visitor&rsquo;s permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>&nbsp;</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Your    contract of employment with Foreign Company</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Please    provide a copy of your present contract of employment with the Foreign    Company</td>
  </tr>
  <tr>
    <td valign='top'>A    letter from Foreign    Company<u></u></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Foreign Company  </td>
    <td valign='top'>This    letter must be issued on a letterhead of the Foreign Company, by one of its official    representatives and must explain the details of your current employment with the Foreign Company,    the nature of the business and the reasons for wishing to transfer you to the RSA Company.</td>
  </tr>
  <tr>
    <td valign='top'>A    letter from RSA Company</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>RSA Company </td>
    <td valign='top'>This    letter must be issued on a letterhead of the RSA Company by one of its official    representatives and must confirm that you will be transferred from the Foreign Company to the RSA Company . It must    further specify the position you will take up in South Africa, the reasons    for the transfer and the expected value that will be gained from having you    at the RSA Company office    in South Africa.</td>
  </tr>
  <tr>
    <td valign='top'>Proof    of the affiliation between Foreign    Company and RSA Company</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Foreign Company / RSA Company</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Proof    of the company&rsquo;s registration</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>RSA Company </td>
    <td valign='top'>Documentation    (such as official CIPRO and/or SARS documents) confirming the registration of the RSA Company as a    business enterprise in South Africa</td>
  </tr>
  <tr>
    <td valign='top'>Letter    of undertaking from RSA    Company</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>RSA Company </td>
    <td valign='top'>We    attach a draft of this letter. Please note that this letter must be issued on    a letterhead of the RSA Company    by one of its official representatives.</td>
  </tr>
  <tr>
    <td valign='top'>Your <em>Curriculum Vitae</em></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To    be completed by any medical doctor consequent to a basic medical examination    of yourself. This document must not be older than 6 months at the time of    submission of the application.</td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To    be completed by any radiologist consequent to a chest x-ray examination of yourself.    This document must not be older than 6 months at the time of submission of    the application.</td>
  </tr>
  <tr>
    <td valign='top'><u>Original</u> Police Clearance    certificate/s from every country where you have resided for more than a year    since your 18th birthday</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>If    the Police Clearance certificate/s are not available at the time we are ready    to submit your work permit application, a letter of undertaking (draft letter    attached) signed and completed by yourself, will suffice for these purposes.    Police Clearance Certificates must then be submitted within 6 months.</td>
  </tr>
  <tr>
    <td valign='top'>Clear,    certified copy of your marriage certificate (if applicable)</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'><p>&nbsp;</p>    </td>
  </tr>
  <tr>
    <td valign='top'>A    letter of support from your wife (if married)</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>&nbsp;</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Wife&rsquo;s    passport title page + valid permit (if applicable)</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm your           instructions to assist and to represent you in your application for an           intra-company transfer work permit in terms of Section 19(5) of the           Immigration Amendment Act, Act 19 of 2004.</li>
        <li><strong>PLEASE be advised that all documents           not in the English language <u>must</u> be accompanied by a sworn           English translation. If you require assistance in this regard, please           do not hesitate to contact our office.</strong> </li>
        <li>All forms           must be completed in <strong>black ink</strong>.</li>
        <li>Please note           that you cannot sign any documentation <u>on behalf of the companies           involved in the transfer</u> for your work permit application. We           further bring to your attention that we have taken your instructions           in this application on the basis that you will be able to provide the           necessary documentation required for this application. Should you           require assistance with the drafting of letters, please provide the           information required in the letters (as set out above) in detail so           that we may assist you</li>
        <li><em>Please ensure that on all the           required documents your full names and surname are reflected as they           appear in your passport.</em></li>
        <li>On receiving           the necessary documentation we will compile the application and will           submit it on your behalf to the Department of Home Affairs. It may           take in the region of 30 days for the application to be processed by           the Department of Home Affairs, but our office will keep you updated           regularly as to their progress. Once the application has been approved           we will require your original passport for endorsement purposes.</li>
      </ul>      
      <p>&nbsp;</p></td>
  </tr>
</table>";
       
   }
   //APPLICATION FOR CORPORATE WORKER PERMIT – COMPANY’s NAME/ 21+(dd) submit in RSA
   if($q == 21){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR CORPORATE WORKER PERMIT &ndash; COMPANY&rsquo;s NAME<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . " </p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power    of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames   </td>
    <td valign='top'><p>Please    only sign at &ldquo;Signature of person giving power of attorney&rdquo; on page 1 (Part    A). The form is attached.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740    Change of Conditions or Status form</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames  +  Company's Name </td>
    <td valign='top'><p>You    are required to complete and sign only the &ldquo;Security and Health    Questionnaire&rdquo; and &ldquo;Declaration by Applicant&rdquo; on page 3 of such form.</p>    
      <p>An    official representative of <strong>COMPANY&rsquo;s    NAME</strong> must complete and sign the highlighted sections of the form    on pages 8 and 9 (Part R).</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td valign='top'>2    x BI-1740 Change of Conditions or Status form (<strong>Spouse + child</strong>)</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p><u>Your    spouse</u> is required to complete and sign only the &ldquo;Security and Health Questionnaire&rdquo;    and &ldquo;Declaration by Applicant&rdquo; on page 3 of such form.</p>    
    <p>You    or your wife may <u>sign on behalf of your daughter</u> on her Form.</p></td>
  </tr>
  <tr>
    <td valign='top'>Clear <u>certified</u> copies of the title pages of your and your family&rsquo;s    respective passports as well as your current temporary residence permits</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>The    ordinary copies we currently have on file will not suffice for these    purposes. A local police station or post office can assist you in making the    necessary certified copies.</td>
  </tr>
  <tr>
    <td valign='top'>Clear    certified copies of your formal qualification(s)</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Contract    of Employment directly with <strong>COMPANY&rsquo;s    NAME</strong></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames &amp; Company's Name </td>
    <td valign='top'>The    contract must be signed by both parties and initialed on every page.</td>
  </tr>
  <tr>
    <td valign='top'>Letter    of undertaking from <strong>COMPANY&rsquo;s    NAME</strong></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Company's name </td>
    <td valign='top'>An    official representative of <strong>COMPANY&rsquo;s    NAME</strong> must sign and issue the letter on a letterhead of the    company.</td>
  </tr>
  <tr>
    <td valign='top'>A    clear certified copy of your marriage certificate confirming the facts of    your marriage to your wife</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>RSA Company </td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>RSA Company </td>
    <td valign='top'>To    be completed by any medical doctor consequent to basic medical examinations    of <strong>yourself, your wife and daughter</strong>.    This document must not be older than 6 months at the time of submission of    the applications.</td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Employer</td>
    <td valign='top'>To    be completed by a radiologist consequent to chest x-ray examinations in    respect of <strong>yourself and your wife</strong>.    This document must not be older than 6 months at the time of submission of    the applications.</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance Certificates for yourself from every country where you have resided    for more than a year since your 18th birthday, including South    Africa, if applicable</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>If these Police Clearance certificates are not    available at the time we are ready to submit your work permit application, a signed    and completed letter of undertaking (draft letter attached) will suffice for    these purposes. Police Clearance certificates must then be submitted within 6    months.</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance Certificates for your wife from every country where she has resided    for more than a year since her 18th birthday, including South    Africa, if applicable</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>If these Police Clearance certificates are not    available at the time we are ready to submit the applications, a letter of    undertaking signed and completed by your wife (draft letter attached) will    suffice for these purposes. Police Clearance certificates must then be submitted    within 6 months.</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm           that we have been instructed by <strong>COMPANY&rsquo;s NAME</strong> to assist and to           represent you in your application for a Corporate Worker permit in           terms of Section 21 of the Immigration Amendment Act, Act 19 of 2004.           We further confirm that we have received instructions to assist and to           represent your wife and child in their visitor permit applications to           continue to accompany you for the duration of your sojourn in South           Africa on your work permit.</li>
        <li><strong>PLEASE be advised that all documents           not in the English language <u>must</u> be accompanied by a sworn           English translation. If you require assistance in this regard, please           do not hesitate to contact our office.</strong> </li>
        <li>All forms           must be completed in <strong>black ink</strong>.</li>
        <li>Please           ensure that all documents reflect your full names and surnames as they           appear in your passports.</li>
        <li>On receiving           the necessary documentation we will compile the applications and will           submit them on your behalf to the Department of Home Affairs.<strong> </strong>The Department of Home           Affairs may take up to 30 days to process the applications, but our           office will keep you updated regularly as to their progress. Once the           application has been approved, we will advise you so that your and           your family&rsquo;s passports can be presented to the Department of Home           Affairs for endorsement of the new permits.</li>
      </ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
</table>";
   }
   
   
   //APPLICATION FOR PERMANENT RESIDENCE – SECTION 27(b)// 27(b) single submt in RSA
   if($q == 22){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR PERMANENT RESIDENCE &ndash;    SECTION 27(b)<u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "; </p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Permanent    Residence application form <br />
(BI-947)</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames  +  Company's Name </td>
    <td valign='top'><p>Please    complete this form in full with your details as the &ldquo;Principal Applicant&rdquo;    where required.</p>    
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td valign='top'>Two    passport-sized photographs of yourself</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>&nbsp;</p>    </td>
  </tr>
  <tr>
    <td valign='top'>A    letter from EMPLOYER    in support of your permanent residence application</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>A    brief letter from EMPLOYER    confirming your employment and that they support your permanent residence    application &ndash; a draft letter is attached to guide EMPLOYER.</td>
  </tr>
  <tr>
    <td valign='top'>*Certified    copies of all of&nbsp; your foreign    qualifications</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>These    are required in order for your qualifications to be verified by the South    African Qualifications Authority. </td>
  </tr>
  <tr>
    <td valign='top'>*Certified    copies of the transcripts for your foreign qualification(s)</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames </td>
    <td valign='top'>These    are required in order for your qualifications to be verified by the South    African Qualifications Authority. </td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>These    are required in order for your qualifications to be verified by the South    African Qualifications Authority. </td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>We    shall submit the same Medical Certificate which was used for your Temporary    Residence application, provided it is not older than 6 months.</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance certificates from <u>every</u> country where you have resided for    more than a year since your 18th birthday (including South Africa,    if applicable)</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'><p>These    documents must <u>not be older than 6 months at the time of submission</u> of    the application.</p>
      <p>We    may not submit an &ldquo;undertaking&rdquo; as we did with your Temporary Residence    application; the original/s should be made available.</p>
    <p>Please    allow time for any foreign Police Clearance Certificates to be Sworn    Translated into English.</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        <li>We confirm that we have received      instructions from EMPLOYER      to assist and to represent you and your spouse in your joint application      for Permanent Residence in terms of Section 27(b) of the Immigration      Amendment Act, Act 19 of 2004.</li>
        <li><strong>PLEASE      be advised that all documents not in the English language <u>must</u> be      accompanied by a sworn English translation. If you require assistance in      this regard, please do not hesitate to contact our office. </strong> </li>
        <li>All forms must be completed in <strong>black ink</strong>.</li>
        <li><em><u>Please      note</u></em><em>: </em> </li>
      </ul>
      <p><em>We      are required to obtain a SAQA verification certificate in respect of each      of your foreign qualifications. Kindly forward the documents marked with a star (*) to our      office as soon as possible, ahead of the complete set of documents, in      order that we may proceed with this SAQA application (this process can take      up to 3 weeks). The application will not be ready for submission until such      time as all documents (including the aforementioned SAQA certificate) are      in our possession.</em></p>
      <ul>
        <li>Your permanent residence application must      be submitted in person by yourself at the Department of Home Affairs in      Cape Town. One of our senior consultants will accompany you to the interview.      Kindly forward all of the requested documents to our office at your      earliest convenience in order that we may compile the application and set a      date for presentation of the documents at the Department of Home Affairs.      Our office will follow up the status of the application with the Department      of Home Affairs on a regular basis once it has been submitted and will keep      you advised of their progress. It may take between 12 &ndash; 24&nbsp; months for the application to be      processed and approved.</li>
      </ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
</table>";
       
   }
   
   //APPLICATIONS FOR RETIRED PERSONS PERMITS// sect(20) for couple to submit in RSA
   if($q == 23){
       
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATIONS FOR RETIRED PERSONS PERMITS<u></u><u></u></strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "; </p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power    of Attorney form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Mr <em>or</em> Mrs Applicant</td>
    <td valign='top'><p>Please    only sign at &ldquo;Signature of person giving power of attorney&rdquo; on page 1 (Part    A). The form is attached.</p>    
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td valign='top'>BI-1740    Change of Conditions or Status form x2</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Mr and Mrs Applicant</td>
    <td valign='top'><p>Please    print the attached form    out <strong><u>twice</u></strong>. </p>    
      <p>Please <u>only</u> complete the &ldquo;security and health questionnaire&rdquo; and sign at    &ldquo;Signature of Applicant&rdquo; on page 3 of one of these forms. Your wife is    required to sign and complete the same sections on the other form. </p>
    <p></p></td>
  </tr>
  <tr>
    <td valign='top'>Marriage    Certificate</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Mr and Mrs Applicant</td>
    <td valign='top'>Certified    copy of your marriage certificate, confirming your marriage to each other</td>
  </tr>
  <tr>
    <td valign='top'>Divorce    / Death certificates </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Mr and Mrs Applicant</td>
    <td valign='top'>If    either you or your wife have been married previously, the divorce decree(s)    or death certificate(s) in respect of the former spouse is required, if applicable.</td>
  </tr>
  <tr>
    <td valign='top'>Medical    Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Mr and Mrs Applicant</td>
    <td valign='top'>To    be completed by any medical doctor consequent to a basic medical examination    of yourself and your wife. Must not be older than 6 months at the time of    submission of the applications. The form is attached.</td>
  </tr>
  <tr>
    <td valign='top'>Radiological    Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Mr and Mrs Applicant</td>
    <td valign='top'>To    be completed by a radiologist consequent to a chest x-ray examination of    yourself and your wife. Must not be older than 6 months at the time of    submission of the applications. The form is attached.</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance Certificates for yourself from every country where you have resided    for more than a year since your 18th birthday</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Mr Applicant</td>
    <td valign='top'>If    the Police Clearance certificates are not available at the time we are ready    to submit the applications, a letter of undertaking will suffice for these    purposes. A draft of this    letter is attached. Please sign and complete the letter, if necessary.</td>
  </tr>
  <tr>
    <td valign='top'>Police    Clearance Certificates for your wife from every country where she has resided    for more than a year since her 18th birthday</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Mr Applicant</td>
    <td valign='top'>If    the Police Clearance certificates are not available at the time we are ready    to submit the applications, a letter of undertaking from your wife will    suffice for these purposes. Please have your wife also sign a copy of copy of    the attached draft letter, if necessary. </td>
  </tr>
  <tr>
    <td valign='top'>Letter    from a Chartered Accountant x 2 <em>and/or</em> <u>proof</u> of your Retirement Income</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>Mr and Mrs Applicant</td>
    <td valign='top'><p>A draft of the required letter is    attached    &ndash; one for yourself and the other for your wife. Both letters must be issued    by a South African registered Chartered Accountant (registered with SAICA).</p>    </td>
  </tr>
</table>
<p>&nbsp;</p>
<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><p><u>NOTES</u>:</p>
      <ul type='disc'>
        
        <li><strong>PLEASE be advised that all documents           not in the English language <u>must</u> be accompanied by a sworn           English translation. If you require assistance in this regard, please           do not hesitate to contact our office. A separate Invoice will be           prepared for such service.</strong> </li>
        <li>All forms           must be completed in <strong>black ink</strong>.</li>
        <li><u>Please           provide us with all the documents in the correct format as soon as           possible.</u> </li>
        <li>On receiving           the requested documentation, we will compile your application and           submit it on your behalf (together with your original passports) to           the Department of Home Affairs (DHA). </li>
        <li>The legal           waiting period for your application to be processed by DHA is 30           calendar days, but our office will keep you updated regularly as to           their progress. The timeframe in which your application is finalized           is dependant on various factors. Once the application has been           approved you will be required to return your passports to us to have           them endorsed. </li>
        <li><u>International travel is strongly discouraged, except for emergency situations.</u></li>
        </ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
</table>";
       
   }
   
   if($q == 24){
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
      <p align='center'><strong>APPLICATION FOR A VARIOUS PERMITS</strong></p>
    <p>EXTRA-ORDINARY CIRCUMSTANCES</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Marital Status </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames   </td>
    <td valign='top'><p>Applicant should provide a Marriage Certificate if currently married.<br />
If previously married and then Divorced, applicant to provide a Final Divorce Decree of the dissolved marriage.<br />
If there were children from the previous marriage, and they are included in this application, include the additional portion of the Divorce Decree pertaining to the custody order.<br />
If in a Traditional/Customary marriage, please provide documented proof of the marriage, eg. Nikah, Letter from Tribal Chief, Village headman, etc.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Foreign Life-Partner</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames + Life-Partner</td>
    <td valign='top'><p>Please provide documented PROOF that the two of you have been in a Life Partnership. This may take the form of a Notarial Contract (if done in your country), municipal documents, etc.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Birth Certificate of Adopted child/ren </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>If a child has been Adopted, we require the Official Adoption Papers to prove the child is Officially part of the family.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>Letter of support</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames</td>
    <td valign='top'>Please have your Spouse complete and sign a dated letter, outlining that she (and children) are NOT joining you at this stage, but that she supports your application. She will follow the legal process if/when she intends to join you at a later date.</td>
  </tr>
</table>
";
   }
   
   if ($q == 116){
       $message .="<table width='100%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
    <td colspan='6' valign='top'><div align='center'  bgcolor='#999999'>
    <p align='center'><strong>APPLICATION FOR </strong></a><strong>VISITOR PERMIT &ndash;  SECTION 11(6)(b) - EMPLOYMENT</strong></p>
    <p>" . "$title" . $firstnames . " " . $surname . "</p>
      <p align='center'><strong>( PLEASE COMPLETE  FORMS IN BLACK INK ONLY </strong>)</p>
    </div></td>
  </tr>
  <tr>
    <td valign='top'>DOCUMENT REQUIRED </td>
    <td align='center' valign='top'>Original</td>
    <td align='center' valign='top'>Certified Copy </td>
    <td align='center' valign='top'>Copy</td>
    <td valign='top'>Responsipble Person </td>
    <td valign='top'>COMMENTS/RESULTS</td>
  </tr>
  <tr>
    <td valign='top'>Power of Attorney form </td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>Please only sign at &ldquo;Signature of person giving  power of attorney&rdquo; on page 1 (Part A) and complete your current residential  address. &nbsp;The form is attached.</p>    </td>
  </tr>
  <tr>
    <td valign='top'>BI-1740 Change of Conditions or Status form</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames   </td>
    <td valign='top'><p>You  are only required to sign and complete the &ldquo;Security and health questionnaire&rdquo;  and &ldquo;Signature of Applicant&rdquo; on page 3.<br>
Your  Employer needs to complete the highlighted sections on pg. 8 and 9. </p></td>
  </tr>
  <tr>
    <td valign='top'>Copy of passport title page and valid Temporary  Residence Permit</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>.</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Copy of your partner&rsquo;s RSA Identity Book</p></td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'> $firstnames  </td>
    <td valign='top'><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td valign='top'><p>Marriage  Certificate (in the case of a married applicant)</p>    </td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top'>Divorce / Death certificates, if applicable</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>If either you or your partner have been married  previously, the divorce decree(s) and/or death certificate in respect of a  former spouse is required, if applicable.</td>
  </tr>
  <tr>
    <td valign='top'>Affidavit in Respect of Parties to a Spousal  Relationship</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>The  required Form is attached for ease of reference.</p>
    Note: <strong>PART A  (only) </strong>of this form (attached) must be completed and signed by yourself and  your partner, before a Commissioner of Oaths &ndash; You may approach any police  person or attorney to assist you in this regard.</td>
  </tr>
  <tr>
    <td valign='top'>Documentary proof of your and your partner&rsquo;s  spousal relationship (cohabitation and shared financial responsibilities).</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'><p>This  can take the shape of a lease agreement for your home or proof of ownership of  the property, utility or other accounts or correspondence addressed to you  and/or your spouse respectively, reflecting the same residential address,  letters from friends and family confirming the relationship (a draft letter for  this purpose is attached) and any other documents which may serve to  substantiate the existence of your life partnership.</p></td>
  </tr>
  <tr>
    <td valign='top'>Letter of support from your partner</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>Please have your partner sign and complete the  draft letter attached.</td>
  </tr>
  <tr>
    <td valign='top'>Letters from Friends and Family</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>A draft letter is attached as a guideline,  please include a certified copy of the <em>identity  document / passport title page</em> of the family member or friend</td>
  </tr>
  <tr>
    <td valign='top'>Medical Certificate</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>To be completed by any medical doctor consequent  to a basic medical examination of yourself. This document must not be older  than 6 months at the time of submission of the application</td>
  </tr>
  <tr>
    <td valign='top'>Radiological Report</td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames </td>
    <td valign='top'>A Radiological Report  to be duly completed and signed by any radiologist consequent to chest x-rays  of yourself. This document must not be older than 6 months at  the time of submission of the application</td>
  </tr>
  <tr>
    <td valign='top'><p>Police  Clearance Certificates from every country where you have resided for more than  a year since your 18th birthday, including South Africa</p></td>
    <td align='center' valign='top'>X</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td align='center' valign='top'>&nbsp;</td>
    <td valign='top'>$firstnames  </td>
    <td valign='top'><p>If these Police Clearance certificates are not  available at the time we are ready to submit the applications, a letter of undertaking  (draft letter attached) will suffice for these purposes. Police Clearance  certificates must then be submitted within 6 months.</p></td>
  </tr>
</table>
";
   }
   
    $message.='</td></tr></table>';

    if ($q) {
        if (strtoupper(substr(PHP_OS,0,3)=='WIN')) { 
  $eol="\r\n"; 
} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) { 
  $eol="\r"; 
} else { 
  $eol="\n"; 
} 
        
        
        # File for Attachment 
        $f_name = "../docs/attachments/BI-1738.pdf" . $letter;    // use relative path OR ELSE big headaches. $letter is my file for attaching. 
        $handle = fopen($f_name, 'rb');
        $f_contents = fread($handle, filesize($f_name));
        $f_contents = chunk_split(base64_encode($f_contents));    //Encode The Data For Transition using base64_encode(); 
        $f_type = filetype($f_name);
        fclose($handle);
        $body=ob_get_contents(); ob_end_clean(); 
        
        
        
        $subject = 'Required documents'.$eol;

        $headers = 'MIME-Version: 1.0' .$eol;
      
        $headers .= "X-Mailer: PHP v".phpversion().$eol;           // These two to help avoid spam-filters 
        # Boundry for marking the split & Multitype Headers 
        $mime_boundary=md5(time()); 
       
        $headers .= 'Content-type: text/html; charset=iso-8859-1'.$eol;
        $headers .= 'From: none-reply@globalimsa.com'.$eol;
        $headers .= "Message-ID:<".$now." TheSystem@".$_SERVER['SERVER_NAME'].">".$eol; 
        $msg = 'Dear ' . $firstnames . ' ' . $surname . "<br>" . 'Welcome to Global Migration' . "<br/>" . '' . "<br/>" . "Please read the required documents carefully" . "<br/>" . "<br/>".$eol;
        $msg.= $message . "\r\n".$eol;
        $msg.= $text . "<br/>" .$eol;
        $msg.= 'Warm Regards' . "<br/>" . $query['consultant'] . "<br/>" . 'GLOBAL MIGRATION ' . "<br/>" . 'SOUTH AFRICA'.$eol;
        $msg .= $body.$eol.$eol; 
        $msg .= "--".$mime_boundary."--".$eol.$eol; 
        mail($to, $subject, $msg, $headers);

        $_SESSION['msg'] = "The memo was sent..........";
        header("location:admin_index.php?m=send_memo&id=" . $clientID . "");
        exit;
    } else {
        $_SESSION['error'] = "Error! The memo was not sent.";
        header("location:admin_index.php?m=send_memo&id=" . $clientID . "");
        exit;
    }
}
mysql_close($con);
?>
