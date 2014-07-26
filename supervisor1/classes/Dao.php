<?php

require_once (dirname(__FILE__) . '/database.php');
require_once (dirname(__FILE__) . '/survey.php');

class Dao extends Database{
    
    function  __construct(){
        
        parent::mysqlConnect();
    }
    
    //Search using input name
    function Search($name){
        
        
    }
//
//    public function view() {
//        //precedure to view all data
//        //$query = "call view()";
//        //Change to return fetch mysql
//        $query = "SELECT * FROM survey";
//       
//        return  $query ?  mysql_query($query) : false;
//    }
//
//    public function add($color, $sport) {
//        //Prcedure to insert in a database
//        //        CREATE PROCEDURE  `add` ( IN in_color VARCHAR( 50 ) , IN in_sport VARCHAR( 50 ) ) BEGIN INSERT INTO survey( id, color, sport ) 
//        //VALUES (
//        //NULL ,  'in_color',  'in_ sport'
//        //);
//        //
//        //END
//
//        $query = "insert into survey values(null, '$color', '$sport')";
//
//        return mysql_query($query) ? true: false;
//    }
//
//    public function edit() {
//        //precedure to edit
//        $query = "update survey set color = $this->color and sport = $this->sport";
//        return mysql_query($query) ? "Data hase beeen updaate" : mysql_error();
//    }
//
//    public function delete() {
//        //Procedure to delete
//        $query = "delete from survey where id = $this->id";
//        return mysql_query($query) ? "Data hase beeen deleted" : mysql_error();
//    }
//
//    public function validate_input($input) {
//
//
//        if ($input == null || $input == "") {
//            return TRUE;
//        }
//        return false;
//    }

}
