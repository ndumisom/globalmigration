<?php

class dbInteraction {

    var $host = null;
    var $username = null;
    var $password = null;
    var $db_name = null;
    var $conn = null;

    function __construct($host, $username, $password, $db_name) {

        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;

        $this->helper();
    }

    function mysqlConnect() {

        if (mysql_connect($this->host, $this->username, $this->password)) {
            $this->conn = mysql_connect($this->host, $this->username, $this->password);
        } else {
            die("Error Connecting to mysql" . mysql_error());
        }
    }

    function selectDB() {
        mysql_select_db($this->db_name) or die("Error Connecting to database" . mysql_error());
    }

    function helper() {

        $this->mysqlConnect();
        $this->selectDB();
    }

}

?>