<?php
session_start();
if (isset($_POST['login'])) {
    require_once 'admin/class.php';
    $call = new globalm;
    $session = session_id();
    $time = time();
    $tbl_name = "user_online";


    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);

    $user_browser = $_SERVER['HTTP_USER_AGENT'];
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $user_http = $_SERVER['HTTP_REFERER'];
    $login_time = date('Y-m-d h:i:s');
    $logout_time = "0000-00-00 00:00:00";


    $sql = "select *from users where (binary username = '$username' or binary email = '$username') and binary password = '$password' ";


    $query = mysql_query($sql);



    $count = mysql_num_rows($query);

    $row = mysql_fetch_assoc($query);

    $level = $row['level'];
    $name = $row['username'];
    $userID = $row['userID'];



    $sql1 = "select * from online where level='$level'";
    $query1 = mysql_query($sql1); //for onilne
    $row1 = mysql_fetch_assoc($query1); //for online

    $level1 = $row1['level']; //for online
    $status = $row1['status'];




    if ($count == 1) {
        if ($level == 1) {
            $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
            $inserto = mysql_query(" insert into logs  values( 0,'$user_browser', '$user_ip','$user_http', '$username','$login_time', '$logout_time')");
            $_SESSION['level'] = $level;
            $_SESSION['log'] = $username;
            header('location:admin/admin_index.php');
            exit;
        }


        if ($count == 1 && $level == 2) {
            $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
            $inserto = mysql_query(" insert into logs  values( 0, '$user_browser', '$user_ip', '$user_http', '$username', '$login_time', '$logout_time')");
            $_SESSION['level'] = $level;
            $_SESSION['log'] = $username;
            header('location:consultant/index.php');
            exit;
        }

        if ($count == 1 && $level == 3) {
            $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL,  $call->get_user_id($username), '$session', '$time')");
            $inserto = mysql_query(" insert into logs  values( 0, '$user_browser', '$user_ip', '$user_http', '$username', '$login_time' ,'$logout_time')");
            $_SESSION['level'] = $level;
            $_SESSION['log'] = $username;
            header('location:staff/index.php');
            exit;
        }
        //Insert login funtion for supervisor

        if ($count == 1 && $level == 4) {
            if ($status == 1) {
                $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
                $inserto = mysql_query(" insert into logs  values( 0, '$user_browser', '$user_ip', '$user_http', '$username', '$login_time', '$logout_time')");
                $update = mysql_query("UPDATE online SET username='$username' WHERE status=1");

                $_SESSION['level'] = $level;
                $_SESSION['log'] = $username;
                header('location:supervisor/index.php');
                exit;
            } else {
                $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
                $insert = mysql_query("insert into online values(0,'$username','$level',1)");


                $_SESSION['level'] = $level;
                $_SESSION['log'] = $username;
                header('location:supervisor/index.php');
                exit;
            }
        }


        if ($count == 1 && $level == 5) {
            $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
            $insert = mysql_query(" insert into logs  values( 0, '$user_browser', '$user_ip', '$user_http', '$username', '$login_time', '$logout_time')");
            $_SESSION['level'] = $level;
            $_SESSION['log'] = $name;
            $_SESSION['id'] = $userID;
            header('location:client/index.php');
            exit;
        }
        if ($count == 1 && $level == 6) {
            $user_online = mysql_query("INSERT INTO $tbl_name(user_onlineID, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
            $inserto = mysql_query(" insert into logs  values( 0, '$user_browser', '$user_ip', '$user_http', '$username', '$login_time' ,'$logout_time')");
            $_SESSION['level'] = $level;
            $_SESSION['log'] = $name;
            $_SESSION['id'] = $userID;
            header('location:hr/index.php');
            exit;
        }
    } else {
        $_SESSION['er'] = "Username and password do not match.";
        header('location:index.php');
        exit;
    }
}
?>