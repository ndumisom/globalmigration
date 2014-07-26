<?php

class Database {

    protected $hostname = "localhost";
    protected $username = "root";
    protected $password = "mapapa1531";
    protected $db_name = "globalmigration_db";
    protected $con = null;

    function _construct($hostname, $username, $password, $db_name, $con) {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
        $this->con = $con;
        $this->mysqlConnect();
        $this->mysqlSelectDB();
    }

    function mysqlConnect() {
        try {
            $this->con = mysql_connect($this->hostname, $this->username, $this->password) OR DIE('Unable to connect to database! Please try again later.' . mysql_error());
             mysql_select_db( $this->db_name, $this->con) OR DIE('Unable to connect to database! Please try again later.' . mysql_error());
             
        } catch (Exception $e) {
            echo $e->getMessage();
        }
      
    }

        
    function _destruct() {
        mysql_close($this->con);
    }

}

