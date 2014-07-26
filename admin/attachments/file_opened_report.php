<table class="tab" width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#0000FF">
    <tr><td>
            <h2 class="title"><a href="#" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> Reports </a></h2>
            <p>&nbsp;</p>
    <center>
        <a href="admin_index.php?m=reports" style="color: #0000FF; text-decoration: underline; font: Helvetica, Arial, sans-serif;"> <b>Normal Report</b></a> <br/>
        <form action="admin_index.php?m=view_file_opened" method="post">
                <table border="0" width="750" cellspacing="1" cellpadding="3" 
                       bgcolor="#353535" align="center">
              
                    <tr>
                        <td bgcolor="#FFFFFF">Start Date</td>
                          <script type="text/javascript">
                            /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                            var bas_cal,dp_cal,ms_cal;      
                            window.onmouseover = function () {
                                dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('start_date'));
                            };
                        </script>
                        <td bgcolor="#FFFFFF">
                            <input type="text" name="start_date" id="start_date" autocomplete="off"/>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" width="50%">End Date</td>
                        <script type="text/javascript">
                            /*You can also place this code in a separate file and link to it like epoch_classes.js*/
                            var bas_cal,dp_cal,ms_cal;      
                            window.onload = function () {
                                dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('end_date'));
                            };
                        </script>
                        <td bgcolor="#FFFFFF" width="50%">
                            <input type="text" name="end_date" id="end_date" autocomplete="off"/>
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