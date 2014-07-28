<style>
    #date_a {

        /* must be initially hidden */

        
        z-index:10000;

        /* styling */

    }
</style>
<form name="task" method="post" class="uniForm" onsubmit="return validateTask()" id="demoForm">
    <h3>Task Allocation </h3> 
    <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td>&nbsp;</td>
            <td> <div id="message" style="display: none;"><?
if (isset($_SESSION['msg'])) {
    echo '<span id="msg"><b>' . $_SESSION['msg'] . '</span></b>';
    unset($_SESSION['msg']);
}
if (isset($_SESSION['error'])) {
    echo '<span id="error"><b>' . $_SESSION['error'] . '</span></b/>';
    unset($_SESSION['error']);
}
?>
                    <div class="err" id="add_err"></div>
                    <div id="waiting" style="display: none">loading..........</div></td>
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
                <?
                if ($userID) {
                    $permit = "SELECT  *FROM permit_applications WHERE clientID=$userID";

                    $permR = mysql_query($permit);

                    while ($row = mysql_fetch_array($permR)) {
                        $someWords = $row['service'];
                        if ($someWords) {
                            $wordChunks = explode("; ", $someWords);
                            echo '<select name="allocated_task" id="allocated_task">';
                            for ($i = 0; $i < count($wordChunks); $i++) {
                                echo '<option> ';
                                echo "$wordChunks[$i] </option>";
                            }
                            echo '</select>';
                        }
                    }
                }
                ?>

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
            <td><input type="text" name="due_date" id="date_a" autocomplete="off"/>

                <script type="text/javascript">
                    function catcalc(cal) {
                        var date = cal.date;
                        var time = date.getTime()
                        // use the _other_ field
                        var field = document.getElementById("f_calcdate");
                        if (field == cal.params.inputField) {
                            field = document.getElementById("date_a");
                            time -= Date.WEEK; // substract one week
                        } else {
                            time += Date.WEEK; // add one week
                        }
                        var date2 = new Date(time);
                        field.value = date2.print("%Y-%m-%d %H:%M");
                    }
                    Calendar.setup({
                        inputField     :    "date_a",   // id of the input field
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
            <td>
            </td>

            <td><div class="d-blank"></div>
                <div class="d-login"></div><input type="button" id="cancel_hide" value="Cancel" class="login"/>&nbsp;<input type="submit" name="Submit" value="Send task" class="login" onclick="checkDate(document.getElementById('date').value)" id="submit"/>
            </td>
            </tr>
    </table>
</form>
<script type="text/javascript" src="js/ajaxSubmit.js"></script>