<?php

require_once 'dao.php';
require_once 'database.php';
class Message{
   
    function compose_message(){
       
    }
static function list_all_inbox($user) {
        $str_sql_select = "SELECT * FROM  `message` WHERE  `to` = ? and (status = 3 or status = 0 or status = 1)  ORDER BY msg_id DESC ";
        $sql_paramter = array($user);
        return Database::Query($str_sql_select, $sql_paramter, TRUE);
    }
   
    function list_all_sent(){
       
    }
   
    function view_inbox_by_id(){
       
    }
   
    function view_sent_by_id(){
       
    }
   
    function delete_inbox(){
       
    }
   
    function delete_sent(){
       
    }
   
    function reply(){
       
    }
}
 
?>