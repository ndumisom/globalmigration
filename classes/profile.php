<?php

require_once 'database.php';

class profile {
   static function view_profile($user_id) {
        $str_sql_select = "SELECT *FROM users WHERE username = ? ";
        $sql_paramter = array($user_id);
        return Database::Query($str_sql_select, $sql_paramter, TRUE);
    }
        
    static function is_password_correct($pass, $user_id) {
        
       $str_sql_select = "SELECT password, userID FROM users WHERE password = ? AND userID = ?";
        $sql_paramter = array($pass, $user_id);
        Database::Query($str_sql_select, $sql_paramter, TRUE);
        $row = Database::$int_num_rows;
   
        if ( $row == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    static function update_password($user_id, $pass) {
        
        $str_sql_select = "UPDATE users SET password = ? WHERE userID = ?";
        $sql_paramter = array($pass, $user_id);
        $upadate = Database::Query($str_sql_select, $sql_paramter, TRUE);
        if ($upadate == true) {
            return true;
        } else {
            return false;
        }
    }

}
?>

<?php
// $db=new profile();
// $row =  $db->view_profile("consultant");

//  print_r($row);

// //Array ( [0] => Array ( [userID] => 31234 [clientID] => 0 [username] => ndumiso [password] => ayabonga [firstname] => ndumiso [surname] => mbete [email] => xmbete@gmail.com [mobile_no] => 12345 [level] => 1 [status] => 3 [time] => 0000-00-00 00:00:00 ) )

// $result=$row[0];
// echo "string".$result['userID'];

?>
