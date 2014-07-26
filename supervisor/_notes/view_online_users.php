<style>

    #online_container li{
        color:balck;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-bottom-color: #F2F2F2;
        margin-bottom: 0px;
    }

    #online_container{
        font-family: arial,sans-serif;
        font-size: 13px;
        color: #333333;
        height:100%;
        width:80%;
        overflow-y:auto;
        overflow-x:auto;

        border-left:1px solid #cccccc;
        border-right:1px solid #cccccc;
        border-bottom:1px solid #eeeeee;
        background-color: #ffffff;
        line-height: 1.3em;
    }
    #online_header{

        background-color: #0000FF;
        font-weight: bold;

        color: #ffffff;


    }
    #main_container {
        height: 100%;
        width: 100%;
        position:fixed;
        top:100%;
        right:-10px;

    }
</style>


    <div id="online_header">Online users</div><br/>
    <?php
    session_start();

    $session = session_id();
    $time = time();
    $time_check = $time - 600; //SET TIME 10 Minute
    require_once 'database.php';
    $tbl_name = "user_online"; // Table name
// Connect to server and select databse

    $sql = "SELECT * FROM $tbl_name";
    $result = mysql_query($sql);
    $num = mysql_num_rows($result);

    while ($row = mysql_fetch_array($result)) {
        if ($num > 0) {
            echo '<li ><b style="color:green">.</b> <span style="color:000">' . $row['username'] . '</span></li>';
        }
    }
    if ($num == 0) {

        echo 'All users offline
              &nbsp;
            <hr/>
           &nbsp;
            <hr/>
            &nbsp;
            <hr/>&nbsp;
            <hr/>&nbsp;
            <hr/>&nbsp;
            <hr/>&nbsp;';
    }
// if over 10 minute, delete session 
    $sql4 = "DELETE FROM $tbl_name WHERE time<$time_check";
    $result4 = mysql_query($sql4);
// Open multiple browser page for result
    ?>
</div>
