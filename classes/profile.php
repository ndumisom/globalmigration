<?php

require_once 'database.php';

class profile {

    function view_profile($user_id) {
        $str_sql_select = "SELECT *FROM users WHERE userID = ? ";
        $sql_paramter = array($user_id);

        return( Database::Query($str_sql_select, $sql_paramter, TRUE));
    }
    
    
    function is_pass_correct($pass, $user_id) {

        $encrypt = $pswd;
        $isFound = false;

        if ($row = mysql_fetch_array(mysql_query(" select * from users where userID = '$userID' "))) {
            if ($encrypt == $row['password']) {
                $isFound = true;
            }
        }

        return $isFound;
    }
    
    function change_password($pass, $user_id) {

        $isUpdated = false;
        $userPSWD = $password;

        if (mysql_query(" update users set password = '$userPSWD' where userID= '$userID' ")) {
            $isUpdated = true;
        }


        return $isUpdated;
    }

}
?>

