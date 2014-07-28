
<script>

$(document).ready(function() {	

	//select all the a tag with name equal to modal
	$('a[name=modal]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		
		//Get the A tag
		var id = $(this).attr('href');
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 
	
	});
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});

</script>
<style>
body {
font-family:verdana;
font-size:15px;
}

a {color:#333; text-decoration:none}
a:hover {color:#ccc; text-decoration:none}

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:100%;
  display:none;
  z-index:9999;
  padding:20px;
}
#boxes #dialog {
  width:375px; 
  height:203px;
  padding:10px;
  background-color:#ffffff;
}

#boxes #dialog1 {
  width:375px; 
  height:203px;
}

#dialog1 .d-header {
  background:url(images/login-header.png) no-repeat 0 0 transparent; 
  width:375px; 
  height:150px;
}

#dialog1 .d-header input {
  position:relative;
  top:60px;
  left:100px;
  border:3px solid #cccccc;
  height:22px;
  width:200px;
  font-size:15px;
  padding:5px;
  margin-top:4px;
}

#dialog1 .d-blank {
  float:left;
  background:url(images/login-blank.png) no-repeat 0 0 transparent; 
  width:267px; 
  height:53px;
}

#dialog1 .d-login {
  float:left;
  width:108px; 
  height:53px;
}

#boxes #dialog2 {
  background:url(images/notice.png) no-repeat 0 0 transparent; 
  width:326px; 
  height:229px;
  padding:50px 0 20px 25px;
  }
</style>

<div id="boxes">

<div id="dialog" class="window">
   <form name="task" action="../globalmigration/supervisor/add_task.php" method="post" class="uniForm" onsubmit="return validateTask()">
    <h3>Task Allocation </h3> 
    <table width="50%" border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td>&nbsp;</td>
            <td><?
if (isset($_SESSION['msg'])) {
    echo '<span id="msg"><b>' . $_SESSION['msg'] . '</span></b>';
    unset($_SESSION['msg']);
}
if (isset($_SESSION['error'])) {
    echo '<span id="error"><b>' . $_SESSION['error'] . '</span></b/>';
    unset($_SESSION['error']);
}
?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="hidden" name="clientID" value="<? echo $userID; ?>" id="clientID" /></td>
        </tr>
        <tr>
            <td>Consultant</td>
            <td>
                <select name="consultant" id="consultant">
                    <option value="">   Select    </option>  
                    <option value="Elsa">Elsa Van Loggerenberg</option>
                    <option value="Keith">Keith Lykert</option>
                    <option value="Eldorette">Eldorette Isaacson</option>
                    <option value="Kim ">Kim Van Niekerk</option>
                    <option value="Lisa">Lisa Haggard</option>
                    <option value="Elissa">Elissa Davie</option>
                    <option value="Leon ">Leon Isaacson</option>


                </select>
            </td>
        </tr>
        <tr>
            <td>Allocated task </td>
            <td>
                <select name="allocated_task" id="allocated_task">
                    <option value="">   Select  </option>

                    <option value="Advert - draft"> Advert - draft</option>
                    <option value="Advert - placement"/>Advert - placement</option>
                    <option value="Benchmarking"/>Benchmarking</option>
                    <option value="Business Plan"/>Business Plan</option>
                    <option value="Call out Fees"/>Call out Fees</option>
                    <option value="Chartered Accountant Certificate"/>Chartered Accountant Certificate</option>
                    <option value="Company Registration (CC, Pty, Vat, etc)"/>Company Registration (CC, Pty, Vat, etc)</option>
                    <option value="Courier"/>Courier</option>
                    <option value="Good Cause Period"/>Good Cause Period</option>
                    <option value="Handling Fees"/>Handling Fees</option>
                    <option value="Labour"/>Labour</option>
                    <option value="Legalisation<"/>Legalisation</option>
                    <option value="Medical"/>Medical</option>
                    <option value="Other"/>Other</option>
                    <option value="Other Services (CVs, Letters, etc)"/>Other Services (CVs, Letters, etc)</option>
                    <option value="Permit application"/>Permit application</option>
                    <option value="PR Attendance at Interviews"/>PR Attendance at Interviews</option>
                    <option value="Professional Fees"/>Professional Fees</option>
                    <option value="Request refund of overstay fine"/>Request refund of overstay fine</option>
                    <option value="SAQA"/>SAQA</option>
                    <option value="Translation"/>Translation</option>
                    <option value="Urgent Applications"/>Urgent Applications</option>
                    <option value="Waiver Request"/>Waiver Request</option>
                    <option value="Assistance with Doctor">Assistance with Doctor</option>
                    <option value="Courier services">Courier services</option>
                    <option value="Waiver Request">Waiver Request</option>

                </select>

            </td>
        </tr>


        <input type="hidden" name="allocated_by" id="allocated_by" value="<? echo $_SESSION['log']; ?>" />

        <tr>
            <td>Allocated to </td>
            <td>
                <select name="allocated_to" id="allocated_to">

                    <option value="">Select</option>

                    <option value="Eldorette">Eldorette Isaacson</option>
                    <option value="Elsa ">Elsa Van Loggerenberg</option>
                    <option value="Gillian">Gillian Mackay</option>
                    <option value="Gillian">Gillian von Willingh</option>
                    <option value="Gordon">Gordon Wakefield</option>
                    <option value="Indiana">Indiana Mehlo</option>
                    <option value="Keith">Keith Lykert</option>
                    <option value="Leon">Leon Isaacson</option>
                    <option value="Linde">Linde' van Zyl</option>
                    <option value="Lucia">Lucia Lamla</option>
                    <option value="Octavius">Octavius Lamla</option>
                    <option value="Taryn">Taryn Barry</option>
                    <option value="Tina">Tina Li</option>
                    <option value="Wendy">Wendy Fourie</option>
                    <option value="staff">Staff</option>
                    <option value="consultant">Consultant</option>


                </select>
            </td>
        </tr>
        <tr>
            <td>Due date </td>
            <td><input type="text" name="due_date" id="f_date_a"/>

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

            </td>
        </tr>

        <tr>
            <td valign="top">Details</td>
            <td><textarea name="details" id="details" cols="19" rows="5"><?
                if ($userID) {
                    echo $firstname . " " . $surname . " " . $file_no;
                } else {
                    
                }
?></textarea></td>
        </tr>
        <tr>
            <td><a href="#"class="close"/>Close it</a>
            </td>

            <td><div class="d-blank"></div>
  <div class="d-login"><input type="image" alt="Login" title="Login" src="images/login-button.png"/></div><input type="submit" name="Submit" value="Send task" class="login"onclick="checkDate(document.getElementById('date').value)" />
            </td><t
        </tr>
    </table>
</form>
<a href="#"class="close"/>Close it</a>
</div>
  
<!-- Start of Login Dialog -->  
<div id="dialog1" class="window" style="display:none">
  <div class="d-header">
 
  </div>
  
</div>
<!-- End of Login Dialog -->  







<!-- Mask to cover the whole screen -->
  <div id="mask"></div>
</div>


