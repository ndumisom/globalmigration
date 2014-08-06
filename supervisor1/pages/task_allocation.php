
<style rel="stylesheet" type="text/css" media="all" title="win2k-cold-1">
    /* Task allocation Sent Tasks */
     .cssmenu ul{
        margin:0;
        padding:0;
        list-style-type:none;
        width:auto;
        position:relative;
        display:block;
        height:25px;
        background:transparent url('images/blue.jpg') repeat-x top left;

    }
    .cssmenu li{
        display:block;
        float:left;
        margin:0;
        pading:0;
        border-right:1px solid #ffffff;
    }
    .cssmenu li a{
        display:block;
        float:left;
        color:#ffffff;
        text-decoration:none;
        padding:6px 16px 0 20px;
        height:15px;
        height:15px;
    }

 </style>

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
        $("#addTask").click(function(){
		var valid = '';
		var isr = ' is required.';
		var consultant = $("#consultant").val();
		var allocated_task = $("#allocated_task").val();
		var due_date = $("#subject").val();
		var details = $("#details").val();
		if (consultant.length<1) {
			valid += '<br /> Consultant'+isr;
		}
		if (allocated_task.length<1) {
			valid += '<br />Allocated task'+isr;
		}
		if (due_date.length<1) {
			valid += '<br />Date'+isr;
		}
                if (details.length<1) {
			valid += '<br />details'+isr;
		}
		if (valid!='') {
			$("#response").fadeIn("slow");
			$("#response").html("Error:"+valid);
		}
                if (valid!='') {
			$("#response").fadeIn("slow");
			$("#response").html("Error:"+valid);
		}
		else {
			var datastr ='consultant=' + name + '&Allocated_task=' + mail + '&due_date=' + due_date + '&details=' + details;
			$("#response").css("display", "block");
			$("#response").html("Sending message .... ");
			$("#response").fadeIn("slow");
			setTimeout("send('"+datastr+"')",2000);
		}
		return false;
	});
	
});

</script>

<table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
    <tr>
        <td>
            
      
        <table width="100%">
    <tr><td><a href="index.php?page=sent_task" alt="Sent Tasks" class="label label-info">Sent Tasks</a>
            <br/>

            <br/>
			<script type="text/javascript" src="jquery.js"></script>
<script type='text/javascript' src='jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript">
    function validateForm()
{
var x=document.forms["search"]["name"].value;
if (x==null || x=="")
  {
  alert("Please enter a search string");
  return false;
  }
}

$().ready(function() {
	$("#client").autocomplete("get_course_list.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});

$(document).ready(function(){
	$("#service").click(function(){
        $("#shadow").fadeIn("normal");
         $("#login_form").fadeIn("normal");
         $("#user_name").focus();
    });
	$("#cancel_hide").click(function(){
        $("#login_form").fadeOut("normal");
        $("#shadow").fadeOut();
   });
   $("#login").click(function(){
    
                   consultant = $("#consultant").val();
		 allocated_task = $("#allocated_task").val();
		 due_date = $("#subject").val();
		 details = $("#details").val();
         $.ajax({
            type: "POST",
            url: "add_task.php",
            data: "consultant="+consultant+"&allocated_task="+allocated_task+"&due_date="+due_datek+"&details="+details,
            success: function(html){
              if(html=='true')
              {
                $("#login_form").fadeOut("normal");
				$("#shadow").fadeOut();
				$("#profile").html("<a href='logout.php' id='logout'>Logout</a>");
				
              }
              else
              {
                    $("#add_err").html("Wrong username or password");
              }
            },
            beforeSend:function()
			{
                 $("#add_err").html("Loading...")
            }
        });
         return false;
    });
});
</script>
    
            Search for a client who you like to allocate task for
            <form name="search" action="" method="post">
                <table width="20%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td valign="top"><input type="text" name="name" id="client" autocomplete="off"/></td>
                        <td  valign="top"><input  type="submit" name="submit" id="search-submit" value="Search" class="btn btn-primary"/>&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </form>
            
            <?
            $name = isset($_POST['name']);
            //connect  to the database 
            $db = mysql_connect("localhost", "root", "mapapa1531") or die('I cannot connect to the database  because: ' . mysql_error());
            //-select  the database to use 
            $mydb = mysql_select_db("globalmigration_db");
            //-query  the database table 
            $sql = "SELECT  *FROM client_details WHERE firstnames LIKE '%" . $name . "%' OR surname LIKE '%" . $name . "%' OR CONCAT(firstnames, ' ', surname) LIKE '%" . $name . "%' LIMIT 1";
            //-run  the query against the mysql query function 
            $userID = isset($row['clientID']);
            $result = mysql_query($sql);
            $numrows = mysql_num_rows($result);

            if (isset($_POST['submit'])) {
                if (preg_match("/^[  a-zA-Z]+/", $_POST['name'])) {

                    //-create  while loop and loop through result set 
                    while ($row = mysql_fetch_array($result)) {
                        $firstname = $row['firstnames'];
                        $surname = $row['surname'];
                        $file_no = $row['file_no'];
                        $userID = $row['clientID'];
                        $isSearchFound = true;
                        if ($isSearchFound) {
                            //-display the result of the array 

                            echo "<ul>\n";
                            echo "<li>" . "<a style='color: #0000FF;'  href=\"#\">" . $firstname . " &nbsp;&nbsp;&nbsp;  " . $surname . "   &nbsp;&nbsp;&nbsp; " . $file_no . "</a></li>\n";
                            echo "</ul>";
                        } else {
                            echo "<h1>No results found.</h1>";
                        }
                    }
                } else {
                    echo " <br/> <p>Please enter a search query</p>";
                }
            }
           
            ?>
		<center><div style="border: 1px solid #0000FF; width:90%;">	</div></center
        </td></tr>
    <tr><td>
            </div>
            </font>&nbsp;
            <form name="task" action="add_task.php" method="post" class="uniForm" onsubmit="return validateTask()">
                <? 
                if($userID){
                $permit = "SELECT  *FROM permit_applications WHERE clientID=$userID";

                   $permR = mysql_query($permit);
             
           while ($row = mysql_fetch_array($permR)) {
            $someWords = $row['service'];
           if($someWords){
  
                echo "<br/>&nbsp;<a id='service' href='#' class='button'> click here to send task </a>"; 
             
            } 
             }}
             ?>
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
                                <option value="Kabelo">Kabelo</option>
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
                                <option value=""> Select  </option>

                                <option value="Advert - draft"> Advert - draft</option>
                                <option value="Advert - placement"/>Advert - placement</option>
                                <option value="Assistance with Doctor">Assistance with Doctor</option>
                                <option value="Benchmarking"/>Benchmarking</option>
                                <option value="Business Plan"/>Business Plan</option>
                                <option value="Call out Fees"/>Call out Fees</option>
                                <option value="Chartered Accountant Certificate"/>Chartered Accountant Certificate</option>
                                <option value="Company Registration (CC, Pty, Vat, etc)"/>Company Registration (CC, Pty, Vat, etc)</option>
                                <option value="Courier"/>Courier</option>
                                <option value="Courier services">Courier services</option>
                                <option value="Good Cause Period"/>Good Cause Period</option>
                                <option value="Handling Fees"/>Handling Fees</option>
                                <option value="Labour"/>Labour</option>
                                <option value="Legalisation"/>Legalisation</option>
                                <option value="Medical"/>Medical</option>
                                <option value="Other"/>Other</option>
                                <option value="Other Services (CVs, Letters, etc)"/>Other Services (CVs, Letters, etc)</option>
                                <option value="Permit application"/>Permit application</option>
                                <option value="PR Attendance at Interviews"/>PR Attendance at Interviews</option>
                                <option value="Professional Fees"/>Professional Fees</option>
                                <option value="Request refund of overstay fine"/>Request refund of overstay fine</option>
                                <option value="Review - follow up"/>Review - follow up</option
                                <option value="Review - submit"/>Review - submit</option>
                                <option value="SAQA"/>SAQA</option>
                                <option value="Send copy of application to the hub"/>Send copy of application to the hub</option>
                                <option value="Telephonic follow up with the hub"/>Telephonic follow up with the hub</option>
                                <option value="Translation"/>Translation</option>
                                <option value="Urgent Applications"/>Urgent Applications</option>
                                <option value="Waiver- follow up"/>Waiver- follow up</option>
                                <option value="Waiver Request"/>Waiver Request</option>
                               
                                
                                
                                
                             
                            </select>

                        </td>
                    </tr>


                    <input type="hidden" name="allocated_by" id="allocated_by" value="<? echo $_SESSION['log']; ?>" />

                    <tr>
                        <td>Allocated to </td>
                        <td>
                            <select name="allocated_to" id="allocated_to">
            
                                <option value="">Select</option>
                                <option value="Bilkees">Bilkees David-Ammed</option>
                                <option value="Eldorette">Eldorette Isaacson</option>
                                <option value="Elsa ">Elsa Van Loggerenberg</option>                                
                                <option value="Gillianm">Gillian Mackay</option>
                                <option value="Gillianv">Gillian von Willingh</option>
                                <option value="Gordon">Gordon Wakefield</option>
                                <option value="Keith">Keith Lykert</option>
                                <option value="Leon">Leon Isaacson</option>
                                <option value="Linde">Linde' van Zyl</option>
                                <option value="Lucia">Lucia Lamla</option>
                                <option value="Muzeina">Muzeina Snell</option>
                                <option value="Octavius">Octavius Lamla</option>
                                <option value="Ria">Ria Pasella</option>
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
                        <td><input type="text" name="due_date" id="f_date_a" autocomplete="off"/>

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
                        <td><textarea name="details" id="details" cols="19" rows="5"><?if($userID){echo $firstname . " " . $surname . " " . $file_no;
                                } else {
                                 }?></textarea></td>
                    </tr>
                    <tr>
                        
                        <td><input type="submit" name="Submit" value="Send task" class="btn btn-primary" onclick="checkDate(document.getElementById('date').value)" /></td>
                    </tr>
                </table>
            </form>
            <p>&nbsp;</p><p>&nbsp;</p>
        </td>
    </tr>
</table>
    </td>
    </tr>
</table>
<div id="login_form" style="display: none;">
        <div class="err" id="add_err"></div>
			<? require 'pages/services.php'; ?>
</div>
<div id="shadow" class="popup"></div>
